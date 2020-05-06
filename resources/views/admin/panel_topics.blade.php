@extends('admin.panel')

@section('panel-title', 'Temas de preguntas')

@section('panel-content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-6 mb-5">
        <div class="card">
            <div class="card-header border-none">
                Crear un tema de preguntas
            </div>
            <div class="card-body p-4">
                <form action="{{ url('admin/create_topic') }}" method="POST">
                    @csrf

                    <div class="row form-group">
                        <div class="col-12 mb-3">
                            <label>Nombre del tema</label>
                            <input type="text" class="form-control" name="topic_name" placeholder="Ingresá el nombre del tema" required>
                        </div>
                    </div>

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
<div class="row justify-content-center">
    <div class="col-12 col-lg-6 mb-5">
        <div class="card">
            <div class="card-header border-none">
                Tus temas de preguntas
            </div>
            <div class="card-body p-4">
                @if (count($topics) > 0)
                <div class="accordion" id="tabsAccordion">
                    @foreach ($topics as $topic)
                        <div class="card z-depth-0 card-bordered">
                            <div class="card-header r-link" id="tab{{$topic->topic_id}}" data-toggle="collapse" data-target="#tabsCollapse{{$topic->topic_id}}" aria-expanded="false" aria-controls="tabsCollapse{{$topic->topic_id}}">
                                <h5 class="h6 w300 mb-0 primary">{{$topic->topic_name}}</h5>
                            </div>
                            <div id="tabsCollapse{{$topic->topic_id}}" class="collapse" aria-labelledby="tab{{$topic->topic_id}}"
                                data-parent="#tabsAccordion">
                                <div class="card-body pb-2">
                                    <form action="{{ url('admin/update_topic/'.$topic->topic_id) }}" method="POST">
                                        @csrf

                                        <div class="row form-group mb-3">
                                            <div class="col-12">
                                                <label>Nombre del tema</label>
                                                <input type="text" class="form-control" name="topic_name" placeholder="Nuevo nombre de tema" value="{{$topic->topic_name}}" required>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-6 text-left pt-4">
                                                <a onclick="return confirm('¿Estas seguro de eliminar {{$topic->topic_name}}?')" href="{{ url('admin/delete_topic/'.$topic->topic_id) }}"><i class="primary fas fa-trash-alt mr-2"></i>Eliminar tema</a>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                    <p class="mt-4">Aún no agregaste temas.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
