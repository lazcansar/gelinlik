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
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Gelinlik</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Abiye</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Nişanlık</button>
        </li>
    </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
    </div>

    <!---Navs--->


    <div class="row">


        <?php
        for($i = 1; $i<=4; $i++) {
            echo '<div class="col-lg-3 mb-5 ">
                            <div class="model-main">
                                <div class="model-image">
                                    <img src="https://beyazdusler.com/wp-content/uploads/2023/12/abiy-2-270x350.jpg" class="img-fluid image-one">
                                    <img src="https://beyazdusler.com/wp-content/uploads/2023/12/abiy-1.jpg" class="img-fluid image-two">
                                    <a href="#" class="w-100 p-2 bg-dark text-white d-block text-center insert-card">Sepete Ekle</a>
                                </div>
                                <div class="model-title">
                                    <a href="#">Abiye Model - İşleme Detay</a>
                                </div>
                                <div class="model-price">
                                    ₺17.500,00
                                </div>
                            </div>
                        </div>';
        }
        ?>






    </div>
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
