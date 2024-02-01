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
    .admin-sss-page {
    margin-bottom: 3rem;

    }
    .nav-item {
    padding: 15px 0;
    margin-bottom: 0
    }
    .admin-order-table * {
    font-size: 14px;
    }
@endsection
@section('govde')

    <div class="bread-line">
        <div class="container">
            <a href="{{ route('admin-home') }}">Admin Paneli</a>
            <i class="bi bi-arrow-right-short"></i>
            <span>Sipariş Bilgileri</span>
        </div>
    </div>


    @if(session('success'))
        <div class="container">
            <div class="alert alert-success">{{ session('success') }}</div>
        </div>
    @endif
    @if(session('delete'))
        <div class="container">
            <div class="alert alert-warning">{{ session('delete') }}</div>
        </div>
    @endif
    @if(session('update'))
        <div class="container">
            <div class="alert alert-warning">{{ session('update') }}</div>
        </div>
    @endif

    <section class="admin-sss-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav flex-column bg-light">
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="{{ route('admin-siparisler') }}"><i class="bi bi-house-fill"></i> Sipariş Bilgileri Görüntüle</a>
                        </li>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href=""><i class="bi bi-search"></i> Sipariş Arama </a>
                        </li>

                    </ul>
                </div>


                <div class="col-lg-9">
                    <div class="admin-order-table">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Sipariş No</th>
                                <th>Sipariş Tarihi</th>
                                <th>Sipariş Durumu</th>
                                <th>Kargo Bilgisi</th>
                                <th>Fiyat</th>
                                <th>İşlem</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($orderAll as $order)
                                @foreach($userAll as $user)
                                    @if($order->userId == $user->id)
                                    <tr>
                                        <td>{{ $order->order_number }} - {{ $user->name }} {{ $user->surname }}</td>
                                        <td>{{ $pureDate = substr($order->created_at, 0, 10) }}</td>
                                        <td>
                                            <form action="" method="post">
                                                @csrf

                                                <select class="form-select form-select-sm" name="order-status">
                                                    <option value="">Sipariş alındı</option>
                                                    <option value="">Ödeme alındı</option>
                                                    <option value="">Sipariş hazırlanıyor</option>
                                                    <option value="">Sipariş kargoya verildi</option>
                                                </select>
                                                <button type="submit" class="btn btn-sm btn-outline-primary w-100 mt-2">Güncelle</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="" method="post">
                                                @csrf

                                                <input type="text" class="form-control form-control-sm" placeholder="Kargo takip no" name="order-tracking">
                                                <button type="submit" class="btn btn-sm btn-outline-primary w-100 mt-2">Ekle</button>
                                            </form>
                                        </td>
                                        <td>
                                            ₺{{ $order->total_price }}
                                        </td>
                                        <td>
                                            <a class="d-block w-100 mb-2 btn btn-sm btn-outline-info" href="{{ route('admin-siparis-detay', $order->order_number) }}">Detay Gör</a>
                                            <a class="d-block w-100 mb-2 btn btn-sm btn-outline-danger" href="">Sil</a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="container">
                        <div class="d-flex justify-content-center">
                            {{ $orderAll->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



@endsection
