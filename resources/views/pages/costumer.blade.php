@extends('theme')
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
        <div class="single-page-head-content text-center">
            Kullanım şartları, gizlilik politikası, kargo ve iade, çerez<br> politikası, kupon ve promosyon servisleri
        </div>
    </div>

<div class="container">
    <div class="costumer-main">
        <div class="row">


            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12">
                <!---Navs-->
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @if($customer)
                        <button class="nav-link active" id="v-pills-{{ $customer[0]->url }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $customer[0]->url }}" type="button" role="tab" aria-controls="v-pills-{{ $customer[0]->url }}" aria-selected="true">{{ $customer[0]->title }}</button>
                        @foreach($customer as $custom)
                            @if($custom->id > 1)
                                <button class="nav-link" id="v-pills-{{ $custom->url }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $custom->url }}" type="button" role="tab" aria-controls="v-pills-{{ $custom->url }}" aria-selected="false">{{ $custom->title }}</button>
                            @endif

                        @endforeach
                    @endif
                </div>
                <!--navs-->
            </div>



            <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-12">
                <!---Content-->
                <div class="tab-content" id="v-pills-tabContent">
                    @if($customer)
                        <div class="tab-pane fade show active" id="v-pills-{{ $customer[0]->url }}" role="tabpanel" aria-labelledby="v-pills-{{ $customer[0]->url }}-tab" tabindex="0">{!! $customer[0]->content !!}</div>
                        @foreach($customer as $custom)
                            @if($custom->id > 1)
                            <div class="tab-pane fade" id="v-pills-{{ $custom->url }}" role="tabpanel" aria-labelledby="v-pills-{{ $custom->url }}-tab" tabindex="0">{!! $custom->content !!}</div>
                            @endif
                        @endforeach
                    @endif

                </div>
                <!---Conetnt-->
            </div>


        </div>
    </div>
</div>



</section>

@endsection
