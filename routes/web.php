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



Route::get('/admin-panel/sss-yonetim', [AdminpageController::class, 'adminSssCreate'])->name('sss-yonetim');
Route::get('/admin-panel/sss-yonetim/ekle', [AdminpageController::class, 'adminSssOlustur'])->name('sss-kayit');
Route::post('/admin-panel/sss-yonetim/ekle', [AdminpageController::class, 'adminSssCreateReg'])->name("sss-kayit-ekle");
Route::get('/admin-panel/sss-yonetim/sil/{id}', [AdminpageController::class, 'sssDelete'])->name('sss-sil');
Route::get('/admin-panel/sss-yonetim/detay/{id}', [AdminpageController::class, 'sssDetail'])->name('sss-goruntule');
Route::post('/admin-panel/sss-yonetim/guncelle/{id}', [AdminpageController::class, 'sssUpdate'])->name('sss-guncelle');

