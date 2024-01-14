<?php

namespace App\Http\Controllers;

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
        return view('pages.sss');
    }
    public function aboutPageView () {
        return view('pages.about');
    }
    public function customerPageView ()
    {
        return view('pages.costumer');
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
