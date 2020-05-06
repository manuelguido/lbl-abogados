@extends('layouts.app')

@section('title', 'LB&L Abogados')

@section('content')

<main class="panel">
    <!-- Row -->
    <div class="row m-0 p-0">
        <!-- Left Panel -->
        <aside id="panel-menu" class="p-0 m-0 uns">
            <div id="panel-menu-inner">
                <!--Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light justify-content-center py-0 shadow-none">
                    <h1 id="navbar-brand" class="navbar-brand">LB&L Abogados</h1>
                </nav>
                <!--/.Navbar -->
                <div class="row m-0 px-0 py-4">
                    <div class="col-md-12 px-4">
                        <h3 class="mt-4">MENSAJES</h3>
                        <a href="{{ url('admin/messages') }}" class="menuItem"><i class="fas fa-envelope mr-2"></i>Mensajes recibidos</a>
                        <!-- Noticias -->
                        <h3 class="mt-4">NOTICIAS</h3>
                        <a href="{{ url('admin/new_post') }}" class="menuItem"><i class="far fa-edit mr-2"></i>Nueva noticia</a>
                        <a href="{{ url('admin/posts') }}" class="menuItem"><i class="fas fa-sticky-note mr-2"></i>Noticias</a> 
                        <!-- Areas de trabajo -->
                        <h3 class="mt-4">ÁREAS Y PREGUNTAS</h3>
                        <a href="{{ url('admin/areas') }}" class="menuItem"><i class="fas fa-suitcase mr-2"></i>Áreas de trabajo</a>
                        <a href="{{ url('admin/faqs') }}" class="menuItem"><i class="fas fa-question-circle mr-2"></i>Preguntas frecuentes</a>
                        <a href="{{ url('admin/topics') }}" class="menuItem"><i class="fas fa-lightbulb mr-2"></i>Temas de preguntas</a>
                        <!-- Areas de trabajo -->
                        <h3 class="mt-4">INFORMACIÓN</h3>
                        <a href="{{ url('admin/info') }}" class="menuItem"><i class="fas fa-file-signature mr-2"></i>Fotos del sitio</a>
                        <a href="{{ url('admin/people') }}" class="menuItem"><i class="fas fa-user-friends mr-2"></i>Personas</a>
                        <hr class="bg-white5">
                        <!-- /.Noticias -->
                        <!-- Mi Cuenta -->
                        <h3 class="mt-4">CONFIGURACIÓN</h3> 
                        <a href="{{ url('admin/profile') }}" class="menuItem"><i class="fas fa-user mr-2"></i>Mi cuenta</a>
                        <a href="{{ url('admin/users') }}" class="menuItem"><i class="fas fa-users mr-2"></i>Usuarios</a>
                        <a href="{{ url('/') }}" target="_blank" class="menuItem"><i class="fas fa-globe-americas mr-2"></i>Ir al sitio</a>
                        <!-- /.Mi Cuenta -->
                        <!-- Logout -->
                        <a class="menuItem" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i>Salir
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <!-- /.Logout -->
                    </div>
                </div>
            </div>
        </aside>
        <!-- /.Left Panel -->

        <!-- Panel Content -->
        <div id="panel-content" class="panel-content col p-0">
            <!--Navbar -->
            <nav class="panel-navbar navbar navbar-expand-lg navbar-light shadow-sm">
                <button class="navbar-toggler ml-auto card panel-toggle-button" type="button" data-toggle="collapse" data-target="#panel-menu2" aria-controls="panel-menu2" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse panel" id="panel-menu2">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto pl-3">
                        <li class="nav-item my-1"><a href="{{ url('admin/messages') }}" class="white1 nav-link w500"><i class="white1 far fa-edit mr-2"></i>Mensajes recibidos</a></li>
                        <li class="nav-item my-1"><a href="{{ url('admin/new_post') }}" class="white1 nav-link w500"><i class="white1 far fa-edit mr-2"></i>Nueva nota</a></li>
                        <li class="nav-item my-1"><a href="{{ url('admin/posts') }}" class="white1 nav-link w500"><i class="white1 fas fa-sticky-note mr-2"></i>Notas</a></li>
                        <li class="nav-item my-1"><a href="{{ url('admin/areas') }}" class="white1 nav-link w500"><i class="white1 fas fa-suitcase mr-2"></i>Areas de trabajo</a></li>                       
                        <li class="nav-item my-1"><a href="{{ url('admin/info') }}" class="white1 nav-link w500"><i class="white1 fas fa-file-signature mr-2"></i>Fotos del sitio</a></li>
                        <li class="nav-item my-1"><a href="{{ url('/admin/people') }}" class="white1 nav-link w500"><i class="white1 fas fa-user-friends mr-2"></i>Personas</a></li>        
                        <li class="nav-item my-1"><a href="{{ url('admin/profile') }}" class="white1 nav-link w500"><i class="white1 fas fa-user mr-2"></i>Mi cuenta</a></li>
                        <li class="nav-item my-1"><a href="{{ url('admin/users') }}" class="white1 nav-link w500"><i class="white1 fas fa-users mr-2"></i>Usuarios</a></li>
                        <li class="nav-item my-1"><a href="{{ url('/') }}" class="white1 nav-link w500"><i class="white1 fas fa-globe-americas mr-2"></i>Ir al sitio</a></li>

                        <!-- /.Mi Cuenta -->
                        <!-- Logout -->
                        <li class="nav-item"><a class="white1 nav-link w500" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="white1 fas fa-sign-out-alt mr-2"></i>Salir
                        </a></li>

                    </ul>
                </div>
            </nav>
            <!--/.Navbar -->
            <header class="panel-header">
                <div class="card-body p-4">
                    <h1 id="panel-title" class="my-0">@yield('panel-title')</h1>
                </div>
            </header>
            @include('components.messages')
            <!-- Panel workplace -->
            <div class="container-fluid w-100 p-3">
                @yield('panel-content')
            </div>
            <!-- /.Panel workplace -->
        </div>
        <!-- /.Panel Content -->
    </div>
    <!-- /.Row -->
</main>

@endsection