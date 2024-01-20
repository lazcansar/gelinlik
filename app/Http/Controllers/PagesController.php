<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
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
                $q->where('categoryId', $request->category);
            });
        }
        $products = $stmt->get();



        return view('pages.category',compact('listContact', 'listProduct', 'listCategory', 'products'));
    }

    public function checkoutView()
    {
        $listContact = Contact::all();
        return view('pages.checkout', compact('listContact'));
    }
    public function checkoutSuccess()
    {
        $listContact = Contact::all();
        return view('pages.checkout-succes', compact('listContact'));
    }
}
