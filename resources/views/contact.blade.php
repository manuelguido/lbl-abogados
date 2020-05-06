@extends('layouts.app')

@include('components.nav')

@section('title', 'LB&L Contacto')

@section('content')
<style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
              .navbar:not(.top-nav-collapse) {
                  background: #1C2331!important;
              }
          }
  </style>

<script>
    window.onload = load;
    function load() {
        var seconds = document.getElementById("time").textContent;
        var countdown = setInterval(function() {
            seconds++;
            document.getElementById("time").value = seconds;
            if (seconds <= 0) clearInterval(countdown);
        }, 1000);
    }
</script>


@include('components.whatsapp_icon')

        <div class="contact-container" style="background-image: url('{{ asset('storage/site/'.$config->contact_img) }}')">
            <div class="container">
                <!--Grid row-->
                <div class="row wow fadeIn">
                    <div class="col-12">
                        <div class="card contact-card">
                            <div class="card-body p-5">
                                <div class="row">
                                    @if(Session::has('success'))
                                        <div class="col-12 mb-3">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong><i class="fas fa-check-circle mr-2"></i>{{ Session::get('success') }}</strong>
                                                <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-12 col-xl-6">
                                        <h1 class="h4 w500 black1 mt-2 mb-xl-5 mb-4">Contactanos<i class="fas fa-info-circle primary-dark ml-2 info-icon"><span class="info-icon-text">Formulario de contacto extendido</span></i></h1>
                                        <form action="{{ url('/new_message') }}" method="POST">
                                            @csrf
                                            <input type="number" id="time" name="time" class="display-none" value="0" min="0">
                                            <div class="form-row">  
                                                <div class="col-12 mb-3">
                                                    <label>Nombre (*)</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Ingresa tu nombre" required>
                                                </div>
                                            </div>
                                            <div class="form-row mb-3">
                                                <div class="col-12">
                                                    <label>Email (*)</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Ingresa tu email" required>
                                                </div>
                                            </div>
                                            <div class="form-row mb-3">
                                                <div class="col-12">
                                                    <label>Teléfono</label>
                                                    <input type="tel" name="phone" class="form-control" placeholder="Ingresa tu teléfono">
                                                </div>
                                            </div>
                                            <div class="form-row mb-3">
                                                <div class="col-12">
                                                    <label>Mensaje</label>
                                                    <textarea class="form-control rounded-0" name="message" id="message" rows="4" placeholder="Escribe tu mensaje" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mt-4">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary btn-block m-0">Enviar</button>
                                                </div>                                                
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-12 col-md-6 text-center">
                                        <div class="whatsapp-box">
                                            <h1 class="h4 mt-auto mb-3 align-middle">O chatea con nosotros!</h1>
                                            <a target="_blank" href="https://api.whatsapp.com/send?phone=+5491125034400&text=Hola, quisiera consultar sobre" class="btn btn-success m-0 py-3"><i class="fab fa-whatsapp white1 icon-md mr-2"></i><span class="w700 white1 p">Whatsapp</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Grid row-->
            </div>
            <!-- Content -->
        </div>

@include('components.footer')
@endsection