@extends('theme')
@if($customerDetail)

    @section('title') {{ $customerDetail->title }} @endsection
    @section('govde')


        <section class="costumer-page">
            <div class="single-page-head">
                <div class="single-page-head-sub text-uppercase">
                    Müşteri Hizmetleri
                </div>
                <div class="single-page-head-title">
                    Yasal Bilgiler
                </div>
                <div class="single-page-head-content text-center">
                    {{ $customerDetail->title }}
                </div>
            </div>

            <div class="container">
                <div class="costumer-main">
                    <div class="row">


                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12">
                            <!---Navs-->
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    @foreach($customerLinks as $customLink)
                                            <a class="nav-link" href="{{ route('customer-page-detail', $customLink->url) }}">{{ $customLink->title }}</a>
                                    @endforeach
                            </div>

                            <!--navs-->
                        </div>



                        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-12">
                            <!---Content-->
                            <div class="tab-content">
                                {!! $customerDetail->content !!}
                            </div>
                            <!---Conetnt-->
                        </div>


                    </div>
                </div>
            </div>



        </section>

    @endsection

@else


        @section('title') Müşteri Hizmetleri @endsection
        @section('govde')


            <section class="costumer-page">
                <div class="single-page-head">
                    <div class="single-page-head-sub text-uppercase">
                        Müşteri Hizmetleri
                    </div>
                    <div class="single-page-head-title">
                        Yasal Bilgiler
                    </div>
                    <div class="single-page-head-content text-center text-capitalize">
                        Gizlilik politikası, üyelik sözleşmesi, mesafeli satış sözleşmesi ve daha fazlası...
                    </div>
                </div>

                <div class="container">
                    <div class="costumer-main">
                        <div class="row">


                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12">
                                <!---Navs-->
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    @foreach($customer as $customLink)
                                        <a class="nav-link" href="{{ route('customer-page-detail', $customLink->url) }}">{{ $customLink->title }}</a>
                                    @endforeach
                                </div>

                                <!--navs-->
                            </div>



                            <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-12">
                                <!---Content-->
                                <div class="tab-content">
                                    <div class="alert alert-warning"> Lütfen sol alanda yer alan başlıklardan birini seçin.</div>
                                </div>
                                <!---Conetnt-->
                            </div>


                        </div>
                    </div>
                </div>



            </section>

        @endsection


@endif

