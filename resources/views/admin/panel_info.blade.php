@extends('admin.panel')

@section('panel-title', 'Imagenes del sitio')

@section('panel-content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-8 mb-5">
        <div class="card">
            
            <div class="card-header border-none">
                Cambiar imagenes del sitio
            </div>

            <!-- Card body -->
            <div class="card-body p-4">
                <form action="{{ url('admin/info/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!--Home-->
                    <div class="row form-group mb-5">
                        <div class="col-12 col-lg-2">
                            <img width="100%" src="{{ asset ('storage/site/'.$site_config->home_img) }}">
                        </div>
                        <div class="col-12 col-lg-10">
                            <div class="row">
                                <label class="col-lg-12 col-form-label text-lg-left primary">Imagen de inicio</label>
                                <div class="col-lg-8">
                                    <input type="file" name="home" class="form-control image-upload @error('home') is-invalid @enderror">
                                    @error('home')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--News-->
                    <div class="row form-group mb-5">
                        <div class="col-12 col-lg-2">
                            <img width="100%" src="{{ asset ('storage/site/'.$site_config->news_img) }}">
                        </div>
                        <div class="col-12 col-lg-10">
                            <div class="row">
                                <label class="col-lg-12 col-form-label text-lg-left primary">Imagen de noticias</label>
                                <div class="col-lg-8">
                                    <input type="file" name="news" class="form-control image-upload @error('news') is-invalid @enderror">
                                    @error('news')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--About us-->
                    <div class="row form-group mb-5">
                        <div class="col-12 col-lg-2">
                            <img width="100%" src="{{ asset ('storage/site/'.$site_config->about_us_img) }}">
                        </div>
                        <div class="col-12 col-lg-10">
                            <div class="row">
                                <label class="col-lg-12 col-form-label text-lg-left primary">Imagen de sobre nosotros</label>
                                <div class="col-lg-8">
                                    <input type="file" name="about_us" class="form-control image-upload @error('about_us') is-invalid @enderror">
                                    @error('about_us')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Faqs-->
                    <div class="row form-group mb-5">
                        <div class="col-12 col-lg-2">
                            <img width="100%" src="{{ asset ('storage/site/'.$site_config->faqs_img) }}">
                        </div>
                        <div class="col-12 col-lg-10">
                            <div class="row">
                                <label class="col-lg-12 col-form-label text-lg-left primary">Imagen de preguntas frecuentes</label>
                                <div class="col-lg-8">
                                    <input type="file" name="faqs" class="form-control image-upload @error('faqs') is-invalid @enderror">
                                    @error('faqs')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Contact-->
                    <div class="row form-group mb-5">
                        <div class="col-12 col-lg-2">
                            <img width="100%" src="{{ asset ('storage/site/'.$site_config->contact_img) }}">
                        </div>
                        <div class="col-12 col-lg-10">
                            <div class="row">
                                <label class="col-lg-12 col-form-label text-lg-left primary">Imagen de contacto</label>
                                <div class="col-lg-8">
                                    <input type="file" name="contact" class="form-control image-upload @error('contact') is-invalid @enderror">
                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="row form-group">
                        <div class="col-12 text-right mt-2">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
