@extends('theme')
@section('title') Sıkça Sorulan Sorular @endsection
@section('govde')


<section class="sss-page">

<div class="single-page-head">
    <div class="single-page-head-sub text-uppercase">
        Sıkça Sorulan Sorular
    </div>
    <div class="single-page-head-title">
        Soru & Cevap
    </div>
    <div class="single-page-head-content text-center">
        En çok merak edilen konular hakkında sorulan soruları ve<br> cevaplarını bulabilirisiniz.
    </div>
</div>


    <div class="container">
        <div class="d-flex align-items-center flex-column" style="padding: 50px 0;">
            <div class="sss-accordion-title">
                Sıkça Sorulan Sorular
            </div>
        <!---Accordion-->
        <div class="w-50">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Accordion Item #1
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Accordion Item #2
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                </div>
            </div>
        </div>

            <div class="other-ask text-center">
                <p class="mt-5">Farklı bir sorunuz mu var?</p>
                <a href="{{ route('contact-page') }}" class="btn btn-dark btn-contact mt-4">İletişim</a>
            </div>

        </div>

        <!---Accordion-->
        </div>
    </div>



</section>

@endsection
