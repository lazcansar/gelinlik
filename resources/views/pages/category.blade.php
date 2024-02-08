@extends('theme')
@section('title') Ürünler @endsection
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
                Ürünler Sayfası
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
                        <form action="{{ route('category-filter') }}" method="get">

                            @foreach($listCategory as $filterCategory)
                                <div class="category-list">
                                    <input type="checkbox" name="category[]" value="{{ $filterCategory->categoryId }}" id="{{ $filterCategory->categoryUrl }}">
                                    <label for="{{ $filterCategory->categoryUrl }}">{{ $filterCategory->categoryTitle }}</label>
                                </div>
                            @endforeach
                            <hr>

                            <span>Beden Tablosu</span>

                            <div class="category-list">
                                <input type="checkbox" name="beden[]" value="xl" id="xl">
                                <label for="xl">XL</label>
                            </div>

                            <div class="category-list">
                                <input type="checkbox" name="beden[]" value="l" id="l">
                                <label for="l">L</label>
                            </div>

                            <div class="category-list">
                                <input type="checkbox" name="beden[]" value="m" id="m">
                                <label for="m">M</label>
                            </div>

                            <div class="category-list">
                                <input type="checkbox" name="beden[]" value="s" id="s">
                                <label for="s">S</label>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success" style="padding:10px 30px; background-color: #C8815F;">Uygula</button>


                        </form>
                    </div>
                </div>

            </div>



            <div class="col-lg-8">
                <div class="total-item-count">
                </div>
                    <div class="row">
                        @if($products)
                            @foreach($products as $product)
                                    <?php
                                    $productUrl = $product->productUrl;
                                    $productImage = $product->productCoverImage;
                                    $baseImage = pathinfo($productImage);
                                    $baseImage = $baseImage['basename'];
                                    $coverImage = "images/product/".$productUrl."/".$baseImage;
                                    ?>
                                <div class="col-lg-4 mb-5 ">
                                    <div class="model-main">
                                        <a href="{{ route('product-detail', $product->productUrl) }}">
                                            <div class="model-image">
                                                <img src="../{{ $coverImage }}" class="img-fluid image-one">
                                                    <?php
                                                    $images = "images/product/".$productUrl;
                                                    $allImages = glob("$images/*", GLOB_BRACE);
                                                    echo '
                            <img src="../'.$allImages[0].'" class="img-fluid image-two">';
                                                    ?></a>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="productId" value="{{ $product->productId }}">
                                                <button type="submit" class="w-100 p-2 rounded-0 btn btn-dark text-white d-block text-center insert-card">Sepete Ekle</button>
                                                </form>
                                            </div>
                                        <div class="model-title">
                                            <a href="{{ route('product-detail', $product->productUrl) }}">{{ $product->productTitle }}</a>
                                        </div>
                                        <div class="model-price">
                                            ₺{{ $product->productPrice }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @elseif($listProduct)


                        @foreach($listProduct as $product)
                                <?php
                                $productUrl = $product->productUrl;
                                $productImage = $product->productCoverImage;
                                $baseImage = pathinfo($productImage);
                                $baseImage = $baseImage['basename'];
                                $coverImage = "images/product/".$productUrl."/".$baseImage;
                                ?>
                            <div class="col-lg-4 mb-5 ">
                                <div class="model-main">
                                    <a href="{{ route('product-detail', $product->productUrl) }}">
                                        <div class="model-image">
                                            <img src="../{{ $coverImage }}" class="img-fluid image-one">
                                                <?php
                                                $images = "images/product/".$productUrl;
                                                $allImages = glob("$images/*", GLOB_BRACE);
                                                echo '
                            <img src="../'.$allImages[0].'" class="img-fluid image-two">';
                                                ?></a>
                                            <form action="{{ route('add-cart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="productId" value="{{ $product->productId }}">
                                                <button type="submit" class="w-100 p-2 rounded-0 btn btn-dark text-white d-block text-center insert-card">Sepete Ekle</button>
                                            </form>
                                        </div>
                                    <div class="model-title">
                                        <a href="{{ route('product-detail', $product->productUrl) }}">{{ $product->productTitle }}</a>
                                    </div>
                                    <div class="model-price">
                                        ₺{{ $product->productPrice }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                <div class="container">
                    <div class="d-flex justify-content-center">
                        {{ $listProduct->links() }}
                    </div>
                </div>
                <!--More Product-->

            </div>




        </div>
    </div>


    <!---Show Page--->


</section>



@endsection
