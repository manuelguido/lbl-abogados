@extends('admin.panel')

@section('panel-title', 'Áreas de trabajo')

@section('header')
    @include('components.text_editor_header')
    @include('components.text_editor_css')
@endsection

@section('panel-content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-6 mb-3">
        <div class="card">
            <div class="card-header border-none">
                Creación de áreas de trabajo
            </div>
            <div class="card-body p-4">
                <form action="{{ url('admin/create_area') }}" method="POST">
                    @csrf

                    <div class="row form-group">
                        <div class="col-12 mb-3">
                            <label>Nombre del área</label>
                            <input type="text" class="form-control" name="title" placeholder="Nombre de área" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-12 mb-3">
                            <label class="w500 black3">Descripción del área</label>
                            <textarea type="text" class="display-n" id="description" name="description"></textarea>
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
                            <button type="submit" class="btn btn-primary" onclick="getNote()">Guardar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header border-none">
                Administrar tus áreas de trabajo
            </div>
            <div class="card-body p-4">
                <h1 class="h6 mb-3">Areas</h1>
                <div class="accordion" id="tabsAccordion">
                    @foreach ($areas as $area)
                        <div class="card z-depth-0 card-bordered">
                            <div class="card-header r-link" id="tab{{$area->area_id}}" data-toggle="collapse" data-target="#tabsCollapse{{$area->area_id}}" aria-expanded="false" aria-controls="tabsCollapse{{$area->area_id}}">
                                <h5 class="h6 w300 mb-0 primary">{{$area->title}}</h5>
                            </div>
                            <div id="tabsCollapse{{$area->area_id}}" class="collapse" aria-labelledby="tab{{$area->area_id}}"
                                data-parent="#tabsAccordion">
                                <div class="card-body pb-2">
                                    <div class="row">
                                        <div class="col-12 col-lg-9">
                                            <h1 class="h5 w500 black2 my-0">Area</h1>
                                            <p class="p black3">{{$area->title}}</p>
                                            <h1 class="h5 w500 black2">Descripción</h1>
                                            <p class="p black3">{!!$area->description!!}</p>
                                        </div>
                                        <div class="col-lg-3 text-lg-right">
                                            <a href="{{ url('admin/modify_area/'.$area->area_id) }}" class="table-button" title="Modificar area"><i class="fas fa-edit black3 mr-2"></i></a>
                                            <a onclick="return confirm('¿Estas seguro de eliminar el área?')" href="{{ url('admin/delete_area/'.$area->area_id) }}" class="table-button" title="Eliminar area"><i class="fas fa-trash-alt black3"></i></a>      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
