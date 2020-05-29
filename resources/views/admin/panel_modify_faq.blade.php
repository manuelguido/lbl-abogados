@extends('admin.panel')

@section('panel-title', 'Actualizar pregunta')

@section('header')
    @include('components.text_editor_header')
    @include('components.text_editor_css')
@endsection

@section('panel-content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-6 mb-3">
        <a href="/admin/faqs" class="primary"><i class="fas fa-arrow-left fa-xs mr-2 primary"></i>Volver a preguntas frecuentes</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-12 col-lg-6 mb-5">
        <div class="card">
            <div class="card-header border-none">
                Modificar pregunta
            </div>
            <div class="card-body p-4">
                <form action="{{ url('admin/update_faq/'.$faq->faq_id) }}" method="POST">
                    @csrf

                    <div class="row form-group">
                        <div class="col-12 mb-4">
                            <label>Pregunta</label>
                            <div>
                                <input type="text" class="form-control" name="question" placeholder="Ingresa una pregunta" value="{{$faq->question}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-12 mb-3">
                            <label>Respuesta</label>
                            <textarea type="text" class="display-n" id="answer" name="answer"></textarea>
                            <div id="summernote">{!!$faq->answer!!}</div>
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
                            @if($faq->in_home == 1)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="in_home" id="defaultChecked{{$faq->faq_id}}" checked>
                                <label class="custom-control-label" for="defaultChecked{{$faq->faq_id}}">Mostrar en inicio</label>
                            </div>
                            @else
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="in_home" id="defaultChecked{{$faq->faq_id}}">
                                <label class="custom-control-label" for="defaultChecked{{$faq->faq_id}}">Mostrar en inicio</label>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-12 mb-3">
                            <label>Tema</label>
                            <select name="topic_id" class="browser-default custom-select" required>
                                <option value="0">Todas</option>
                                @foreach ($topics as $topic)
                                @if ($topic->topic_id == $faq->topic_id)
                                <option value="{{$topic->topic_id}}" selected>{{$topic->topic_name}}</option>
                                @else
                                <option value="{{$topic->topic_id}}">{{$topic->topic_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-6 pt-4">
                            <a onclick="return confirm('¿Estas seguro de eliminar {{$faq->question}}?')" href="{{ url('admin/delete_faq/'.$faq->faq_id) }}" ><i class="primary fas fa-trash-alt mr-2"></i>Eliminar pregunta</a>
                        </div>
                        <div class="col-6 text-right">
                            <button type="submit" class="btn btn-primary" onclick="getNote()">Actualizar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
