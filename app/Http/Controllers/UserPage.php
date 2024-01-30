<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Urunler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Termwind\Question;

class UserPage extends Controller
{
    public function userPage() {
        $listContact = Contact::all();
        $myOrders = "";
        $orderDetail = "";
        $userProfile = '';
        $myAdress = array('', '');
        return view('users.account', compact('listContact', 'myOrders', 'orderDetail', 'userProfile', 'myAdress'));
    }
    public function myOrders()
    {
        $listContact = Contact::all();
        $myOrders = Order::all();
        $allProduct = Urunler::all();
        $orderDetail = '';
        $userProfile = '';
        $myAdress = array('', '');
        return view('users.account', compact('listContact', 'myOrders', 'allProduct', 'orderDetail', 'userProfile', 'myAdress'));

    }
    public function showOrder($ordernumber)
    {
        $listContact = Contact::all();
        $allProduct = Urunler::all();
        $myOrders = "";
        $userProfile = '';
        $myAdress = array('', '');
        $orderDetail = Order::whereorderNumber($ordernumber)->first();
        return view('users.account', compact('listContact', 'allProduct', 'orderDetail', 'myOrders', 'userProfile', 'myAdress'));
    }

    public function myProfile($id)
    {
        $listContact = Contact::all();
        $allProduct = Urunler::all();
        $myOrders = "";
        $orderDetail = '';
        $myAdress = array('', '');
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
        if (isset($identification)) {
            User::whereId(auth()->user()->id)->update([
                'identification' => $identification,
            ]);
            return redirect()->back()->with('success', 'Bilgiler güncellendi');
        }
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
        $myRegAdress = Adress::whereuserId(Auth::user()->id)->first();
        $myNotRegAdress = 'Trabzon';
        $myAdress = array($myRegAdress, $myNotRegAdress);
        return view('users.account', compact('listContact', 'myOrders', 'orderDetail', 'userProfile', 'myAdress'));
    }

    public function myAdressUpdate(Request $request)
    {
        $adres_type = $request->adres_type;
        $phone = $request->phone;
        $open_adres = $request->open_adres;
        $city_in = $request->city_in;
        $city = $request->city;
        $country = $request->country;
        $user_id = auth()->user()->id;
        Adress::create([
            'adress_type' => $adres_type,
            'adress_phone' => $phone,
            'adress_long' => $open_adres,
            'adress_in_city' => $city_in,
            'adress_city' => $city,
            'adress_country' => $country,
            'user_id' => $user_id,
        ]);
        return redirect()->back()->with('updated', 'Adres güncellendi / Eklendi');
    }

    public function myAdressUpdated(Request $request, $id)
    {
        $adres_type = $request->adres_type;
        $phone = $request->phone;
        $open_adres = $request->open_adres;
        $city_in = $request->city_in;
        $city = $request->city;
        $country = $request->country;
        Adress::whereId($id)->update([
            'adress_type' => $adres_type,
            'adress_phone' => $phone,
            'adress_long' => $open_adres,
            'adress_in_city' => $city_in,
            'adress_city' => $city,
            'adress_country' => $country,
        ]);
        return redirect()->back()->with('updated', 'Adres güncellendi / Eklendi');
    }


}
