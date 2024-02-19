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

    <div class="container border border-1 mt-4 mb-4 shadow" style="font-family: 'Jost', sans-serif; padding: 0 0 50px 0; max-width: 80%;">
        <div class="success-message">
            Siparişiniz oluşturuldu.
        </div>
        <div class="mt-3 text-center">
            Sipariş detaylarınıza <a href="{{ route('my-orders') }}"> Hesabım -> Siparişler</a> sayfasından ulaşabilirsiniz.
        </div>
    </div>



@endsection
