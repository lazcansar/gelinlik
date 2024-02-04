<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminpageController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Str;
use App\Http\Controllers\UserPage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'homePageView'])->name('home-page');
Route::get('/iletisim', [PagesController::class, 'contactPageView'])->name('contact-page');
Route::get('/sikca-sorulan-sorular', [PagesController::class, 'sssPageView'])->name('sss-page');
Route::get('/hakkimizda', [PagesController::class, 'aboutPageView'])->name('about-page');
Route::get('/musteri-hizmetleri', [PagesController::class, 'customerPageView'])->name('customer-page');
Route::get('/online-gelinlik-dikimi', [PagesController::class, 'weddingPageView'])->name('wedding-create');
Route::get('/showroom', [PagesController::class, 'showroomPageView'])->name('showroom-page');
Route::get('/urun-detay/{productUrl}', [PagesController::class, 'productDetailView'])->name('product-detail');
Route::get('/ara', [PagesController::class, 'searchPage'])->name('search-page');
Route::get('/ara/urun', [PagesController::class, 'searhExecute'])->name('search-execute');

Route::get('/urunler', [PagesController::class, 'categoryView'])->name('category-page');
Route::get('/urunler/filter', [PagesController::class, 'categorySearch'])->name('category-filter');
Route::get('/odeme', [PagesController::class, 'checkoutView'])->name('checkout-page');
Route::get('/odeme-basarili', [PagesController::class, 'checkoutSuccess'])->name('checkout-success');


Route::get('/giris-yap', [AuthController::class, 'login'])->name('login-page');
Route::post('/giris-yap', [AuthController::class, 'loginController'])->name('login-insert');
Route::get('/kayit-ol', [AuthController::class, 'register'])->name('register-page');
Route::post('/kayit-ol', [AuthController::class, 'register'])->name('register-insert');
Route::get('/cikis-yap', [AuthController::class, 'logout'])->name('logout');



//Admin Page Home
Route::get('/admin-panel', [AdminpageController::class, 'adminIndex'])->name('admin-home');
//SSS
Route::get('/admin-panel/sss-yonetim', [AdminpageController::class, 'adminSssCreate'])->name('sss-yonetim');
Route::get('/admin-panel/sss-yonetim/ekle', [AdminpageController::class, 'adminSssOlustur'])->name('sss-kayit');
Route::post('/admin-panel/sss-yonetim/ekle', [AdminpageController::class, 'adminSssCreateReg'])->name("sss-kayit-ekle");
Route::get('/admin-panel/sss-yonetim/sil/{id}', [AdminpageController::class, 'sssDelete'])->name('sss-sil');
Route::get('/admin-panel/sss-yonetim/detay/{id}', [AdminpageController::class, 'sssDetail'])->name('sss-goruntule');
Route::post('/admin-panel/sss-yonetim/guncelle/{id}', [AdminpageController::class, 'sssUpdate'])->name('sss-guncelle');
//Customer Services
Route::get('/admin-panel/musteri-hizmet-yonetim', [AdminpageController::class, 'adminCustomerServices'])->name('customer-view');
Route::get('/admin-panel/musteri-hizmet-yonetim/ekle', [AdminpageController::class, 'adminCustomerServiceOlustur'])->name('customer-insert');
Route::post('/admin-panel/musteri-hizmet-yonetim/ekle', [AdminpageController::class, 'adminCustomerServiceOlustur'])->name('customer-insert-db');
Route::get('/admin-panel/musteri-hizmet-yonetim/sil/{id}', [AdminpageController::class, 'adminCustomerDelete'])->name('customer-delete');
Route::get('/admin-panel/musteri-hizmet-yonetim/detay/{id}', [AdminpageController::class, 'adminCustomerDetail'])->name('customer-detail');
Route::post('/admin-panel/musteri-hizmet-yonetim/guncelle/{id}', [AdminpageController::class, 'adminCustomerDetail'])->name('customer-update');
//Category Services
Route::get('/admin-panel/category', [AdminpageController::class, 'adminCategory'])->name('category-view');
Route::get('/admin-panel/category/ekle', [AdminpageController::class, 'adminCategoryInsert'])->name('category-insert-page');
Route::post('/admin-panel/category/ekle', [AdminpageController::class, 'adminCategoryInsert'])->name('category-insert');
Route::get('/admin-panel/category/delete/{id}', [AdminpageController::class, 'adminCategoryDelete'])->name('category-delete');
Route::get('/admin-panel/category/duzenle/{id}', [AdminpageController::class, 'adminCategoryDetail'])->name('category-detail');
Route::post('/admin-panel/category/guncelle/{id}', [AdminpageController::class, 'adminCategoryDetail'])->name('category-update');

