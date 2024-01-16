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
    .form-control {
    padding: 10px 20px;
    }
    label {
    margin-bottom: 1rem;
    }

@endsection
@section('govde')
    <div class="bread-line">
        <div class="container">
            @if($categoryFake)
                <a href="/admin-panel">Admin Paneli</a>
                <i class="bi bi-arrow-right-short"></i>
                <a href="{{ route('category-view') }}">Kategoriler</a>
                <i class="bi bi-arrow-right-short"></i>
                <span>Kategori Ekle</span>
            @elseif($category)
                <a href="">Admin Paneli</a>
                <i class="bi bi-arrow-right-short"></i>
                <span>Kategoriler</span>
            @endif
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
                            <a class="nav-link" href="{{ route('category-view') }}"><i class="bi bi-house-fill"></i> Kategoriler</a>
                        </li>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="{{ route('category-insert') }}"><i class="bi bi-upload"></i> Kateogri Ekle</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="admin-sss-page-form">

                        <!------->
                        @if($category)
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Kategori Adı</th>
                                        <th>Eylem</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($category)
                                        @foreach($category as $cat)
                                            <tr>
                                                <td>{{ $cat->categoryTitle }}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{ route('category-detail', $cat->categoryId) }}">Güncelle</a>
                                                    <a class="btn btn-danger" onclick="return confirm('Silmek istediğinize emin misiniz?')" href="{{ route('category-delete', $cat->categoryId) }}">Sil</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>

                                </table>
                        @endif
                        @if($categoryDetail)
                            <div class="admin-sss-page-form">
                                <div class="alert text-center bg-secondary text-white">
                                    - {{ $categoryDetail->categoryTitle }} - Kategorisini güncelliyorsunuz...
                                </div>
                            <form action="{{ route('category-update', $categoryDetail->categoryId) }}" method="POST">
                                @csrf

                                <label>Kategori Başlığı</label>
                                <input type="text" name="categoryTitle" class="form-control mb-3" value="{{$categoryDetail->categoryTitle}}">

                                <label>Kategori URL</label>
                                <input type="text" name="categoryUrl" class="form-control mb-3" value="{{$categoryDetail->categoryUrl}}">

                                <label>Kategori Açıklama</label>
                                <textarea class="form-control mb-3" rows="5" name="categoryContent">{{$categoryDetail->categoryContent}}</textarea>

                                <button type="submit" class="btn btn-success w-100" style="background-color: #C8815F; border-color: #C8815F; padding: 10px 0;">Güncelle</button>
                            </form>
                            </div>
                        @endif

                        @if($categoryFake)
                            <form action="{{ route('category-insert') }}" method="POST">
                                @csrf

                                <label>Kategori Başlığı</label>
                                <input type="text" name="categoryTitle" class="form-control mb-3">

                                <label>Kategori URL</label>
                                <input type="text" name="categoryUrl" class="form-control mb-3">

                                <label>Kategori Açıklama</label>
                                <textarea class="form-control mb-3" rows="5" name="categoryContent"></textarea>

                                <button type="submit" class="btn btn-success w-100" style="background-color: #C8815F; border-color: #C8815F; padding: 10px 0;">Oluştur</button>
                            </form>
                        @endif


                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
