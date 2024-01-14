@extends('theme')
@section('title') İletişim @endsection
@section('govde')


<section class="contact-page">

<div class="single-page-head">
    <div class="single-page-head-sub text-uppercase">
        Bize Ulaşın!
    </div>
    <div class="single-page-head-title">
        İletişim
    </div>
    <div class="single-page-head-content text-center">
        Beyazdusler.com web sayfamız üzerinden gelinlik<br> modellerine dair bize ulaşabilirsiniz.
    </div>
</div>

    <!--Maps-->
<div class="contact-google-maps">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3010.1891311787303!2d28.943780476129536!3d41.02111797134858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caba22100f3c67%3A0x2eed459b93577d4c!2zQWxpIEt1xZ_Dp3UsIEZldnppIFBhxZ9hIENkLiBObzo0NiBLYXQ6MSwgMzQwODMgRmF0aWgvxLBzdGFuYnVs!5e0!3m2!1str!2str!4v1704908109317!5m2!1str!2str" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>


    <!--Maps-->


    <div class="container contact-bottom">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-adress-title">
                    Adres
                </div>
                <div class="contact-adress-content">
                    Ali Kuşçu Mah. Fevzipaşa Caddesi No:46 Kat:1 Fatih / İstanbul
                </div>
                <div class="contact-adress-title">
                    İletişim
                </div>
                <div class="contact-adress-content">
                    <div class="contact-adress-line">
                        <span>Telefon:</span> +90 (531) 354 20 84
                    </div>
                    <div class="contact-adress-line">
                        <span>E-Posta:</span> bilgi@beyazdusler.com
                    </div>
                </div>
                <div class="contact-adress-title">
                    Çalışma Saatlerimiz
                </div>
                <div class="contact-adress-content">
                    <p>Pazartesi – Cuma : 08:30 – 20:00</p>
                    <p>Cumartesi: 10:00 – 16:00</p>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="contact-form">
                    <div class="contact-form-title">
                        Bize Yazın
                    </div>
                    <div class="contact-form-sub">
                        Kişisel bilgileriniz 3. kişiler ile paylaşılmamaktadır. Lütfen zorunlu alanları doldurun.
                    </div>
                    <div class="contact-form-inputs">
                        <form action="" method="post">
                            @csrf

                        <label for="adsoyad">Ad Soyad</label>
                        <input type="text" id="adsoyad" class="form-control mb-3" name="adsoyad">

                        <label for="eposta">E-Posta</label>
                        <input type="email" id="eposta" class="form-control mb-3" name="eposta">

                        <label for="konu">Konu</label>
                        <input type="text" id="konu" class="form-control mb-3" name="konu">

                        <label for="mesaj">Mesaj</label>
                        <textarea class="form-control mb-3" name="mesaj" rows="5"></textarea>
                        <button type="submit" class="btn btn-dark btn-contact rounded-0">Gönder</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

@endsection