//Product Services
Route::get('/admin-panel/product', [AdminpageController::class, 'adminProductView'])->name('product-view');
Route::get('/admin-panel/product/ekle', [AdminpageController::class, 'adminProductInsert'])->name('product-insert-page');
Route::post('/admin-panel/product/ekle', [AdminpageController::class, 'adminProductInsert'])->name('product-insert');
Route::get('/admin-panel/product-gallery', [AdminpageController::class, 'adminProductGallery'])->name('product-gallery');
Route::post('/admin-panel/product-gallery/ekle', [AdminpageController::class, 'adminProductGallery'])->name('product-gallery-insert');
Route::get('/admin-panel/product-gallery/delete/{id}', [AdminpageController::class, 'adminProductDelete'])->name('product-delete');
Route::get('/admin-panel/product-gallery/detay/{id}', [AdminpageController::class, 'adminProductDetail'])->name('product-update-detail');
Route::post('/admin-panel/product-gallery/guncelle/{id}', [AdminpageController::class, 'adminProductDetail'])->name('product-update');
Route::get('/admin-panel/product-gallery/resim-goruntule/{id}', [AdminpageController::class, 'adminProductImageDelete'])->name('image-delete');
Route::get('/admin-panel/product-gallery/resim-sil/{dizin}/{newImage}', [AdminpageController::class, 'deleteImage'])->name('delete-image');

//Admin Contact
Route::get('/admin-panel/company-info/{id}', [AdminpageController::class, 'companyInfo'])->name('company-info');
Route::post('/admin-panel/company-info/{id}', [AdminpageController::class, 'companyInfo'])->name('company-update');
//Admin Wish List
Route::get('/admin-panel/siparisler', [AdminpageController::class, 'siparisler'])->name('admin-siparisler');
Route::get('/admin-panel/siparisler/detay/{order_number}', [AdminpageController::class, 'adminOrderDetail'])->name('admin-siparis-detay');
Route::post('/admin-panel/siparisler/order-status/{id}', [AdminpageController::class, 'orderStatusUpdate'])->name('order-status-update');
Route::post('/admin-panel/siparisler/tracking-number/{id}', [AdminpageController::class, 'trackingNumberUpdate'])->name('order-tracking-update');
Route::get('/admin-panel/siparisler/ara', [AdminpageController::class, 'orderSearch'])->name('order-search');
Route::get('/admin-panel/siparisler/bul', [AdminpageController::class, 'orderSearchExecute'])->name('order-search-execute');






//User Account Page
Route::get('/hesabim', [UserPage::class, 'userPage'])->name('my-account');
Route::get('/hesabim/siparislerim', [UserPage::class, 'myOrders'])->name('my-orders');
Route::get('/hesabim/siparislerim/{order_number}', [UserPage::class, 'showOrder'])->name('my-orders-detail');
Route::get('/hesabim/hesap-bilgilerim/{id}', [UserPage::class, 'myProfile'])->name('my-profile');
Route::post('/hesabim/hesap-bilgilerim/', [UserPage::class, 'myProfileUpdate'])->name('my-profile-update');
Route::get('/hesabim/adreslerim', [UserPage::class, 'myAdress'])->name('my-adress');
Route::post('/hesabim/adreslerim/ekle', [UserPage::class, 'myAdressUpdate'])->name('my-adress-update');
Route::post('/hesabim/adreslerim/guncelle/{id}', [UserPage::class, 'myAdressUpdated'])->name('my-adress-updated');



//Order Page
Route::get('/odeme/{productId}', [PagesController::class, 'orderPage'])->name('buy');
Route::post('/odeme/satin-al', [PagesController::class, 'orderSubmit'])->name('buy-submit');
