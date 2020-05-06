@extends('admin.panel')

@section('panel-title', 'Mensajes')

@section('panel-content')
<div class="row justify-content-center">
    
    @if (count($unread_messages) == 0 and count($messages) == 0)
    <div class="col-12 col-lg-8 mb-2">
        <h1 class="h5 w400">No hay mensajes</h1>
    </div>
    @endif
    
    @php $mt = ''; @endphp
    @if (count($unread_messages) > 0)
    @php $mt = 'mt-5'; @endphp
    <div class="col-12 col-lg-8 mb-2">
        <h1 class="h5 w400">No Leídos</h1>
    </div>
    @endif
    
    @foreach ($unread_messages as $message)
        <div class="col-12 col-lg-8 mb-2">
            <div class="card">
                <div class="card-body py-md-2 px-5">
                    <div class="row">
                        <div class="col-9 py-md-0">
                            <div class="row">
                                <div class="col-12 py-0">
                                    <p class="black3 w300 p my-1">De: {{$message->name}}, {{$message->email}}</p>
                                    <p class="black3 w400 p my-1"></p>
                                    <p class="black3 w400 p my-1">Fecha: {{$message->date}}</p>
                                    <p class="black3 w400 p my-1">Teléfono: @if($message->phone == NULL) {{$message->phone}}@else--@endif</p>
                                    <hr class="my-2 hr-white3">
                                </div>  
                                <div class="col-12 py-0 mt-1">
                                    <label class="black4 w500">Mensaje</label>
                                    <p class="mb-0 w400 black2">{{$message->message}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 pt-3 text-right">
                            <a href="{{ url('admin/read_message/'.$message->id) }}" class="opacity-1" title="Marcar como leído"><i class="fas fa-envelope black3 mr-2"></i></a>
                            <a onclick="return confirm('¿Estas seguro de eliminar el mensaje?')" href="{{ url('admin/delete_message/'.$message->id) }}" class="opacity-1" title="Eliminar mensaje"><i class="fas fa-trash-alt black3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if (count($messages) > 0)
    <div class="col-12 col-lg-8 {{$mt}} mb-2">
        <h1 class="h5 w400">Leídos</h1>
        </div>
    @endif
    @foreach ($messages as $message)
        <div class="col-12 col-lg-8 mb-2">
            <div class="card">
                <div class="card-body py-md-2 px-5">
                    <div class="row">
                        <div class="col-9 py-0">
                        <div class="row">
                            <div class="col-12 py-0">
                                <p class="black3 w300 p my-1">De: {{$message->name}}, {{$message->email}}</p>
                                <p class="black3 w400 p my-1"></p>
                                <p class="black3 w400 p my-1">Fecha: {{$message->date}}</p>
                                <p class="black3 w400 p my-1">Teléfono: @if($message->phone == NULL) {{$message->phone}}@else--@endif</p>
                                <hr class="my-2 hr-white3">
                            </div>  
                            <div class="col-12 py-0 mt-1">
                                <label class="black4 w500">Mensaje</label>
                                <p class="mb-0 w400 black2">{{$message->message}}</p>
                            </div>
                        </div>
                        </div>
                        <div class="col-3 pt-3 text-right">
                            <a title="Mensaje leído"><i class="fas fa-envelope-open black3 mr-2"></i></a>
                            <a onclick="return confirm('¿Estas seguro de eliminar el mensaje?')" href="{{ url('admin/delete_message/'.$message->id) }}" class="opacity-1" title="Eliminar mensaje"><i class="fas fa-trash-alt black3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
