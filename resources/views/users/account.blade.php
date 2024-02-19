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
    .orderNumber {
    color: #ff6600;
    font-weight: 500;
    }
    .orderInfo span {
    font-weight: 500;
    }
    .myProfileForm label {
    margin-bottom: 10px;
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
                    <div class="alert alert-info">
                        <p><strong>Bitcon ile yapılacak ödemeler için: </strong><br> TH2LGnitf6szCEdbYL8D1Vox5aYTJTFn5u</p>
                        <p>* Tether Trc20</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-success">
                        <p><strong>Revolut ile yapılacak ödemeler için:</strong><br> IE41REVO99036090876776</p>
                        <p>* REVOIE23</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-warning">
                        <p><strong>Havele/EFT ile yapılacak ödemeler için:</strong> <br>ZELİHA ŞAHİNLER</p>
                            <p>AKBANK TR63 0004 6001 6688 8000 1325 20</p>
                    </div>
                </div>
            </div>



            <div class="row">

                <div class="col-md-4">
                    <div class="account-menu">
                        <ul>
                            <li><a href="{{ route('my-account') }}">Pano <span><i class="bi bi-person-check"></i></span></a></li>
                            <li><a href="{{ route('my-orders') }}">Siparişler <span><i class="bi bi-bag"></i></span></a></li>
                            <li><a href="{{ route('my-adress') }}">Adresler <span><i class="bi bi-pin-map"></i></span></a></li>
                            <li><a href="{{ route('my-profile', Auth::user()->id) }}">Hesap Detayları <span><i class="bi bi-person-lines-fill"></i> </span></a></li>
                            <li><a href="{{ route('logout') }}">Oturumu Kapat <span><i class="bi bi-escape"></i></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="account-info">
                        @if(session('error'))
                            <div class="alert alert-warning">
                                <p>{{ session('error') }}</p>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif
                            @if(session('updated'))
                                <div class="alert alert-success">
                                    <p>{{ session('updated') }}</p>
                                </div>
                            @endif

                        @if($myAdress[0])
                                    @if($myAdress[0]->user_id == auth()->user()->id)
                                        <div class="myProfileForm">
                                            <form action="{{ route('my-adress-updated', $myAdress[0]->id) }}" method="POST">

                                                @csrf
                                                <label>Adres Tipi</label>
                                                <input type="text" class="form-control mb-3" name="adres_type" value="{{ $myAdress[0]->adress_type }}">

                                                <label>Telefon No</label>
                                                <input type="text" class="form-control mb-3" name="phone" value="{{ $myAdress[0]->adress_phone}}">
                                                <label>Açık Adres</label>
                                                <textarea class="form-control mb-3" rows="5" name="open_adres">{{ $myAdress[0]->adress_long }}</textarea>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>İlçe</label>
                                                        <input type="text" class="form-control mb-3" name="city_in" value="{{ $myAdress[0]->adress_in_city }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>İl</label>
                                                        <input type="text" class="form-control mb-3" name="city" value="{{ $myAdress[0]->adress_city }}">
                                                    </div>
                                                </div>
                                                <label>Ülke</label>
                                                <input type="text" class="form-control mb-3" name="country" value="{{ $myAdress[0]->adress_country }}">

                                                <button type="submit" class="btn btn-outline-success">Güncelle</button>
                                            </form>
                                        </div>
                                @endif
                        @elseif($myAdress[1])
                                        <div class="myProfileForm">
                                            <form action="{{ route('my-adress-update') }}" method="POST">

                                                @csrf
                                                <label>Adres Tipi</label>
                                                <input type="text" class="form-control mb-3" name="adres_type" placeholder="Ev veya İş vb.">

                                                <label>Telefon No</label>
                                                <input type="text" class="form-control mb-3" name="phone" placeholder="0(530) 123 45 67">
                                                <label>Açık Adres</label>
                                                <textarea class="form-control mb-3" rows="5" name="open_adres" placeholder="Örnek Mah. Örnek Cad. No:123 D:18 Fatih / İstanbul"></textarea>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>İlçe</label>
                                                        <input type="text" class="form-control mb-3" name="city_in" placeholder="İlçe">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>İl</label>
                                                        <input type="text" class="form-control mb-3" name="city" placeholder="Şehir">
                                                    </div>
                                                </div>
                                                <label>Ülke</label>
                                                <input type="text" class="form-control mb-3" name="country" placeholder="Ülke">

                                                <button type="submit" class="btn btn-outline-success">Ekle</button>
                                            </form>
                                        </div>


                        @elseif($userProfile)
                            @if($userProfile->id == Auth::user()->id)
                                <div class="myProfileForm">
                                    <form action="{{ route('my-profile-update') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ad</label>
                                                <input type="text" name="ad" class="form-control" value="{{ $userProfile->name }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Soyad</label>
                                                <input type="text" name="soyad" class="form-control" value="{{ $userProfile->surname }}">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>T.C. Kimlik No</label>
                                                <input type="number" class="form-control" name="kimlikno" value="{{ $userProfile->identification }}">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Şifreniz</label>
                                                <input type="password" name="password" class="form-control" placeholder="*****">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Yeni Şifreniz</label>
                                                <input type="password" name="newpassword" class="form-control" placeholder="*****">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Tekrar Yeni Şifreniz</label>
                                                <input type="password" name="newpassword2" class="form-control" placeholder="*****">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-success mt-3">Bilgilerimi Güncelle</button>
                                    </form>
                                </div>
                            @else
                                <p>Lütfen kendi profil sayfanızı düzenleyin!</p>
                                <p class="fw-bold text-danger">Tekrar edilen denemeler halinde hesabınız kalıcı olarak kapatılacaktır!</p>
                            @endif



                        @elseif($orderDetail)
                            <div class="orderNumber">
                                Sipariş Numarası: {{ $orderDetail->order_number }}
                                <hr>
                                <p class="text-black ">Sipariş Durumu: <span class="fw-normal">@if($orderDetail->order_status == 'siparis-alindi') Sipariş alındı @elseif($orderDetail->order_status == 'siparis-kargoya-verildi') Sipariş kargoya verildi @elseif($orderDetail->order_status == 'odeme-alindi') Ödeme alındı @elseif($orderDetail->order_status == 'siparis-hazirlaniyor') Sipariş hazırlanıyor @endif</span></p>
                            </div>
                            <hr>
                            <p><span style="font-weight: 500;">Kargo Takip Numarası:</span> @if($orderDetail->tracking_number !=Null) {{ $orderDetail->tracking_number }} @else Kargo takip numarası henüz sistemi girilmedi @endif</p>
                            <hr>
                            <div class="orderInfo">
                                <p><span>Ad Soyad:</span> {{ $orderDetail->name }} {{ $orderDetail->surname }}</p>
                                <hr>
                                <p><span>E-Mail:</span> {{ $orderDetail->email }}</p>
                                <hr>
                                <p><span>GSM No:</span> {{ $orderDetail->phone }}</p>
                                <hr>
                                <p class="text-capitalize"><span>Adres:</span> {{ $orderDetail->adress }} {{ $orderDetail->city }} {{ $orderDetail->country }}</p>
                                <hr>
                                <p><span>Ödeme Yönetemi:</span> {{ $orderMethod = str_replace(['havale-eft', 'kapida-odeme', 'revolut-pay', 'bitcoin-pay'],['Havale/EFT', 'Kapıda Ödeme', 'Revolut', 'Bitcoin'],$orderDetail->order_method)  }}</p>
                                <hr>
                                <p><span>Teslimat Şekli:</span> {{ $shipMethod = str_replace(['ucretsiz-gonderi', 'sabit-fiyat', 'magaza-teslim'],['Ücretsiz Gönderi', 'Ücretli Gönderi', 'Mağazadan Teslim'], $orderDetail->ship_method)  }}</p>
                                <hr>
                                <p><span>Sipariş Tarihi:</span> {{ $orderDetail->created_at }}</p>
                                <hr>
                                <p><span>Sipariş Verilen Ürün:</span>
                                    @php $productIds = explode(',', $orderDetail->productId); @endphp
                                    @foreach($productIds as $multiProduct)
                                        @if($orderDetail->userId == Auth::user()->id)
                                            @foreach($allProduct as $myProduct)
                                                @if($multiProduct == $myProduct->productId)
                                                        <?php
                                                        $productUrl = $myProduct->productUrl;
                                                        $productImage = $myProduct->productCoverImage;
                                                        $baseImage = pathinfo($productImage);
                                                        $baseImage = $baseImage['basename'];
                                                        $coverImage = "images/product/".$productUrl."/".$baseImage;
                                                        ?>
                                                    <a href="{{ route('product-detail', $myProduct->productUrl) }}">
                                                        <div class="card d-inline-block mt-3">
                                                            <div class="card-header">
                                                                <div class="card-img-top text-center">
                                                                    <img src="/{{ $coverImage }}" class="border border-3 p-1" height="150">
                                                                </div>
                                                                <div class="card-body">
                                                                    {{ $myProduct->productTitle }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                    </p>
                            </div>




                        @elseif($myOrders)
                            <table class="table table-striped table-striped">
                                <thead>
                                <tr>
                                    <th>Sipariş No</th>
                                        <th>Ödeme Şekli</th>
                                    <th>Fiyat</th>
                                    <th>Sipariş Tarihi</th>
                                    <th>Detay</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($myOrders as $order)
                                    @if($order->userId == Auth::user()->id)
                                        <tr>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $orderMethod = str_replace(['havale-eft', 'kapida-odeme', 'revolut-pay', 'bitcoin-pay'],['Havale/EFT', 'Kapıda Ödeme', 'Revolut', 'Bitcoin'],$order->order_method)  }}</td>
                                            <td> ₺{{ $order->total_price }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td><a href="{{ route('my-orders-detail', $order->order_number) }}" class="btn btn-outline-primary btn-sm">Sipariş Detayı</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>


                        @else
                            <p class="mb-3">Merhaba, <span class="user-name">{{ Auth::user()->name }} {{ Auth::user()->surname }}</span></p>
                            <p class="mb-3">Hesap panosundan <a href="{{ route('my-orders') }}">Son Siparişlerinizi</a> görüntüleyebilir, <a href="{{ route('my-adress') }}">Gönderim ve Fatura Adreslerinizi</a> yönetebilir ve <a href="{{ route('my-profile', Auth::user()->id) }}">Şifreniz ile Hesap Ayrıntılarınızı</a> düzenleyebilirsiniz. </p>
                            <p>Siparişiniz hakkında bilgi almak için veya destek talebiniz için <a href="mailto:{{ $listContact[0]->mail }}"> {{ $listContact[0]->mail }}</a> adresine E-Posta gönderebilirsiniz.</p>
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
