<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\SssModel;
use App\Models\Musterihizmetleri;
use App\Models\Category;
use App\Models\Urunler;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;



class AdminpageController extends Controller
{
    //Admin Home Page
    public function adminIndex () {
        $listContact = Contact::all();
        return view('admin-panel.admin-home', compact('listContact'));
    }


    // Urun ekleme sayfası

    public function adminProductView()
    {
            $listProduct = Urunler::paginate(10);
            $insertCategory = "";
            $allGalleryProduct = "";
            $imageDelete = "";
            $productDetail = "";
            $listContact = Contact::all();
            return view('admin-panel.admin-product', compact('listProduct', 'insertCategory', 'allGalleryProduct', 'productDetail', 'imageDelete','listContact'));
    }
    public function adminProductInsert(Request $request)
    {
        if($request->method()=="GET") {
            $listProduct = "";
            $allGalleryProduct = "";
            $productDetail = "";
            $imageDelete = "";
            $insertCategory = Urunler::all();
            $categorySelect = Category::all();
            $listContact = Contact::all();
            return view('admin-panel.admin-product', compact('listProduct', 'insertCategory', 'allGalleryProduct', 'productDetail', 'categorySelect', 'imageDelete', 'listContact'));
        }
        else if($request->method()=="POST") {
            $title = $request->title;
            $url = $request->url;
            $price = $request->price;
            $stock = $request->stock;
            $content = $request->productContent;
            $info = $request->info;
            $category = $request->category;
            $foldername = Str::lower($url);
            $target_folder = public_path().'/images/product/'.$foldername;
            File::makeDirectory($target_folder, $mode =0775, true, true);
            $image = $request->image->getClientOriginalName();
            $uploadImage = $request->image->move(public_path("images/product/$foldername/"), $image);
            Urunler::create([
                "productTitle" => $title,
                "productUrl" => $url,
                "productPrice" => $price,
                "productContent" => $content,
                "productInfo" => $info,
                "productStock" => $stock,
                "productCoverImage" => $uploadImage,
                "categoryId" => $category,
            ]);
            return redirect()->route('product-view')->with('success', 'Ürün başarıyla eklendi');
        }
    }
    public function adminProductGallery(Request $request)
    {
        if ($request->method() == "GET") {
            $listProduct = "";
            $productDetail = "";
            $imageDelete = "";
            $insertCategory = "";
            $allGalleryProduct = Urunler::all();
            $listContact = Contact::all();
            return view('admin-panel.admin-product', compact('listProduct', 'insertCategory', 'allGalleryProduct', 'productDetail', 'imageDelete','listContact'));
        }
        else if ($request->method() == "POST") {
            $targetFolder = $request->product;
            $request->validate([
                'images' => 'required',
                'images.*' => 'mimes:jpeg,jpg,png,gif,webp,svg|max:2048'
            ]);
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $name = $image->getClientOriginalName();
                    $image->move(public_path("images/product/$targetFolder/"), $name);
                }
                return back()->with('success', 'Geleri resimleri eklendi');
            }

        }
    }

    public function adminProductDetail(Request $request, $id) {
        if ($request->method() == "GET") {
            $allGalleryProduct = '';
            $listProduct = '';
            $insertCategory = '';
            $imageDelete = '';
            $listContact = Contact::all();
            $productDetail = Urunler::whereproductid($id)->first();
            return view('admin-panel.admin-product', compact('productDetail', 'allGalleryProduct', 'listProduct', 'insertCategory', 'imageDelete', 'listContact'));
        }
        else if($request->method() == "POST") {
            $title = $request->title;
            $price = $request->price;
            $url = $request->url;
            $stock = $request->stock;
            $pcontent = $request->productContent;
            $info = $request->info;
            $foldername = Str::lower($url);
            $target_folder = public_path().'/images/product/'.$foldername;
            File::makeDirectory($target_folder, $mode =0775, true, true);
            Urunler::whereproductid($id)->update([
                "productTitle" => $title,
                "productUrl" => $url,
                "productPrice" => $price,
                "productStock" => $stock,
                "productContent" => $pcontent,
                "productInfo" => $info,
            ]);
            return redirect()->back()->with('update', 'Ürün başarılı bir şekilde güncellendi');
        }
    }

    public function adminProductDelete($id) {
        $folderDelete = Urunler::whereproductid($id)->first();
        $deleteFolder = $folderDelete->productUrl;
        File::deleteDirectory(public_path("images/product/$deleteFolder"));

        $deleteProduct = Urunler::whereproductid($id)->delete();
        return back()->with('delete', 'Ürün başarılı bir şekilde silindi.');
    }
    public function adminProductImageDelete($id) {
        $imageDelete = Urunler::whereproductid($id)->first();
        $allGalleryProduct = '';
        $listProduct = '';
        $insertCategory = '';
        $productDetail = '';
        $listContact = Contact::all();
        return view('admin-panel.admin-product', compact('imageDelete', 'allGalleryProduct', 'listProduct', 'insertCategory', 'productDetail', 'listContact'));
    }
    public function deleteImage($dizin, $newImage)
    {
        $dizin = public_path("images/product/$dizin");
        if(File::isDirectory($dizin)) {
            if (File::exists($dizin."/".$newImage)) {
                File::delete($dizin."/".$newImage);
                return redirect()->back()->with('delete', 'Resim silindi');
            }else {
                return redirect()->back()->with('delete', 'Böyle bir dosya bulunamadı.');
            }
        }else {
            return redirect()->back()->with('delete', 'Bu bir dizin değil');
        }
    }











    // Kategoriler Sayfası
    public function adminCategory()
    {
        $categoryFake = '';
        $categoryDetail = '';
        $category = Category::all();
        $listContact = Contact::all();
        return view('admin-panel.category', compact('category', 'categoryFake', 'categoryDetail', 'listContact'));
    }
    public function adminCategoryInsert(Request $request)
    {
        if ($request->method() == "GET") {
            $categoryFake = Category::all();
            $category = '';
            $categoryDetail = '';
            $listContact = Contact::all();
            return view('admin-panel.category', compact('categoryFake', 'category', 'categoryDetail', 'listContact'));
        }
        else if($request->method() == "POST") {
            $title = $request->categoryTitle;
            $url = $request->categoryUrl;
            $content = $request->categoryContent;
            Category::create([
                "categoryTitle" => $title,
                "categoryUrl" => $url,
                "categoryContent" => $content,
            ]);
            return redirect()->route('category-view')->with("success", "Kategori oluşturuldu.");

        }
    }
    public function adminCategoryDelete($id)
    {
        $categoryDelete = Category::wherecategoryid($id)->delete();
        return redirect()->route('category-view')->with("delete", "Kategori silindi");
    }
    public function adminCategoryDetail(Request $request, $id)
    {
        if($request->method() == "GET") {
            $categoryDetail = Category::wherecategoryid($id)->first();
            $categoryFake = '';
            $category = '';
            $listContact = Contact::all();
            return view('admin-panel.category', compact('categoryDetail', 'categoryFake', 'category', 'listContact'));
        }
        else if ($request->method() == "POST") {
            Category::wherecategoryid($id)->update([
                "categoryTitle" => $request->categoryTitle,
                "categoryUrl" => $request->categoryUrl,
                "categoryContent" => $request->categoryContent,
            ]);
            return redirect()->route('category-view')->with("update", "Kategori güncellendi");
        }
    }



    //Müşteri hizmetleri sayfası
    public function adminCustomerServices()
    {
        $customerInsert = '';
        $customerDetail = '';
        $customerAll = Musterihizmetleri::all();
        $listContact = Contact::all();
        return view('admin-panel.admin-musteri-hizmetleri', compact('customerInsert', 'customerAll', 'customerDetail', 'listContact'));
    }

    public function adminCustomerServiceOlustur(Request $request)
    {
        if($request->method() == 'GET') {
            $customerAll = '';
            $customerDetail = '';
            $customerInsert = Musterihizmetleri::all();
            $listContact = Contact::all();
            return view('admin-panel.admin-musteri-hizmetleri', compact('customerInsert', 'customerAll', 'customerDetail', 'listContact'));
        }
        else if($request->method() == 'POST') {
            $title = $request->customTitle;
            $url = $request->customUrl;
            $content = $request->customContent;
            Musterihizmetleri::create([
                "title" => $title,
                "url" => $url,
                "content" => $content,
            ]);
            return redirect()->route('customer-view')->with('success', 'Sayfa Başarıyla Eklendi!');
        }
    }
    public function adminCustomerDelete($id)
    {
        $customerDelete = Musterihizmetleri::whereId($id)->delete();
        return redirect()->route('customer-view')->with('delete', 'Kayıt başarılı bir şekilde silindi');
    }
    public function adminCustomerDetail(Request $request, $id)
    {
        if($request->method() == "GET") {
            $customerAll = '';
            $customerInsert = '';
            $customerDetail = Musterihizmetleri::whereId($id)->first();
            $listContact = Contact::all();
            return view('admin-panel.admin-musteri-hizmetleri', compact('customerAll', 'customerInsert', 'customerDetail', 'listContact'));
        }
        else if($request->method() == "POST") {
            Musterihizmetleri::whereId($id)->update([
                "title" => $request->customTitle,
                "url" => $request->customUrl,
                "content" => $request->customContent,
            ]);
            return redirect()->route('customer-view')->with('update', 'Kayıt başarılı bir şekilde güncellendi');
        }

    }





    //Sıkça Sorulan Sorular Bağlantısı
    public function adminSssCreate()
    {
        $sssKayit = SssModel::all();
        $sssEkle = '';
        $sssGoruntule = '';
        $listContact = Contact::all();
        return view('admin-panel.admin-sss', compact('sssKayit', 'sssEkle', 'sssGoruntule', 'listContact'));
    }
    public function adminSssOlustur()
    {
        $sssGoruntule = '';
        $sssKayit = '';
        $sssEkle = SssModel::all();
        $listContact = Contact::all();
        return view('admin-panel.admin-sss', compact('sssKayit', 'sssEkle', 'sssGoruntule', 'listContact'));
    }
    public function adminSssCreateReg(Request $request)
    {
        $title = $request->sssTitle;
        $content = $request->sssContent;
        SssModel::create([
           "title" => $title,
           "content" => $content,
        ]);
        return redirect()->route('sss-yonetim')->with('success', 'Sıkça Sorulan Soru Başarıyla Eklendi!');
    }
    public function sssDetail($id)
    {
        $sssEkle = '';
        $sssKayit = '';
        $sssDetay = SssModel::all();
        $listContact = Contact::all();
        $sssGoruntule = SssModel::whereId($id)->first();
        return view('admin-panel.admin-sss', compact('sssDetay', 'sssGoruntule', 'sssEkle', 'sssKayit', 'listContact'));
    }
    public function sssUpdate(Request $request, $id)
    {
        $title = $request->sssTitle;
        $content = $request->sssContent;
        SssModel::whereId($id)->update([
            "title" => $title,
            "content" => $content,
        ]);
        return redirect()->route('sss-yonetim')->with('update', 'Kayıt başarılı bir şekilde güncellendi');
    }
    public function sssDelete($id)
    {
        $sssDelete = SssModel::whereId($id)->delete();
        return redirect()->route('sss-yonetim')->with('delete', 'Kayıt başarılı bir şekilde silindi');
    }

    //Sıkça Sorulan Sorular Bağlantısı Biter


    //Sirket bilgileri
    public function companyInfo(Request $request, $id)
    {
        if($request->method() == "GET") {
            $listContact = Contact::all();
            $companyInfo = Contact::whereId($id)->first();
            return view('admin-panel.admin-contact', compact('listContact', 'companyInfo'));
        }
        else if ($request->method() == "POST") {
            $phone = $request->phone;
            $mail = $request->mail;
            $facebook = $request->facebook;
            $instagram = $request->instagram;
            $twitter = $request->twitter;
            $linkedin = $request->linkedin;
            $tiktok = $request->tiktok;
            $youtube = $request->youtube;
            $adress = $request->adres;
            $maps = $request->google_maps;
            Contact::whereId($id)->update([
                "phone" => $phone,
                "mail" => $mail,
                "adress" => $adress,
                "google_maps" => $maps,
                "facebook" => $facebook,
                "instagram" => $instagram,
                "twitter" => $twitter,
                "linkedin" => $linkedin,
                "tiktok" => $tiktok,
                "youtube" => $youtube,
            ]);
            return redirect()->back()->with("update", 'Bilgiler güncellendi');
        }
    }

}
