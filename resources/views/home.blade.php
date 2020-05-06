@extends('layouts.app')

@section('title', 'LB&L Abogados')

@include('components.nav')

@section('content')

@include('components.whatsapp_icon')

    <style type="text/css">
        html, body, header, .view {
            height: 80%;
        }
        .banner-logo {
            width: 13vw;
            margin: 0 auto;
        }
        @media (max-width: 740px) {
            html, body, header, .view {
                height: 75vh;
            }
            .banner-logo {
                width: 60vw;
            }
        }
        @media (min-width: 800px) and (max-width: 850px) {
            html, body, header, .view {
                height: 70vh;
            }
            .banner-logo {
                width: 40vw;
            }
        }
  </style>

<script>
    window.onload = function() {
        faqsSwitch(0);
    }
    //Switch de panel
    function faqsSwitch(n) {
        var menuItems = document.getElementsByClassName('faq-menu-item');
        var subItems = document.getElementsByClassName('faq-list');
        var title = document.getElementById('faq-title');
        
        for(var i = 0; i < subItems.length; i++) {
            subItems[i].classList.add("display-none");
            menuItems[i].classList.remove("active");
        }
        menuItems[n].classList.add("active");
        subItems[n].classList.remove("display-none");
        title.innerHTML = menuItems[n].innerHTML;
    }
</script>

    <!-- Full Page Intro -->
    <div class="view full-page-intro" style="background-image: url('{{ asset ('storage/site/'.$config->home_img) }}'); background-repeat: no-repeat; background-size: cover;">
        <!-- Mask & flexbox options-->
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="container-fluid w-100 px-0">
                <!--Grid row-->
                <div class="row justify-content-center">
                    <div class="col-12 text-center mt-5">
                        <img class="banner-logo" src="{{ asset ('img/artwork/logo-white.png') }}">
                    </div>
                    <div class="col-12 col-lg-4 text-center pt-5">
                        <div class="card p-0" style="background: rgba(255,255,255,0.75);">
                            <div class="card-body p-4">
                                <h1 class="h3 w600 primary-dark my-1">
                                    URGENCIAS LAS 24HS
                                </h1>
                            </div>
                        </div>
                    </div>
                    <!--div class="col-12 text-center mt-4">
                        <a href="/contacto" class="btn btn-indigo btn">Escribinos
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Content -->
        </div>
        <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->

    <!-- Container -->
    <div class="container-fluid w-100 py-5 px-2 px-lg-5 my-2 my-lg-4">
        <!-- Grid row -->
        <div class="row row-eq-height">
            <!-- Noticias -->
            <div class="col-12 col-lg-3 mb-5 mb-lg-0">
                <!-- Card -->
                <div class="card card-bordered" style="min-height: 800px;">
                    <div class="card-header bg-none border-none">
                        <h1 class="h4 color5 w500">Noticias</h1>
                        <hr>
                    </div>
                    <!-- Card body -->
                    <div class="card-body border-none py-0 px-4">
                        <div class="row justify-content-center">
                            @foreach ($news as $new)
                                <div class="col-12 mb-3">
                                    <a href="/noticia/{{$new->post_id}}" class="card news-card">
                                        <div class="card-body">
                                            <h3 class="p2 info text-uppercase w500 mb-3">{{$new->area}}</h3>
                                            <h1 class="h6 w600 black2 text-uppercase mt-0 mb-2">{{$new->title}}</h1>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.Card body -->
                </div>
                <!-- /.Card -->
            </div>
            <!-- Parte  B -->
            <div class="col-12 col-lg-9">
                <div class="row row-eq-height">                    
                    <!-- Temas -->
                    <div class="col-12 col-lg-8">
                        <!-- Links -->
                        <h5 class="black2 text-uppercase w600">Nuestras áreas de trabajo</h5>
                        <hr>
                        <div class="accordion home-accordion" id="tabsAccordion">
                            @foreach ($areas as $area)
                                <div class="card z-depth-0 card-bordered mt-2">
                                    <div class="card-header cursor-p bg-white1" id="tab"{{$area->area_id}}" data-toggle="collapse" data-target="#tabsCollapse{{$area->area_id}}" aria-expanded="false" aria-controls="tabsCollapse{{$area->area_id}}">
                                        <div class="row">
                                            <div class="col-10">
                                                <h5 class="h6 w400 mb-0 primary-dark">{{$area->title}}</h5>
                                            </div>
                                            <div class="col-2 text-right">
                                                <i class="ml-auto fas icon-md primary fa-angle-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tabsCollapse{{$area->area_id}}" class="collapse" aria-labelledby="tab{{$area->area_id}}"
                                        data-parent="#tabsAccordion">
                                        <div class="card-body px-4 px-lg-5">
                                            {!!$area->description!!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Buttons -->
                    <div class="col-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 text-center mt-5">
                                <a href="/sobre_nosotros" class="home-card card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <i class="fas fa-users white1 fa-5x"></i>
                                            </div>
                                            <div class="col-8">
                                                <h1 class="white1 h4 mt-4">¿Quiénes somos?</h1>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 text-center mt-5">
                                <a href="/contacto" class="home-card card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <i class="fas fa-comments white1 fa-5x"></i>
                                            </div>
                                            <div class="col-8">
                                                <h1 class="white1 h4 mt-4">Habla con nosotros</h1>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-eq-height mt-5">
                    <!-- FAQS -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h4 primary-dark w500 my-0">Preguntas frequentes</h1>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-center mb-5">
                            <div class="col-12 col-lg-3 mb-4">
                                <div class="list-group" id="myTab" role="tablist">
                                    @php $i=0; @endphp
                                    @foreach($topics as $topic)
                                    @if (count($faqs->where('topic_name', $topic->topic_name)) > 0)
                                    <button type="button" class="list-group-item list-group-item-action faq-menu-item" onclick="faqsSwitch({{$i}})">{{$topic->topic_name}}</button>
                                    @php $i++; @endphp
                                    @endif
                                    @endforeach
                                </div>
                                <div class="w-100 text-right pt-3">
                                    <a href="/faqs" class="primary">Ir a preguntas frecuentes</a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-9">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a id="faq-title" class="nav-link active cursor-d">Todas</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-4 px-lg-0" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        @foreach($topics as $topic)
                                        @if (count($faqs->where('topic_name', $topic->topic_name)) > 0)
                                        <div class="row mt-4 faq-list display-none">
                                            @foreach ($faqs->where('topic_name', $topic->topic_name) as $faq)
                                            <div class="col-12 col-lg-10 mb-4">
                                                <h2 class="h7">
                                                <span class="h6 w500 primary-dark mb-0 text-uppercase pt-0">{{$faq->question}}</span><br class="mb-3">
                                                <span class="p black1 mb-5">{!!$faq->answer!!}</span>
                                                </h2>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('components.footer')
@endsection