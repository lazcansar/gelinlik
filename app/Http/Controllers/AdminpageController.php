<?php

namespace App\Http\Controllers;

use App\Models\SssModel;
use Illuminate\Http\Request;

class AdminpageController extends Controller
{

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
