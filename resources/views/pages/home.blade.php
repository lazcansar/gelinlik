@extends('theme')
@section('title') Anasayfa @endsection
@section('govde')

<div class="home-slider">
    <div class="swiper homeSlider">
        <div class="swiper-wrapper">

            <div class="swiper-slide m-0 p-0">

                <div class="sliderItem">
                    <div class="sliderArea">
                        <div class="sliderTitle">
                            Özel Tasarım Gelinlik Modelleri
                        </div>
                        <div class="sliderButton">
                            <a href="#" class="btn btn-outline-success">Hemen İncele</a>
                        </div>
                    </div>
                </div>


            </div>




            <div class="swiper-slide p-0 m-0">

                <div class="sliderItem sliderItemTwo">
                    <div class="sliderArea">
                        <div class="sliderTitle">
                            En Yeni Gelinlik Modelleri
                        </div>
                        <div class="sliderButton">
                            <a href="#" class="btn btn-outline-success">Hemen İncele</a>
                        </div>
                    </div>
                </div>


            </div>


        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".homeSlider", {
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>



<div class="home-feature">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="home-feature-item">
                    <i class="bi bi-truck"></i> Tüm Ülkelere Gönderim
                </div>
            </div>
            <div class="col-lg-3">
                <div class="home-feature-item">
                    <i class="bi bi-headphones"></i> Canlı Destek
                </div>
            </div>
            <div class="col-lg-3">
                <div class="home-feature-item">
                    <i class="bi bi-shield-lock-fill"></i> Güvenli Ödeme
                </div>
            </div>
            <div class="col-lg-3">
                <div class="home-feature-item">
                    <i class="bi bi-eye"></i> Sipariş İzleme
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="wedding-models">
        <div class="wedding-models-title">
            Gelinlik Modellerimiz
        </div>
        <div class="wedding-models-sub">
            En son eklenen modeller gösteriliyor
        </div>
    </div>
</div>

    <!--Wedding Models--->
<div class="container model-container">

    <!---Navs--->
    <div class="model-nav">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        @if($listCategory)

            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-{{ $listCategory[0]->categoryUrl }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $listCategory[0]->categoryUrl }}" type="button" role="tab" aria-controls="pills-{{ $listCategory[0]->categoryUrl }}" aria-selected="true">{{ $listCategory[0]->categoryTitle }}</button>
            </li>
            @foreach($listCategory as $category)
                @if($category->categoryId > 1)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-{{ $category->categoryUrl }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $category->categoryUrl }}" type="button" role="tab" aria-controls="pills-{{ $category->categoryUrl }}" aria-selected="false">{{ $category->categoryTitle }}</button>
                    </li>
                @endif

            @endforeach
        @endif

    </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        @if($listCategory)
            <div class="tab-pane fade show active" id="pills-{{ $listCategory[0]->categoryUrl }}" role="tabpanel" aria-labelledby="pills-{{ $listCategory[0]->categoryUrl }}-tab" tabindex="0">
                <!---->
                <div class="row">
                    @if($listProduct)
                        @foreach($listProduct as $product)
                            @if($product->categoryId == $listCategory[0]->categoryId)
                                    <?php
                                    $productUrl = $product->productUrl;
                                    $productImage = $product->productCoverImage;
                                    $baseImage = pathinfo($productImage);
                                    $baseImage = $baseImage['basename'];
                                    $coverImage = "images/product/".$productUrl."/".$baseImage;
                                    ?>
                                <div class="col-lg-3 mb-5 ">
                                    <div class="model-main">
                                        <a href="#">
                                            <div class="model-image">
                                                <img src="{{ $coverImage }}" class="img-fluid image-one">
                                                    <?php
                                                    $images = "images/product/".$productUrl;
                                                    $allImages = glob("$images/*", GLOB_BRACE);
                                                    echo '
                            <img src="'.$allImages[0].'" class="img-fluid image-two">';
                                                    ?>
                                                <a href="#" class="w-100 p-2 bg-dark text-white d-block text-center insert-card">Sepete Ekle</a>
                                            </div></a>
                                        <div class="model-title">
                                            <a href="#">{{ $product->productTitle }}</a>
                                        </div>
                                        <div class="model-price">
                                            ₺{{ $product->productPrice }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>
                <!---->
            </div>
            @foreach($listCategory as $category)
                @if($category->categoryId > 1)
                    <div class="tab-pane fade" id="pills-{{ $category->categoryUrl }}" role="tabpanel" aria-labelledby="pills-{{ $category->categoryUrl }}-tab" tabindex="0">
                        <!------>
                        <div class="row">
                            @if($listProduct)
                                @foreach($listProduct as $product)
                                    @if($product->categoryId == $category->categoryId)
                                            <?php
                                            $productUrl = $product->productUrl;
                                            $productImage = $product->productCoverImage;
                                            $baseImage = pathinfo($productImage);
                                            $baseImage = $baseImage['basename'];
                                            $coverImage = "images/product/".$productUrl."/".$baseImage;
                                            ?>
                                        <div class="col-lg-3 mb-5 ">
                                            <div class="model-main">
                                                <a href="#">
                                                    <div class="model-image">
                                                        <img src="{{ $coverImage }}" class="img-fluid image-one">
                                                            <?php
                                                            $images = "images/product/".$productUrl;
                                                            $allImages = glob("$images/*", GLOB_BRACE);
                                                            echo '
                            <img src="'.$allImages[0].'" class="img-fluid image-two">';
                                                            ?>
                                                        <a href="#" class="w-100 p-2 bg-dark text-white d-block text-center insert-card">Sepete Ekle</a>
                                                    </div></a>
                                                <div class="model-title">
                                                    <a href="#">{{ $product->productTitle }}</a>
                                                </div>
                                                <div class="model-price">
                                                    ₺{{ $product->productPrice }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                        </div>

                        <!------>
                    </div>
                @endif

            @endforeach
        @endif


    </div>

    <!---Navs--->


</div>
    <!--Wedding Models--->



    <div class="container promotion" style="max-width: 80%; padding: 50px 0;">
        <div class="row align-items-center">
            <div class="col-lg-6 m-0 p-0 h-100">
                <img src="/images/promotion/1.png">
            </div>
            <div class="col-lg-6 m-0 p-0 h-100">
                <img src="/images/promotion/2.png">
            </div>
            <div class="col-lg-8 m-0 p-0 h-100">
                <img src="/images/promotion/3.jpeg">
            </div>
            <div class="col-lg-4 m-0 p-0 h-100">
                <img src="/images/promotion/4.jpeg">
            </div>
        </div>
    </div>




@endsection
