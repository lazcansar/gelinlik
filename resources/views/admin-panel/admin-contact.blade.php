@extends('theme')
@section('title') Anasayfa @endsection
@section('stilAlani')
    .admin-sss-page {
    margin-bottom: 3rem;
    }
    .nav-item {
    padding: 15px 0;
    margin-bottom: 0
    }
    .form-control, .form-select {
    padding: 10px 20px;
    }
    label {
    margin-bottom: 1rem;
    }

@endsection
@section('govde')

    <div class="bread-line">
        <div class="container">
            <a href="">Admin Paneli</a>
            <i class="bi bi-arrow-right-short"></i>
            <span>Ürünler</span>
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
                            <a class="nav-link" href=""><i class="bi bi-house-fill"></i> İletişim Bilgisi Güncelle</a>
                        </li>

                    </ul>
                </div>


                <div class="col-lg-9">

                        <div class="admin-sss-page-form">
                            <form action="{{ route('company-update', $companyInfo->id) }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>GSM No</label>
                                        <input type="text" class="form-control mb-3" name="phone" value="{{$companyInfo->phone}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mail</label>
                                        <input type="text" class="form-control mb-3" name="mail" value="{{$companyInfo->mail}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Facebook</label>
                                        <input type="text" class="form-control mb-3" name="facebook" value="{{$companyInfo->facebook}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Instagram</label>
                                        <input type="text" class="form-control mb-3" name="instagram" value="{{$companyInfo->instagram}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Twitter</label>
                                        <input type="text" class="form-control mb-3" name="twitter" value="{{$companyInfo->twitter}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>LinkedIn</label>
                                        <input type="text" class="form-control mb-3" name="linkedin" value="{{$companyInfo->linkedin}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tiktok</label>
                                        <input type="text" class="form-control mb-3" name="tiktok" value="{{$companyInfo->tiktok}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Youtube</label>
                                        <input type="text" class="form-control mb-3" name="youtube" value="{{$companyInfo->youtube}}">
                                    </div>
                                </div>



                                <label>Adres</label>
                                <input type="text" class="form-control mb-3" name="adres" value="{{$companyInfo->adress}}">

                                <label>Google Haritalar</label>
                                <textarea type="text" class="form-control mb-3" rows="5" name="google_maps">{{$companyInfo->google_maps}}</textarea>


                                <button type="submit" class="btn btn-success btn-contact w-100">Güncelle</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>



@endsection
