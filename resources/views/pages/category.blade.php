@extends('theme')
@section('title') Ürün Detay @endsection
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

<section class="category-page">
    <div class="category-page-bread">
        <div class="category-page-title">
            <div class="container">
                Kategori Sayfası
            </div>
        </div>
        <div class="container">
            <a href="">Anasayfa</a>
            <i class="bi bi-arrow-right-short"></i>
            <span>Ürünler</span>
        </div>
    </div>


    <!---Show Page--->

    <div class="container" style="max-width: 80%; padding: 50px 0;">
        <div class="row">


            <div class="col-lg-4">
                <div class="filter-category">
                    <div class="filter-category-title">
                        Filtre
                    </div>
                    <hr>
                    <div class="filter-category-cat">
                        <span>Kategoriler</span>
                        <form action="" method="get">
                            <div class="category-list">
                                <input type="checkbox" id="gelinlik">
                                <label for="gelinlik">Gelinlik</label>
                            </div>
                            <div class="category-list">
                                <input type="checkbox" id="nisanlik">
                                <label for="nisanlik">Nişanlık</label>
                            </div>

                            <div class="category-list">
                                <input type="checkbox" id="abiye">
                                <label for="abiye">Abiye</label>
                            </div>

                            <hr>

                            <span>Beden Tablosu</span>

                            <div class="category-list">
                                <input type="checkbox" id="xl">
                                <label for="xl">XL</label>
                            </div>

                            <div class="category-list">
                                <input type="checkbox" id="l">
                                <label for="l">L</label>
                            </div>

                            <div class="category-list">
                                <input type="checkbox" id="m">
                                <label for="m">M</label>
                            </div>

                            <div class="category-list">
                                <input type="checkbox" id="s">
                                <label for="s">S</label>
                            </div>
                            <hr>
                            <span>Fiyat</span>

                            <div class="category-list">
                                <input type="checkbox" id="1">
                                <label for="1">1.000,00 TL - 5.000,00 TL</label>
                            </div>
                            <div class="category-list">
                                <input type="checkbox" id="2">
                                <label for="2">5.000,00 TL - 10.000,00 TL</label>
                            </div>
                            <div class="category-list">
                                <input type="checkbox" id="3">
                                <label for="1">10.000,00 TL - 20.000,00 TL</label>
                            </div>
                            <div class="category-list">
                                <input type="checkbox" id="4">
                                <label for="4">20.000,00 TL - 40.000,00 TL</label>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success" style="padding:10px 30px; background-color: #C8815F;">Uygula</button>


                        </form>
                    </div>
                </div>

            </div>



            <div class="col-lg-8">
                <div class="total-item-count">
                    * Web sitemizde kayıtlı toplam 13 adet Abiye, Gelinlik ve Nişanlık modeli bulunmaktadır.
                </div>
                    <div class="row">
                        <?php
                            for($i = 1; $i<=9; $i++) {
                                echo '<div class="col-lg-4 mb-5 ">
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
                <!--More Product-->

            </div>




        </div>
    </div>


    <!---Show Page--->


</section>



@endsection
