<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use App\Models\Urunler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Termwind\Question;

class UserPage extends Controller
{
    public function userPage() {
        $listContact = Contact::all();
        $myOrders = "";
        $orderDetail = "";
        $userProfile = '';
        $myAdress = '';
        return view('users.account', compact('listContact', 'myOrders', 'orderDetail', 'userProfile', 'myAdress'));
    }
    public function myOrders()
    {
        $listContact = Contact::all();
        $myOrders = Order::all();
        $allProduct = Urunler::all();
        $orderDetail = '';
        $userProfile = '';
        $myAdress = '';
        return view('users.account', compact('listContact', 'myOrders', 'allProduct', 'orderDetail', 'userProfile', 'myAdress'));

    }
    public function showOrder($ordernumber)
    {
        $listContact = Contact::all();
        $allProduct = Urunler::all();
        $myOrders = "";
        $userProfile = '';
        $myAdress = '';
        $orderDetail = Order::whereorderNumber($ordernumber)->first();
        return view('users.account', compact('listContact', 'allProduct', 'orderDetail', 'myOrders', 'userProfile', 'myAdress'));
    }

    public function myProfile($id)
    {
        $listContact = Contact::all();
        $allProduct = Urunler::all();
        $myOrders = "";
        $orderDetail = '';
        $myAdress = '';
        $userProfile = User::whereId($id)->first();
        return view('users.account', compact('listContact', 'allProduct', 'orderDetail', 'myOrders', 'userProfile', 'myAdress'));
    }
    public function myProfileUpdate (Request $request)
    {
        $name = $request->ad;
        $surname = $request->soyad;
        $identification = $request->kimlikno;
        $currentpassword = $request->password;
        $newpassword = $request->newpassword;
        $newpassword2 = $request->newpassword2;
        if(Hash::check($currentpassword, auth()->user()->password)) {
            if ($newpassword == $newpassword2) {
                User::whereId(auth()->user()->id)->update([
                    'name' => $name,
                    'surname' => $surname,
                    'identification' => $identification,
                    'password' => bcrypt($newpassword),
                ]);
                return redirect()->back()->with('success', 'Bilgiler güncellendi');
            }else {
                return redirect()->back()->with('error', 'Yeni belirlediğiniz şifreler eşleşmedi. Lütfen yeniden deneyin!');
            }
        }else {
            return redirect()->back()->with('error', 'Mevcut şifreniz sistem kayıtlı olan şifre ile aynı değildir. Lütfen mevcut şifrenizi girin!');
        }
    }

    public function myAdress()
    {
        $listContact = Contact::all();
        $myOrders = "";
        $orderDetail = "";
        $userProfile = '';
        $myAdress = 'test';
        return view('users.account', compact('listContact', 'myOrders', 'orderDetail', 'userProfile', 'myAdress'));
    }




}
