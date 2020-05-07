@extends('layouts.app')

@include('components.nav')

@section('title', $new->title)

@section('content')

@include('components.whatsapp_icon')

    <div class="container-fluid pt-5 pb-3 mt-xl-5 my-3 mb-5">
        <div class="row px-xl-5 justify-content-xl-center">
          <div class="col-12 col-xl-8 mt-5">
            <a href="{{ url('noticias') }}" class="link"><i class="fas fa-chevron-left mr-2 primary"></i>Volver a noticias</a>
          </div>
            <div class="col-12 col-xl-8 mt-5">
                <h1 class="h3 w600 primary-dark">{{$new->title}}</h1>
                <hr>
                <h1 class="h6 info text-uppercase w500 mb-4">{{$new->area}}</h1>
                <p class="news-date w300 black5 mb-4">{{$new->date}}</p>
                <div class="new-parragraph text-center">
                    {!!$new->description!!}
                </div>
            </div>
        </div>
    </div>

@include('components.footer')
@endsection