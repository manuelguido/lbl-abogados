@extends('layouts.app')

@include('components.nav')

@section('title', 'LB&L Sobre nosotros')

@section('content')

<style type="text/css">
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
        height: 20vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 20vh;
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
    <div class="view full-page-intro" style="background-image: url('{{ asset('storage/site/'.$config->about_us_img) }}'); background-repeat: no-repeat; background-size: cover;">
        <!-- Mask & flexbox options-->
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">            
        </div>
        <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->

    <div class="container-fluid pb-5">
        <div class="row py-5 justify-content-center">
            <div class="col-12 col-xl-9 py-5">
                <h1 class="h2 w500 primary-dark">Sobre Nosotros</h1>
                <hr class="my-3">
            </div>
            <div class="col-12 col-xl-9">
                <div class="row mb-5">
                    @foreach ($people as $person)
                    <div class="col-xl-4">
                        <div class="card about-card overflow-show mb-5 shadow">
                            <div class="card-body p-0 overflow-show">
                                <div class="row p-0 m-0">
                                    <div class="col-4 col-xl-12 p-0 m-0">
                                        <!-- Card image -->
                                        <img class="card-img-top" src="{{ asset('storage/people/'.$person->img) }}">
                                    </div>
                                    <div class="col-8 col-xl-12 p-4">
                                        <!-- Title -->
                                        <h1 class="h4 primary-dark">{{$person->name}}</h1>
                                        <hr>
                                        <!-- Text -->
                                        <h2 class="h5 w500 primary text-uppercase mb-4">{{$person->title}}</h2>
                                        <p class="h6 w400 black1 mb-3">{{$person->collegue}}</p>
                                        <p class="h6 w400 black2">{{$person->admissions}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
        
                </div>
            </div>
        </div>
    </div>

@include('components.footer')
@endsection