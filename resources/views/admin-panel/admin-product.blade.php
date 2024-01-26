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
                <a href="{{ route('admin-home') }}">Admin Paneli</a>
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
                            <a class="nav-link" href="{{ route('product-view') }}"><i class="bi bi-house-fill"></i> Kayıtlı Ürünler</a>
                        </li>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="{{ route('product-insert-page') }}"><i class="bi bi-upload"></i> Ürün Ekle</a>
                        </li>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="{{ route('product-gallery') }}"><i class="bi bi-images"></i> Ürün Fotoğrafları Ekle</a>
                        </li>
                    </ul>
                </div>


                <div class="col-lg-9">
                    <!---Gallery Image Delete-->
                    @if($imageDelete)
                        <div class="row">
                            <?php
                                $images = "images/product/$imageDelete->productUrl";
                                $allImages = glob("$images/*", GLOB_BRACE);
                                $dizin = $imageDelete->productUrl;
                                ?>
                            @foreach($allImages as $image)
                                <?php
                                    $newImage = pathinfo($image);
                                    $newImage = $newImage['basename'];
                                    ?>
                                <div class="col-md-3">
                                    <img src="http://localhost:8000/{{ $image }}" class="img-fluid">
                                    <a href="{{ route('delete-image', [$dizin, $newImage]) }}" class="btn btn-danger w-100 rounded-0">Resim Sil</a>

                                </div>
                            @endforeach


                        </div>


                    @endif



                    <!-- Gallery Image Insert--->
                    @if($allGalleryProduct)

                        <div class="admin-sss-page-form">
                            <form action="{{ route('product-gallery-insert') }}" method="post" enctype="multipart/form-data">
                                @csrf


                                <label>Ürüne ait resimleri seçin!</label>
                                <input type="file" name="images[]" class="form-control mb-3" multiple>

                                <label>Resimlerin yükleneceği ürünü seçin</label>
                                <select class="form-select mb-3" name="product">
                                    @foreach($allGalleryProduct as $gallery)
                                        <option value="{{ $gallery->productUrl }}">{{ $gallery->productTitle }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-upload"></i> Yükle</button>
                            </form>
                        </div>
                    @endif
                    <!-- Gallery Image Insert--->
                    @if($listProduct)
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Ürün Adı</th>
                                <th>Ürün Fiyatı</th>
                                <th>Ürün Stock</th>
                                <th>Ürün Bedeni</th>
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($listProduct)
                            @foreach($listProduct as $product)
                                <tr>
                                    <td>{{ $product->productTitle }}</td>
                                    <td>{{ $product->productPrice }}</td>
                                    <td>{{ $product->productStock }}</td>
                                    <td>{{ $product->productInfo }}</td>
                                    <td>
                                        <a href="{{ route('product-update-detail', $product->productId) }}" class="btn btn-primary">Güncelle</a>
                                        <a onclick="return confirm('Silmek istediğinize emin misiniz?')"  href="{{ route('product-delete', $product->productId) }}" class="btn btn-danger">Sil</a>
                                        <a href="{{ route('image-delete', $product->productId) }}" class="btn btn-warning">Resim Sil</a>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            {{ $listProduct->links() }}
                        </div>
                    </div>
                    @endif

                    <!---->
                    @if($insertCategory)
                        <div class="admin-sss-page-form">
                            <form action="{{ route('product-insert') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <label>Ürün Adı</label>
                                <input type="text" class="form-control mb-3" name="title" placeholder="Gelinlik Model 1">

                                <label>Ürün URL Adresi</label>
                                <input type="text" class="form-control mb-3" name="url" placeholder="gelinlik-model-1">

                                <label>Ürün Fiyatı</label>
                                <input type="text" class="form-control mb-3" name="price" placeholder="21.500,00">

                                <label>Ürün Stok Miktarı</label>
                                <input type="text" class="form-control mb-3" name="stock" placeholder="3">

                                <label>Ürün Açıklama Yazısı</label>
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
                                <textarea name="productContent" placeholder="Ürün açıklama, tanıtım yazısı..."></textarea>

                                <label class="mt-3">Ürün Teknik Bilgileri
                                    <span class="d-block" style="font-size: 12px; font-weight: 300;">Stokta olan beden ebatlarını arasına "," (virgül) işareti koyarak sıralayın. Örneği aşağıda yer almaktadır.</span></label>
                                <input type="text" class="form-control mb-3" name="info" placeholder="XL, L, M, S, Xs">

                                <label>Kategori Seçimi</label>
                                <select name="category" class="form-select mb-3">
                                    @if($categorySelect)
                                        @foreach($categorySelect as $category)
                                            <option value="{{ $category->categoryId }}">{{ $category->categoryTitle }}</option>
                                        @endforeach
                                    @endif
                                </select>

                                <label>Ürün Kapak Resmi - 1080x1350px</label>
                                <input type="file" name="image" class="form-control">

                                <button type="submit" class="btn btn-success mt-3 w-100" style="background-color: #C8815F; border-color: #C8815F; padding: 10px 0;">Kayıt Ekle</button>
                            </form>
                        </div>
                    @endif

                    <!---->

                    <!--Update--->

                    @if($productDetail)
                        <div class="admin-sss-page-form">
                            <form action="{{ route('product-update', $productDetail->productId) }}" method="POST">
                                @csrf

                                <label>Ürün Adı</label>
                                <input type="text" class="form-control mb-3" name="title" value="{{ $productDetail->productTitle }}">

                                <label>Ürün URL Adresi</label>
                                <input type="text" class="form-control mb-3" name="url" value="{{ $productDetail->productUrl }}">

                                <label>Ürün Fiyatı</label>
                                <input type="text" class="form-control mb-3" name="price" value="{{ $productDetail->productPrice }}">

                                <label>Ürün Stok Miktarı</label>
                                <input type="text" class="form-control mb-3" name="stock" value="{{ $productDetail->productStock }}">

                                <label>Ürün Açıklama Yazısı</label>
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
                                <textarea name="productContent">{{ $productDetail->productContent }}</textarea>

                                <label class="mt-3">Ürün Teknik Bilgileri
                                    <span class="d-block" style="font-size: 12px; font-weight: 300;">Stokta olan beden ebatlarını arasına "," (virgül) işareti koyarak sıralayın. Örneği aşağıda yer almaktadır.</span></label>
                                <input type="text" class="form-control mb-3" name="info" value="{{ $productDetail->productInfo }}">



                                <button type="submit" class="btn btn-success mt-3 w-100" style="background-color: #C8815F; border-color: #C8815F; padding: 10px 0;">Ürün Güncelle</button>
                            </form>
                        </div>
                    @endif

                    <!---Update--->

                </div>
            </div>
        </div>
    </section>





@endsection
