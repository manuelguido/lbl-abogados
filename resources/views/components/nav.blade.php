<!-- Navbar -->
<nav class="main-navbar navbar navbar-expand-xl navbar-dark shadow-none fixed-top">
    <div class="container">
        <a class="navbar-brand uns" href="{{ url('/') }}">
            LB&L Abogados
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent    " aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/novedades') }}">Novedades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/sobre_nosotros') }}">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/faqs') }}">Preguntas frecuentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contacto') }}">Contacto</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link my-1" href="{{ url('/admin') }}"><i class="fas fa-user-shield fa-lg primary"></i></a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- /.Navbar -->

<script>
	// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
	window.onscroll = function() {scrollHeader()};

	function scrollHeader() {
		if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
			document.getElementsByClassName("main-navbar")[0].classList.add("main-navbar-s");
		} else {
			document.getElementsByClassName("main-navbar")[0].classList.remove("main-navbar-s");
		}
	}
</script>
