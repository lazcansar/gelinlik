<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Musterihizmetleri;
use App\Models\Order;
use App\Models\SssModel;
use App\Models\Urunler;
use Illuminate\Http\Request;
use function Symfony\Component\String\s;

class PagesController extends Controller
{

    public function searchPage()
    {
        $listContact = Contact::all();
        $resultSearch = "";
        return view('pages.search', compact('listContact', 'resultSearch'));
    }

    public function searhExecute(Request $request)
    {
        $productAll = Urunler::all();
        $listContact = Contact::all();
        $stmt = Urunler::query();
        if(isset($request->search)) {
            $searchText = "%".$request->search."%";
            $stmt->where('productTitle', "LIKE", $searchText);
        }
        $resultSearch = $stmt->get();
        return view('pages.search', compact('resultSearch', 'listContact', 'productAll'));
    }

    public function homePageView()
    {
        $listProduct = Urunler::all();
        $listCategory = Category::all();
        $listContact = Contact::all();
        return view('pages.home', compact('listProduct', 'listCategory', 'listContact'));
    }
    public function contactPageView () {
        $listContact = Contact::all();
        return view('pages.contact', compact('listContact'));
    }
    public function sssPageView () {
        $sss = SssModel::all();
        $listContact = Contact::all();
        return view('pages.sss', compact('sss', 'listContact'));
    }
    public function aboutPageView () {
        $listContact = Contact::all();
        return view('pages.about', compact('listContact'));
    }
    public function customerPageView ()
    {
        $customer = Musterihizmetleri::all();
        $listContact = Contact::all();
        return view('pages.costumer', compact('customer', 'listContact'));
    }
    public function weddingPageView()
    {
        $listContact = Contact::all();
        return view('pages.weddingcreate', compact('listContact'));
    }
    public function showroomPageView() {
        $listContact = Contact::all();
        return view('pages.showroom', compact('listContact'));
    }
    public function loginPageView() {
        $listContact = Contact::all();
        return view('auth.login', compact('listContact'));
    }
    public function registerPageView() {
        $listContact = Contact::all();
        return view('auth.register', compact('listContact'));
    }
    public function productDetailView($productUrl)
    {
        $likeProduct = Urunler::all();
        $categories = Category::all();
        $listContact = Contact::all();
        $productDetail = Urunler::whereproducturl($productUrl)->first();
        return view('pages.product', compact('productDetail', 'categories', 'likeProduct', 'listContact'));
    }
    public function categoryView()
    {
        $products = '';
        $listProduct = Urunler::paginate(9);
        $listCategory = Category::all();
        $listContact = Contact::all();
        return view('pages.category',compact('listContact', 'listProduct', 'listCategory', 'products'));
    }
    public function categorySearch (Request $request) {
        $listProduct = Urunler::paginate(9);
        $listCategory = Category::all();
        $listContact = Contact::all();

        $stmt = Urunler::query();
        if(isset($request->category) && $request->category !=null) {
            $stmt->whereHas('kategori', function($q) use ($request){
                $q->whereIn('categoryId', $request->category);
            });
        }
        if(isset($request->beden) && $request->beden !=null) {
            $bedens = $request->beden;
            $bedens = implode(',', $bedens);
            $bedens = "%".$bedens."%";
            $stmt->where('productInfo', "LIKE", $bedens);
        }
        $products = $stmt->get();



        return view('pages.category',compact('listContact', 'listProduct', 'listCategory', 'products'));
    }

    public function checkoutView()
    {
        $listContact = Contact::all();
        $productSelect = Urunler::whereproductid(5)->first();

        return view('pages.checkout', compact('listContact', 'productSelect'));
    }
    public function checkoutSuccess()
    {
        $listContact = Contact::all();
        return view('pages.checkout-succes', compact('listContact'));
    }




    //Order Page Test
    public function orderPage (Request $request, $id)
    {
        $listContact = Contact::all();
        $productSelect = Urunler::whereproductid($id)->first();
        return view('pages.checkout', compact('listContact', 'productSelect'));
    }

    public function orderSubmit (Request $request)
    {
        $total_price = $request->productTotalPrice;
        $order_number = $request->order_number;
        $ship = $request->ship_method;
        $order = $request->order_method;
        $onay = $request->sart_kosul;
        $productId = str_replace(' ', '', $request->productId);



        if(isset($onay)) {
            Order::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'city' => $request->city,
                'adress' => $request->adress,
                'postal_code' => $request->postal_code,
                'message' => $request->message,
                'ship_method' => $ship,
                'order_method' => $order,
                'total_price' => $total_price,
                'productId' => $productId,
                'userId' => $request->userId,
                'order_number' => $order_number,
            ]);
            return redirect()->route('checkout-success')->with('order_success', 'Siparişiniz oluşturuldu!');
        }else {
            return redirect()->back()->with('error', 'Lütfen şartlar ve koşulları okuduğunuzu ve onayladığınızı işaretleyin!');
        }

    }

    public function addCart(Request $request)
    {
     $pId = $request->productId;
     $products = Urunler::findOrFail($pId);
     $cart = session()->get('cart', []);
     if (isset($cart[$pId])) {
         $cart[$pId][]++;
     }else {
         $cart[$pId] = [
             "productId" => $products->productId,
             "productTitle" => $products->productTitle,
             "productStock" => $products->productStock,
             "productPrice" => $products->productPrice,
             "productUrl" => $products->productUrl,
             "productImage" => $products->productCoverImage,
         ];
     }
     session()->put('cart', $cart);
     return redirect()->back();
    }

    public function deleteProduct($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('delete', 'Ürün silindi');
        }
    }




    public function checkoutTest()
    {
        $listContact = Contact::all();
        return view('pages.checkout-test', compact('listContact'));
    }





}


