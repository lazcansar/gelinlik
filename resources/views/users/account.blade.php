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
                            <li><a href="{{ route('my-account') }}">Pano <span><i class="bi bi-person-check"></i></span></a></li>
                            <li><a href="{{ route('my-orders') }}">Siparişler <span><i class="bi bi-bag"></i></span></a></li>
                            <li><a href="">Adresler <span><i class="bi bi-pin-map"></i></span></a></li>
                            <li><a href="">Hesap Detayları <span><i class="bi bi-person-lines-fill"></i> </span></a></li>
                            <li><a href="{{ route('logout') }}">Oturumu Kapat <span><i class="bi bi-escape"></i></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="account-info">
                        @if($myOrders)
                            <table class="table table-striped table-striped">
                                <thead>
                                <tr>
                                    <th>Sipariş No</th>
                                    <th>Ödeme Yöntemi</th>
                                    <th>Gönderim Şekli</th>
                                    <th>Fiyat</th>
                                    <th>Ürün Bilgisi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($myOrders as $order)
                                    @if($order->userId == Auth::user()->id)
                                        @foreach($allProduct as $myProduct)
                                            @if($order->productId == $myProduct->productId)
                                                <tr>
                                                    <td>{{ $order->order_number }}</td>
                                                    <td>{{ $orderMethod = str_replace(['havale-eft', 'kapida-odeme', 'revolut-pay', 'bitcoin-pay'],['Havale/EFT', 'Kapıda Ödeme', 'Revolut', 'Bitcoin'],$order->order_method)  }}</td>
                                                    <td>{{ $shipMethod = str_replace(['sabit-fiyat', 'magaza-teslim', 'ucretsiz-gonder'], ['Ücretli Gönderi', 'Mağazadan Teslim', 'Ücretsiz Gönderi'], $order->ship_method ) }}</td>
                                                    <td>{{ $order->total_price }}</td>
                                                    <td>{{ $myProduct->productTitle }}</td>
                                                </tr>
                                            @endif
                                        @endforeach


                                    @endif
                                @endforeach
                                </tbody>
                            </table>


                        @else
                            <p class="mb-3">Merhaba, <span class="user-name">{{ Auth::user()->name }} {{ Auth::user()->surname }}</span></p>
                            <p class="mb-3">Hesap panosundan <a href="">Son Siparişlerinizi</a> görüntüleyebilir, <a href="">Gönderim ve Fatura Adreslerinizi</a> yönetebilir ve <a href="">Şifreniz ile Hesap Ayrıntılarınızı</a> düzenleyebilirsiniz. </p>
                            <p>Siparişiniz hakkında bilgi almak için veya destek talebiniz için <a href=""> bilgi@beyazdusler.com</a> adresine E-Posta gönderebilirsiniz.</p>
                        @endif

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
