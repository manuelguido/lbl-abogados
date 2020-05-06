@extends('admin.panel')

@section('panel-title', 'Administración de Personas')

@section('panel-content')
<div class="row justify-content-center">
    @foreach($people as $person)
    <!-- Col -->
    <div class="col-12 col-lg-9 mb-3">
        <!-- Card -->
        <div class="card">
            <div class="card-header border-none row">
                <div class="col-6 primary w500">
                    {{$person->name}}
                </div>
                <div class="col-6 text-right">
                    <a class="opacity-1" href="/admin/person/edit/{{$person->id}}"><i class="far fa-edit black4 mr-2"></i></a>
                    <a class="opacity-1" onclick="return confirm('¿Estas seguro de eliminarlo?')" href="/admin/person/delete/{{$person->id}}"><i class="far fa-trash-alt black4"></i></a>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12 col-lg-2 text-center mb-4 mb-lg-0">
                        <img width="75%" src="{{ asset('storage/people/'.$person->img) }}">
                    </div>
                    <div class="col-12 col-lg-8">
                        <p class="p black3">{{$person->title}}</p>
                        <p class="p black4">{{$person->collegue}}</p>
                        <p class="p black4">{{$person->admissions}}</p>
                    </div>
                    <div class="col-12 col-lg-2 text-lg-right">
                    </div>
                </div>
            </div>
            <!-- /.Card Body-->
        </div>
        <!-- /.Card -->
    </div>
    <!-- /.Col -->
    @endforeach
</div>
@endsection