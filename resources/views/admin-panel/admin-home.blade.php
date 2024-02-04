@auth
    @if(Auth::user()->rol == 1)
@extends('theme')
@section('title') Anasayfa @endsection
@section('stilAlani')
    .admin-page-home {
    font-family: 'Jost', sans-serif;
    padding: 50px 0;
    }
    .admin-page-home-title p {
    font-size: 36px;
    text-align: center;
    font-weight: 600;
    letter-spacing: 2px;
    }
    .admin-page-home-title span {
    display:block;
    text-align:center;
    }
    .admin-page-home-link {
    background-color:#85a85a;
    padding: 20px 30px;
    border-radius: 5px;
    text-transform:uppercase;
    text-align: center;
    }
    .admin-page-home-link a {
    color:#fff;
    display: block;
    transition: .3s all;
    font-weight: 500;
    }
    .admin-page-home-link a:hover {
    color: #424242;
    }
@endsection
@section('govde')

    <section class="admin-page-home">
        <div class="container">
            <div class="admin-page-home-title mb-4">
                <p>Yönetim Paneli</p>
                <span>İşlem yapmak için alan seçimi yapın!</span>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="admin-page-home-link">
                        <a href="{{ route('sss-yonetim') }}"><i class="bi bi-lightbulb-fill"></i> Sıkça Sorulan Sorular</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="admin-page-home-link">
                        <a href="{{ route('customer-view') }}"><i class="bi bi-file-earmark-fill"></i> Müşteri Hizmetleri Sayfası</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="admin-page-home-link">
                        <a href="{{ route('category-view') }}"><i class="bi bi-list"></i> Kategoriler</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="admin-page-home-link">
                        <a href="{{ route('product-view') }}"><i class="bi bi-boxes"></i> Ürünler</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="admin-page-home-link">
                        <a href="{{ route('company-info', 1) }}"><i class="bi bi-info-circle-fill"></i> Firma İletişim Bilgileri</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="admin-page-home-link">
                        <a href="{{ route('admin-siparisler') }}"><i class="bi bi-cart-fill"></i> Siparişler</a>
                    </div>
                </div>


            </div>

        </div>

    </section>


@endsection
    @else
        {!! redirect()->route('home-page'); !!}
    @endif
@endauth
@guest
    {!! redirect()->route('home-page'); !!}
@endguest
