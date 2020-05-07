@extends('admin.panel')

@section('panel-title', 'Mensajes')

@section('panel-content')
<div class="row justify-content-center">
    
    <div class="col-12 col-xl-8 mt-5">
        <a href="{{ url('admin/messages') }}" class="link"><i class="fas fa-chevron-left mr-2 primary"></i>Volver a mensajes</a>
      </div>

    <div class="col-12 col-xl-8 my-3">
        <h1 class="h6 w400">Mensaje de {{ $message->name }}</h1>
        <p class="w300 white-5 my-3">Email: {{ $message->email }}</p>
        <p class="w300 white-5 my-3">Teléfono: 
            @if($message->phone == NULL)
                {{$message->phone}}
            @else
            --
            @endif
        </p>
        <hr class="my-3 my-xl-4">
        <p class="w300 black-1 my-3">{{ $message->message }}</p>
    </div>

</div>
@endsection
