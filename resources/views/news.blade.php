@extends('layouts.app')

@include('components.nav')

@section('title', 'LB&L Novedades')

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
    <div class="view full-page-intro" style="background-image: url('{{ asset('storage/site/'.$config->news_img) }}'); background-repeat: no-repeat; background-size: cover;">
        <!-- Mask & flexbox options-->
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
        </div>
        <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->

    <div class="container-fluid py-5 px-4 px-md-5">
        <div class="row mb-5 justify-content-center">
            <div class="col-12 col-xl-10 py-5">
                <h1 class="h2 w500 primary-dark">Novedades</h1>
                <hr class="my-3">
            </div>
            <div class="col-12 col-xl-10">
                <div class="row row-eq-height">
                    @foreach ($news as $new)            
                        <div class="col-12 col-xl-4 mb-4">
                            <a href="/novedad/{{$new->post_id}}" class="card new-card">
                                <div class="card-body p-5">
                                    <div class="row">
                                        <div class="col-12 col-xl-8 mb-xl-4">
                                            <h1 class="h6 info text-uppercase w500">{{$new->area}}</h1>
                                        </div>
                                        <div class="col-12 col-xl-4 text-xl-right">
                                            <p class="news-date w400 black5">{{$new->date}}</p>
                                        </div>
                                        <div class="col-12">
                                            <h1 class="h5 black2 text-uppercase w500">{{$new->title}}</h1>
                                        </div>
                                        <!--p class="new-parragraph">
                                        </p-->
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@include('components.footer')
@endsection