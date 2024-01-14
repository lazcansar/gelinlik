<?php

namespace App\Http\Controllers;

use App\Models\SssModel;
use App\Models\Musterihizmetleri;
use Illuminate\Http\Request;

class AdminpageController extends Controller
{
    //Müşteri hizmetleri sayfası
    public function adminCustomerServices()
    {
        $customerInsert = '';
        $customerDetail = '';
        $customerAll = Musterihizmetleri::all();
        return view('admin-panel.admin-musteri-hizmetleri', compact('customerInsert', 'customerAll', 'customerDetail'));
    }

    public function adminCustomerServiceOlustur(Request $request)
    {
        if($request->method() == 'GET') {
            $customerAll = '';
            $customerDetail = '';
            $customerInsert = Musterihizmetleri::all();
            return view('admin-panel.admin-musteri-hizmetleri', compact('customerInsert', 'customerAll', 'customerDetail'));
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
            return view('admin-panel.admin-musteri-hizmetleri', compact('customerAll', 'customerInsert', 'customerDetail'));
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
        return view('admin-panel.admin-sss', compact('sssKayit', 'sssEkle', 'sssGoruntule'));
    }
    public function adminSssOlustur()
    {
        $sssGoruntule = '';
        $sssKayit = '';
        $sssEkle = SssModel::all();
        return view('admin-panel.admin-sss', compact('sssKayit', 'sssEkle', 'sssGoruntule'));
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
        $sssGoruntule = SssModel::whereId($id)->first();
        return view('admin-panel.admin-sss', compact('sssDetay', 'sssGoruntule', 'sssEkle', 'sssKayit'));
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




}
