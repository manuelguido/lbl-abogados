@extends('layouts.app')

@include('components.nav')

@section('title', 'LB&L Preguntas frequentes')

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

@include('components.whatsapp_icon')

    <!-- Full Page Intro -->
    <div class="view full-page-intro" style="background-image: url('{{ asset('storage/site/'.$config->faqs_img) }}'); background-repeat: no-repeat; background-size: cover;">
        <!-- Mask & flexbox options-->
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
        </div>
        <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->

    <div class="container-fluid py-5 px-4 px-md-5">
        <div class="row justify-content-center px-lg-5 mb-4">
            <div class="col-12 col-lg-10">
                <h1 class="h2 w500 primary-dark">Preguntas frecuentes</h1>
                <hr>
            </div>
        </div>
        <div class="row justify-content-center px-lg-5 mb-5">
            <div class="col-12 col-lg-2 mb-4">
                <div class="list-group" id="myTab" role="tablist">
                    <button type="button" class="list-group-item list-group-item-action faq-menu-item" onclick="faqsSwitch(0)">Todas</button>
                    @php $i=0; @endphp
                    @foreach($topics as $topic)
                    @if (count($faqs->where('topic_name', $topic->topic_name)) > 0)
                    @php $i++; @endphp
                    <button type="button" class="list-group-item list-group-item-action faq-menu-item" onclick="faqsSwitch({{$i}})">{{$topic->topic_name}}</button>
                    @endif
                    @endforeach
                  </div>
            </div>
            <div class="col-12 col-lg-8">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a id="faq-title" class="nav-link active cursor-d">Todas</a>
                    </li>
                </ul>
                  <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row mt-4 faq-list display-none">
                                @foreach ($faqs as $faq)
                                <div class="col-12 col-lg-10 mb-4">
                                    <h2 class="h6">
                                    <span class="h6 w500 primary-dark mb-0 text-uppercase pt-0">{{$faq->question}}</span><br class="mb-3">
                                    <span class="p black1 mb-5">{!!$faq->answer!!}</span>
                                    </h2>
                                </div>
                                @endforeach
                            </div>
                            @foreach($topics as $topic)
                            @if (count($faqs->where('topic_name', $topic->topic_name)) > 0)
                            <div class="row mt-4 faq-list display-none">
                                @foreach ($faqs->where('topic_name', $topic->topic_name) as $faq)
                                <div class="col-12 col-lg-10 mb-4">
                                    <h2 class="h6">
                                    <span class="h6 w500 primary-dark mb-0 text-uppercase pt-0">{{$faq->question}}</span><br class="mb-3">
                                    <span class="p black1 mb-5">{!!$faq->answer!!}</span>
                                    </h2>
                                </div>
                                @endforeach
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
                  </div>
            </div>
        </div>
    </div>


@include('components.footer')
@endsection