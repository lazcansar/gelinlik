@auth
@extends('theme')
@section('title') Hesabım @endsection
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

    <div class="bread-line">
        <div class="container">
            <a href="">Anasayfa</a>
            <i class="bi bi-arrow-right-short"></i>
            <span>Hesabım</span>
        </div>
    </div>


    <section class="my-account">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="account-menu">
                        <ul>
                            <li><a href="">Pano <span><i class="bi bi-person-check"></i></span></a></li>
                            <li><a href="">Siparişler <span><i class="bi bi-bag"></i></span></a></li>
                            <li><a href="">Adresler <span><i class="bi bi-pin-map"></i></span></a></li>
                            <li><a href="">Hesap Detayları <span><i class="bi bi-person-lines-fill"></i> </span></a></li>
                            <li><a href="{{ route('logout') }}">Oturumu Kapat <span><i class="bi bi-escape"></i></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="account-info">
                        <p class="mb-3">Merhaba, <span class="user-name">{{ Auth::user()->name }} {{ Auth::user()->surname }}</span></p>
                        <p class="mb-3">Hesap panosundan <a href="">Son Siparişlerinizi</a> görüntüleyebilir, <a href="">Gönderim ve Fatura Adreslerinizi</a> yönetebilir ve <a href="">Şifreniz ile Hesap Ayrıntılarınızı</a> düzenleyebilirsiniz. </p>
                        <p>Siparişiniz hakkında bilgi almak için veya destek talebiniz için <a href=""> bilgi@beyazdusler.com</a> adresine E-Posta gönderebilirsiniz.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
@endauth
@guest
{!! redirect()->route('login-page') !!}
@endguest
