@extends('theme')
@section('title') Ürün Detay @endsection
@section('stilAlani')
    .category-page-title .container {
    font-weight: 500;
    font-size: 46px;
    }
    .category-page-bread .container a {
    color: #111;
    }
    .category-page-bread .container span {
    font-weight: 300;
    }

@endsection
@section('govde')

    <section class="category-page">
        <div class="category-page-bread">
            <div class="category-page-title">
                <div class="container">
                    Ödeme Sayfası
                </div>
            </div>
            <div class="container">
                <a href="">Anasayfa</a>
                <i class="bi bi-arrow-right-short"></i>
                <span>Ödeme</span>
            </div>
        </div>
    </section>


        <div class="checkout-page">
            <div class="container">
                <div class="row">


                    <div class="col-lg-6">
                        <div class="checkout-form">
                            <span>Fatura Detayları</span>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-4" placeholder="Ad *">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-4" placeholder="Soyad *">
                                    </div>
                                </div>
                                <select class="form-select mb-4">
                                    <option value="">Türkiye</option>
                                    <option value="">USA</option>
                                </select>
                                <input type="text" class="form-control mb-4" placeholder="Adres *">
                                <input type="text" class="form-control mb-4" placeholder="Posta Kodu">
                                <input type="text" class="form-control mb-4" placeholder="İl *">
                                <input type="text" class="form-control mb-4" placeholder="Adres *">
                                <input type="email" class="form-control mb-4" placeholder="E-Posta Adresi *">
                                <input type="tel" class="form-control mb-4" placeholder="Telefon No *">
                                <input type="text" class="form-control mb-4" placeholder="Firma Adı">
                                <textarea class="form-control mb-4" placeholder="Sipariş ile ilgili notlar" rows="5"></textarea>


                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="checkout-view">
                            <span>Siparişiniz</span>
                            <div class="checkout-summary">
                                <span class="text-uppercase" style="font-size: 18px; font-weight: 400">Ürün</span>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <img src="https://beyazdusler.com/wp-content/uploads/2023/12/a1.jpg" class="img-fluid">
                                    </div>
                                    <div class="col-md-4">
                                        Abiye Model 01
                                    </div>
                                    <div class="col-md-4">
                                        ₺7.500,00
                                    </div>
                                </div>
                                <hr>
                                <div class="shipping-method">
                                    <span class="text-uppercase" style="font-size: 18px; font-weight: 400">Gönderim</span>
                                    <div class="shipping-method-list">
                                        <input type="checkbox" id="free-shipping">
                                        <label for="free-shipping">Ücretsiz Gönderim</label>
                                    </div>
                                    <div class="shipping-method-list">
                                        <input type="checkbox" id="fixed-price">
                                        <label for="fixed-price">Sabit Fiyat: ₺45,00</label>
                                    </div>
                                    <div class="shipping-method-list">
                                        <input type="checkbox" id="shop-buy">
                                        <label for="shop-buy">Mağazadan Teslim</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="total-price">
                                    <div class="row">
                                        <div class="col-md-6">Toplam Tutar</div>
                                        <div class="col-md-6 text-end">₺7.500,00</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="buy-method">
                                    <span class="text-uppercase" style="font-size: 18px; font-weight: 400">Ödeme Yöntemi</span>
                                    <div class="shipping-method-list">
                                        <input type="checkbox" id="havale-eft">
                                        <label for="havale-eft">Banka havelesi/EFT</label>
                                        <p style="font-weight: 300; text-align: justify; text-indent: 30px; margin-top: 5px; font-size: 16px;">Ödemenizi doğrudan banka hesabımıza yapınız. Lütfen ilgili Sipariş Numarasını ödemenizin açıklama kısmına yazınız. Ödemeniz onaylanmadıkça siparişiniz gönderilmeyecektir.</p>
                                    </div>
                                    <div class="shipping-method-list">
                                        <input type="checkbox" id="kapida-odeme">
                                        <label for="kapida-odeme">Kapıda Ödeme</label>
                                    </div>
                                    <div class="shipping-method-list">
                                        <input type="checkbox" id="revolut-pay">
                                        <label for="revolut-pay">Revolut Pay</label>
                                    </div>
                                    <div class="shipping-method-list">
                                        <input type="checkbox" id="shop-buy">
                                        <label for="shop-buy">Bitcoin Pay</label>
                                    </div>
                                    <p style="font-weight: 300; text-align: justify; text-indent: 30px; margin-top: 5px;">Kişisel verileriniz siparişinizi işleme koymak, bu web sitesindeki deneyiminizi desteklemek ve belgemizde açıklanan diğer amaçlar için kullanılacaktır.
                                        Detaylı bilgi için <a href="">gizlilik ilkesi.</a></p>
                                    <div class="shipping-method-list mt-3">
                                        <input type="checkbox" id="sartlar-kosullar">
                                        <label for="sartlar-kosullar">Şartları ve Koşulları okudum kabul ediyorum. <a href="">Şartlar ve Koşullar</a> *</label>
                                    </div>
                                    <button type="submit" class="btn btn-dark w-100" style="padding: 10px;">Siparişi Onayla</button>
                                </div>




                            </div>


                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>

@endsection
