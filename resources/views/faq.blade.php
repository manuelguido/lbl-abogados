@extends('layouts.app')

@include('components.nav')

@section('title', 'LB&L Pregunta Frequente')

@section('header')

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

@endsection

@section('content')

<style type="text/css">
    body {
        background: rgba(197, 195, 217, .05) !important;
    }
    html,
    body,
    header,
    .view {
      height: 20vh;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 30vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 30vh;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
              .navbar:not(.top-nav-collapse) {
                  background: #1C2331!important;
              }
          }
</style>

@include('components.whatsapp_icon')

    <!-- Full Page Intro -->
    <div class="view full-page-intro" style="background-image: url('{{ asset('img/newswallpaper.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
        <!-- Mask & flexbox options-->
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
        </div>
        <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->

    <div class="container-fluid py-5 px-4 px-md-5 mb-5">
        <div class="row px-lg-5 mb-5 justify-content-center">
            <div class="col-12 col-lg-8 mb-5 pb-5">
                <h1 class="h3 w600 primary-dark">{{$faq->question}}</h1>
                <hr>
                @if($faq->topic_id <> NULL)
                <h1 class="h6 info text-uppercase w500 mb-4">{{$faq->topic_name}}</h1>
                @endif
                <p class="new-parragraph">
                    {!!$faq->answer!!}
                </p>
                <a href="/faqs" class="primary h6"><i class="fas fa-arrow-left mr-2 primary"></i>Volver a preguntas frecuentes</a>
            </div>
        </div>
    </div>

@include('components.footer')
@endsection
