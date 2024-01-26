<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use App\Models\Urunler;
use Illuminate\Http\Request;

class UserPage extends Controller
{
    public function userPage() {
        $listContact = Contact::all();
        $myOrders = "";
        return view('users.account', compact('listContact', 'myOrders'));
    }
    public function myOrders()
    {
        $listContact = Contact::all();
        $myOrders = Order::all();
        $allProduct = Urunler::all();
        return view('users.account', compact('listContact', 'myOrders', 'allProduct'));

    }
}
