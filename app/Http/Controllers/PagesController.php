<?php

namespace App\Http\Controllers;

use App\Models\Musterihizmetleri;
use App\Models\SssModel;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function homePageView()
    {
        return view('pages.home');
    }
    public function contactPageView () {
        return view('pages.contact');
    }
    public function sssPageView () {
        $sss = SssModel::all();
        return view('pages.sss', compact('sss'));
    }
    public function aboutPageView () {
        return view('pages.about');
    }
    public function customerPageView ()
    {
        $customer = Musterihizmetleri::all();
        return view('pages.costumer', compact('customer'));
    }
    public function weddingPageView()
    {
        return view('pages.weddingcreate');
    }
    public function showroomPageView() {
        return view('pages.showroom');
    }
    public function loginPageView() {
        return view('auth.login');
    }
    public function registerPageView() {
        return view('auth.register');
    }
    public function productDetailView()
    {
        return view('pages.product');
    }
    public function categoryView()
    {
        return view('pages.category');
    }
    public function checkoutView()
    {
        return view('pages.checkout');
    }
    public function checkoutSuccess()
    {
        return view('pages.checkout-succes');
    }
}
