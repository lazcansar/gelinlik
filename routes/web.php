<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminpageController;


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
Route::get('/urun-detay', [PagesController::class, 'productDetailView'])->name('product-detail');
Route::get('/kategori', [PagesController::class, 'categoryView'])->name('category-page');
Route::get('/odeme', [PagesController::class, 'checkoutView'])->name('checkout-page');
Route::get('/odeme-basarili', [PagesController::class, 'checkoutSuccess'])->name('checkout-success');


Route::get('/giris-yap', [PagesController::class, 'loginPageView'])->name('login-page');
Route::get('/kayit-ol', [PagesController::class, 'registerPageView'])->name('register-page');


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
