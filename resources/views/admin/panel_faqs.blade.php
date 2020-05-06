@extends('admin.panel')

@section('panel-title', 'Preguntas frecuentes')

@section('header')
    @include('components.text_editor_header')
    @include('components.text_editor_css')
@endsection

@section('panel-content')
<!-- Row -->
<div class="row justify-content-center">
    <!-- Col -->
    <div class="col-12 col-lg-6 mb-5">
        <!-- Card -->
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-none">
                Crear una pregunta frecuente
            </div>
            <!-- /.Card header -->
            <!-- Card body -->
            <div class="card-body p-4">
                <form action="{{ url('admin/create_faq') }}" method="POST">
                    @csrf
                    
                    <div class="row form-group">
                        <div class="col-12 mb-3">
                            <label class="w500 black3">Pregunta</label>
                            <input type="text" class="form-control" name="question" placeholder="Ingresa una pregunta" required>
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-12 mb-3">
                            <label class="w500 black3">Respuesta</label>
                            <textarea type="text" class="display-n" id="answer" name="answer"></textarea>
                            <div id="summernote"></div>
                            <script>
                                $(document).ready(function() {
                                    $('#summernote').summernote();
                                });
                                var html = $('#summernote').summernote('code');
                                function getNote() {
                                    var code = document.getElementsByClassName('note-editable')[0].innerHTML;
                                    //alert(code);
                                    var a = document.getElementById('answer');
                                    a.value = code;
                                }
                            </script>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-12 mb-3">
                            <!-- Default checked -->
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="in_home" id="defaultChecked" checked>
                                <label class="custom-control-label" for="defaultChecked">Mostrar en el inicio</label>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-12 mb-3">
                            <label class="w500 black3">Tema</label>
                            <select name="topic_id" class="browser-default custom-select">
                                <option value="0" selected>Seleccionar</option>
                                @foreach ($topics as $topic)
                                <option value="{{$topic->topic_id}}">{{$topic->topic_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-12 text-right mt-2">
                            <button type="submit" class="btn btn-primary" onclick="getNote()">Guardar</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.Card body -->
        </div>
        <!-- /.Card -->
    </div>
    <!-- /.Col -->
</div>
<!-- Row -->
<div class="row justify-content-center">
    <!-- Col -->
    <div class="col-12 col-lg-6 mb-5">
        <!-- Card -->
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-none">
                Administración de preguntas frecuentes
            </div>
            <!-- /.Card header -->
            <!-- Card body -->
            <div class="card-body p-4">
                @if (count($faqs) > 0)
                    <div class="accordion" id="tabsAccordion">
                        @foreach ($faqs as $faq)
                        <div class="card z-depth-0 card-bordered">
                            <div class="card-header r-link" id="tab{{$faq->faq_id}}" data-toggle="collapse" data-target="#tabsCollapse{{$faq->faq_id}}" aria-expanded="false" aria-controls="tabsCollapse{{$faq->faq_id}}">
                                <h5 class="h6 w300 mb-0 primary">{{$faq->question}}</h5>
                            </div>
                            <div id="tabsCollapse{{$faq->faq_id}}" class="collapse" aria-labelledby="tab{{$faq->faq_id}}"
                                data-parent="#tabsAccordion">
                                <div class="card-body pb-2">
                                    <div class="row">
                                        <div class="col-12 col-lg-9 mb-4 mb-lg-0">
                                            <p class="h6 black2 my-0">Pregunta</p>
                                            <p class="p black3">{{$faq->question}}</p>
                                            <p class="h6 black2">Respuesta</p>
                                            <p class="p black3">{!!$faq->answer!!}</p>
                                            <p class="black2 my-0">Se muestra en la página de inicio:
                                                @if($faq->in_home == 1)
                                                <span class="success">Si</span>
                                                @else
                                                <span class="primary">No</span>
                                                @endif
                                            </p>
                                            <p class="black2 mt-3">Tema: 
                                            @if ($faq->topic_id <> NULL)
                                                <span class="info-dark">{{$faq->topic_name}}</span>
                                            @else
                                                <span class="primary">Sin tema</span>
                                            @endif
                                            </p>
                                        </div>
                                        <div class="col-lg-3 text-lg-right">
                                            <a href="/faq/{{$faq->faq_id}}" class="opacity-1" title="Ver noticia"><i class="fas fa-eye black3 mr-2"></i></a>
                                            <a href="{{ url('admin/modify_faq/'.$faq->faq_id) }}" class="opacity-1" title="Modificar noticia"><i class="fas fa-edit black3 mr-2"></i></a>
                                            <a href="{{ url('admin/delete_faq/'.$faq->faq_id) }}" class="opacity-1" title="Eliminar noticia" onclick="return confirm('¿Estas seguro de eliminar la pregunta?')" ><i class="fas fa-trash-alt black3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                    <p class="mt-4">Aún no agregaste preguntas.</p>
                @endif
            </div>
            <!-- /.Card body -->
        </div>
        <!-- /.Card -->
    </div>
    <!-- /. Col -->
</div>
<!-- /.Row -->
@endsection
