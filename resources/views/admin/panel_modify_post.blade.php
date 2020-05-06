@extends('admin.panel')

@section('panel-title', 'Actualizar noticia')

@section('header')
    @include('components.text_editor_header')
    @include('components.text_editor_css')
@endsection

@section('panel-content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-9 mb-5">
        <div class="card" style="">
            <div class="card-header border-none">
                Noticia
            </div>
            <div class="card-body">
                <form action="{{ url('admin/update_post/'.$post->post_id) }}" method="POST">
                    @csrf
                    
                    <div class="row form-group mb-4">
                        <div class="col-12 col-lg-8">
                            <label>Área</label>
                            <input type="text" class="form-control" name="area" value="{{$post->area}}" placeholder="ej: penal, derecho laboral..." required>
                        </div>
                    </div>

                    <div class="row form-group mb-4">
                        <div class="col-12 col-lg-8">
                            <label>Título de nota</label>
                            <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Ingresá un titulo" required>
                        </div>
                    </div>

                    <div class="row form-group mb-4">
                        <div class="col-12">
                            <label>Nota</label>
                            <textarea type="text" class="display-n" id="description" name="description"></textarea>
                            <div id="summernote">{!!$post->description!!}</div>
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
                            <button type="submit" class="btn btn-primary" onclick="getNote()">Actualizar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
