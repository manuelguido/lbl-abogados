@extends('admin.panel')

@section('panel-title', 'Nueva noticia')

@section('header')
    @include('components.text_editor_header')
@endsection

@section('panel-content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-10 mb-5">
        <div class="card" style="overflow:visible !important;">
            <div class="card-header border-none">
                Publicar una nueva noticia
            </div>
            <div class="card-body p-4" style="overflow:visible !important;">
                <form action="{{ url('admin/create_post') }}" method="POST">
                    @csrf

                    <div class="row form-group mb-4">
                        <div class="col-12 col-xl-8">
                            <label>Área</label>
                            <input type="text" class="form-control" name="area" placeholder="ej: penal, derecho laboral..." required>
                        </div>
                    </div>

                    <div class="row form-group mb-4">
                        <div class="col-12 col-xl-8">
                            <label>Título</label>
                            <input type="text" class="form-control" name="title" placeholder="Ingresá un titulo" required>
                        </div>
                    </div>

                    <div class="row form-group mb-4">
                        <div class="col-12 col-lg-4">
                            <label>Fecha:</label>
                            <input type="date" class="form-control" name="date" placeholder="Ingresá un titulo" required>
                        </div>
                    </div>

                    <div class="row form-group mb-4">
                        <div class="col-12">
                            <label>Nota</label>
                            <textarea type="text" class="display-n" id="description" name="description" required></textarea>
                            <div id="summernote"></div>
                            <script>
                                $(document).ready(function() {
                                    $('#summernote').summernote();
                                });
                                var html = $('#summernote').summernote('code');
                                function getNote() {
                                    var code = document.getElementsByClassName('note-editable')[0].innerHTML;
                                    //alert(code);
                                    var a = document.getElementById('description');
                                    a.value = code;
                                }
                            </script>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-12 text-right mt-2">
                            <button type="submit" class="btn btn-primary" onclick="getNote()">Publicar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
