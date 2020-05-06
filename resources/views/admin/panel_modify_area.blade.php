@extends('admin.panel')

@section('panel-title', 'Actualizar área')

@section('header')
    @include('components.text_editor_header')
    @include('components.text_editor_css')
@endsection

@section('panel-content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-6 text-left mb-3">
        <a href="/admin/areas" class="primary"><i class="fas fa-arrow-left fa-xs mr-2 primary"></i>Volver a areas de trabajo</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-12 col-lg-6 mb-5">
        <div class="card">
            <div class="card-header border-none">
                Modificar area de trabajo
            </div>
            <div class="card-body p-4">
                <form action="{{ url('admin/update_area/'.$area->area_id) }}" method="POST">
                    @csrf

                    <div class="row form-group">
                        <div class="col-12">
                            <label>Nombre del área</label>
                            <input type="text" class="form-control" name="title" placeholder="Nuevo nombre área" value="{{$area->title}}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-12">
                            <label>Descripción del área</label>
                            <textarea type="text" class="display-n" id="description" name="description"></textarea>
                            <div id="summernote">{!!$area->description!!}</div>
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
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary" onclick="getNote()">Actualizar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
