@extends('theme')
@section('title') Ürün Detay @endsection
@section('govde')

    <div class="bread-line">
        <div class="container">
            <a href="">Anasayfa</a>
            <i class="bi bi-arrow-right-short"></i>
            <a href="">Ürünler</a>
            <i class="bi bi-arrow-right-short"></i>
            <a href="">Gelinlik</a>
            <i class="bi bi-arrow-right-short"></i>
            <span>Gelinlik Model 01</span>
        </div>
    </div>


    <!---Product Head--->
    <section class="product-detail-head">
        <div class="container" style=" font-family: 'Jost', sans-serif;">
            <div class="row">

                <div class="col-lg-6">
<!--Slider--->
                    <div class="gallery-container">
                        <div class="swiper-container gallery-main">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://beyazdusler.com/wp-content/uploads/2023/12/ge-1.jpg" alt="Slide 01">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://beyazdusler.com/wp-content/uploads/2023/12/ge-2.jpg" alt="Slide 02">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://beyazdusler.com/wp-content/uploads/2023/12/ge-3.jpg" alt="Slide 03">
                                </div>

                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://beyazdusler.com/wp-content/uploads/2023/12/ge-1.jpg" alt="Slide 01"></div>
                                <div class="swiper-slide">
                                    <img src="https://beyazdusler.com/wp-content/uploads/2023/12/ge-2.jpg" alt="Slide 02"></div>
                                <div class="swiper-slide">
                                    <img src="https://beyazdusler.com/wp-content/uploads/2023/12/ge-3.jpg" alt="Slide 03"></div>


                            </div>
                        </div>
                    </div><script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
                    <script>
                        var galleryThumbs = new Swiper(".gallery-thumbs", {
                            centeredSlides: true,
                            centeredSlidesBounds: true,
                            slidesPerView: 3,
                            watchOverflow: true,
                            watchSlidesVisibility: true,
                            watchSlidesProgress: true,
                            direction: 'vertical'
                        });

                        var galleryMain = new Swiper(".gallery-main", {
                            watchOverflow: true,
                            watchSlidesVisibility: true,
                            watchSlidesProgress: true,
                            preventInteractionOnTransition: true,
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                            effect: 'fade',
                            fadeEffect: {
                                crossFade: true
                            },
                            thumbs: {
                                swiper: galleryThumbs
                            }
                        });

                        galleryMain.on('slideChangeTransitionStart', function() {
                            galleryThumbs.slideTo(galleryMain.activeIndex);
                        });

                        galleryThumbs.on('transitionStart', function(){
                            galleryMain.slideTo(galleryThumbs.activeIndex);
                        });
                    </script>

                    <!---Slider--->

                </div>




                <div class="col-lg-6">
                    <div class="product-detail-head-right">
                        <div class="product-detail-title">
                            Gelinlik Model 01
                        </div>
                        <div class="product-detail-price">
                            ₺17.500,00
                        </div>
                        <div class="product-detail-beden-tablo">
                            <img src="https://beyazdusler.com/wp-content/uploads/2023/12/beyaz-dusler-beden-tablosu-300x288.jpeg" class="img-fluid">
                        </div>
                        <div class="product-detail-buy">
                            <a href="" class="btn btn-dark">Sepete Ekle</a>
                            <a href="" class="btn btn-success">Satın Al</a>
                        </div>
                        <div class="product-detail-secure">
                            <span>Güvenli Ödeme</span>
                            <img src="https://beyazdusler.com/wp-content/uploads/2023/12/Varlik-1.png" class="img-fluid">
                        </div>
                        <hr>
                        <div class="product-detail-info">
                            <p><span>Stok Kodu:</span> 15</p>
                            <p><span>Kategori:</span> Gelinlik</p>
                            <p><span>Paylaş:</span> <i class="bi bi-facebook"></i> <i class="bi bi-instagram"></i> <i class="bi bi-twitter"></i></p>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </section>
    <!---Product Head--->





    <div class="container w-75">
        <hr>
    </div>

    <!---Navs--->
    <div class="container" style="max-width: 80%; font-family: 'Jost', sans-serif;">
    <div class="model-nav">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Açıklama</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Ek Bilgi</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Değerlendirmeler</button>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
    </div>
    </div>
    <!---Navs--->



    <!--More Product-->
    <div class="container" style="max-width: 80%; padding: 50px 0; font-family: 'Jost', sans-serif;">
        <h2 class="text-center mb-3">Bunlarda Hoşunuza Gidebilir</h2>
        <div class="row">
            <div class="col-lg-3">
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
            </div>
            <div class="col-lg-3">
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
            </div>
            <div class="col-lg-3">
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
            </div>
            <div class="col-lg-3">
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
            </div>

        </div>
    </div>


    <!--More Product-->

@endsection
