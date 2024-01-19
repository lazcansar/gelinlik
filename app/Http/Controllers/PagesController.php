<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Musterihizmetleri;
use App\Models\SssModel;
use App\Models\Urunler;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function homePageView()
    {
        $listProduct = Urunler::all();
        $listCategory = Category::all();
        return view('pages.home', compact('listProduct', 'listCategory'));
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
    public function productDetailView($productUrl)
    {
        $categories = Category::all();
        $productDetail = Urunler::whereproducturl($productUrl)->first();
        return view('pages.product', compact('productDetail', 'categories'));
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
