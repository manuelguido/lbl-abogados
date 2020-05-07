@extends('admin.panel')

@section('panel-title', 'Mensajes')

@section('panel-content')
<div class="row justify-content-center">
    
    <div class="col-12 my-3">
        <h1 class="h6 w400">Mensajes recibidos</h1>
    </div>

    <div class="col-12">
        <div class="table-responsive-sm text-nowrap shadow">
            <table id="dtBasicExample" class="table table-bordered" cellspacing="0" width="100%">
                <thead class="bg-white2">
                    <tr>
                        <th class="th-lg">Fecha</th>
                        <th class="th-lg">Nombre</th>
                        <th class="th-lg">Email</th>
                        <th class="th-lg">Mensaje</th>
                        <th class="th-lg">Acciones</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($messages as $message)
                    <!-- Message row -->
                    <tr class="{{$message->tableClassColor()}}">
                        <td class="pl-3">
                            {{date('d/m/Y', strtotime($message->created_at))}},
                            {{date('h:i a', strtotime($message->created_at))}}
                        </td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td class="text-center">
                            @if(strlen($message->message) > 0)
                                <a href="{{ url('admin/message/'.$message->id) }}" class="btn btn-primary btn-sm btn-rounded">
                                    Ver mensaje
                                </a>
                            @else
                                (No escribió)
                            @endif
                        </td>
                        {{-- <td>{{ $message->time() }}</td> --}}
                        <td class="text-center">
                                <form style="display: inline-block;" action="{{ url('admin/read_message/'.$message->id) }}" method="POST">
                                    @csrf
                                    @if($message->is_read == 1)
                                    <button type="submit" class="bg-none b-0" title="Marcar como no leído">
                                        <i class="fas fa-envelope-open black-c"></i>
                                    </button>
                                    @else
                                    <button type="submit" class="bg-none b-0" title="Marcar como leído">
                                        <i class="fas fa-envelope black2"></i>
                                    </button>
                                    @endif
                                </form>
                            <form style="display: inline-block;" action="{{ url('admin/delete_message/'.$message->id) }}" method="POST" onsubmit="return confirm('¿Estas seguro de eliminar el mensaje?')">
                                @method('DELETE')
                                @csrf
                                <button href="{{ url('admin/message/destroy/'.$message->id) }}" class="bg-none b-0" title="Eliminar mensaje">
                                    <i class="fas fa-trash black2 ml-2"></i></a>
                                </button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
