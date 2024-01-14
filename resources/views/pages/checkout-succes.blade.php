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
                    Siparişiniz Alındı
                </div>
            </div>
            <div class="container">
                <a href="">Anasayfa</a>
                <i class="bi bi-arrow-right-short"></i>
                <span>Ödeme</span>
            </div>
        </div>
    </section>

    <div class="container" style="font-family: 'Jost', sans-serif; padding: 50px 0; max-width: 80%;">
        <div class="table-head">
            <div class="row">
                <div class="col-md-3" style="padding: 10px 25px; border-right: 1px dashed #C8815F;">
                    <p style="font-weight: 300;">Sipariş Numarası:</p>
                    <p>6409</p>
                </div>
                <div class="col-md-3" style="padding: 10px 25px; border-right: 1px dashed #C8815F;">
                    <p style="font-weight: 300;">Tarih:</p>
                    <p>14 Ocak 2023</p>
                </div>
                <div class="col-md-3" style="padding: 10px 25px; border-right: 1px dashed #C8815F;">
                    <p style="font-weight: 300;">Toplam:</p>
                    <p>₺7.500,00</p>
                </div>
                <div class="col-md-3" style="padding: 10px 25px;">
                    <p style="font-weight: 300;">Ödeme Yönetemi:</p>
                    <p>Banka Havalesi/EFT</p>
                </div>
            </div>
        </div>

        <div class="success-message">
            Siparişiniz oluşturuldu.<br> Sipariş detaylarınız mail@afyazilim.com adresine gönderilmiştir.
        </div>
    </div>



@endsection
