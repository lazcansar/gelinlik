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
            @if($customerAll)
                <a href="/admin-panel">Admin Paneli</a>
                <i class="bi bi-arrow-right-short"></i>
                <span>Müşteri Hizmetleri</span>
            @elseif($customerInsert)
                <a href="/admin-panel">Admin Paneli</a>
                <i class="bi bi-arrow-right-short"></i>
                <a href="{{ route('customer-view') }}">Müşteri Hizmetleri</a>
                <i class="bi bi-arrow-right-short"></i>
                <span>Sayfa Ekle</span>
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
                            <a class="nav-link" href="{{ route('customer-view') }}"><i class="bi bi-file-fill"></i> Kayıtlı Sayfalar</a>
                        </li>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="{{ route('customer-insert') }}"><i class="bi bi-upload"></i> Sayfa Ekle</a>
                        </li>
                    </ul>
                </div>


                <div class="col-lg-9">


                    <!----------->

                    @if($customerDetail)
                        <div class="admin-sss-page-form">
                            <div class="alert text-center bg-secondary text-white">
                                - {{ $customerDetail->title }} - isimli kaydı güncelliyorsunuz...
                            </div>
                            <form action="{{ route('customer-update', $customerDetail->id) }}" method="POST">
                                @csrf

                                <label for="sss-title">Müşteri Hizmetleri Sayfa Başlığı *</label>
                                <input type="text" name="customTitle" value="{{$customerDetail->title}}" class="form-control mb-4">

                                <label for="sss-title">URL *</label>
                                <input type="text" name="customUrl" value="{{$customerDetail->url}}" class="form-control mb-4">

                                <label for="sss-content">İçerik...</label>
                                <!-- Place the first <script> tag in your HTML's <head> -->
                                <script src="https://cdn.tiny.cloud/1/ekyyppga37880rl12p326haultygdx1veo5av63hnd5qna1l/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

                                <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
                                <script>
                                    tinymce.init({
                                        selector: 'textarea',
                                        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                                        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                                        tinycomments_mode: 'embedded',
                                        tinycomments_author: 'Author name',
                                        mergetags_list: [
                                            { value: 'First.Name', title: 'First Name' },
                                            { value: 'Email', title: 'Email' },
                                        ],
                                        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
                                    });
                                </script>
                                <textarea id="sss-content" name="customContent">{{$customerDetail->content}}</textarea>
                                <button type="submit" class="btn btn-success mt-3 w-100" style="background-color: #C8815F; border-color: #C8815F; padding: 10px 0;">Güncelle</button>
                            </form>
                        </div>
                    @endif




                    <!---------->

                    @if($customerAll)
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Sayfa Başlık</th>
                            <th>Eylem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($customerAll)
                            @foreach($customerAll as $listPage)
                                <tr>
                                    <td>{{ $listPage->title }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('customer-detail', $listPage->id) }}">Güncelle</a>
                                        <a class="btn btn-danger" onclick="return confirm('Silmek istediğinize emin misiniz?')" href="{{ route('customer-delete', $listPage->id) }}">Sil</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>

                    </table>
                    @endif


                    <!---------->
                    @if($customerInsert)
                        <div class="admin-sss-page-form">
                            <form action="{{ route('customer-insert-db') }}" method="POST">
                                @csrf

                                <label for="sss-title">Müşteri Hizmetleri Sayfa Başlığı *</label>
                                <input type="text" name="customTitle" placeholder="Örn. Gizlilik Politikası" class="form-control mb-4">

                                <label for="sss-title">URL *</label>
                                <input type="text" name="customUrl" placeholder="gizlilik-politikasi" class="form-control mb-4">

                                <label for="sss-content">İçerik...</label>
                                <!-- Place the first <script> tag in your HTML's <head> -->
                                <script src="https://cdn.tiny.cloud/1/ekyyppga37880rl12p326haultygdx1veo5av63hnd5qna1l/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

                                <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
                                <script>
                                    tinymce.init({
                                        selector: 'textarea',
                                        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                                        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                                        tinycomments_mode: 'embedded',
                                        tinycomments_author: 'Author name',
                                        mergetags_list: [
                                            { value: 'First.Name', title: 'First Name' },
                                            { value: 'Email', title: 'Email' },
                                        ],
                                        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
                                    });
                                </script>
                                <textarea id="sss-content" name="customContent" placeholder="Gizlilik ve güvenlik politikası..."></textarea>
                                <button type="submit" class="btn btn-success mt-3 w-100" style="background-color: #C8815F; border-color: #C8815F; padding: 10px 0;">Kayıt Ekle</button>
                            </form>
                        </div>
                    @endif


                    <!---------->

                </div>
            </div>
        </div>
    </section>


@endsection
