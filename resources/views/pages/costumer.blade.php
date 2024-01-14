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


            <div class="col-lg-3">
                <!---Navs-->
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Gizlilik Politikası</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Kargo & İade</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Çerez Politikası</button>
                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Şartlar ve Koşullar</button>
                </div>
                <!--navs-->
            </div>



            <div class="col-lg-9">
                <!---Content-->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
                </div>
                <!---Conetnt-->
            </div>


        </div>
    </div>
</div>



</section>

@endsection
