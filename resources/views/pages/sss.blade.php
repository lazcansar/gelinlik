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
            @if($sss)
                @foreach($sss as $ss)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $ss->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $ss->id }}">
                                {{ $ss->title }}
                            </button>
                        </h2>
                        <div id="flush-collapse{{ $ss->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{!! $ss->content !!}</div>
                        </div>
                    </div>


                @endforeach
            @endif

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
