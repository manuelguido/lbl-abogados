@extends('admin.panel')

@section('panel-title', 'Modificar abogado')

@section('panel-content')
<div class="row">
    <!-- Col -->
    <div class="col-12 col-lg-7 mb-3">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <form action="{{ url('admin/person/update/'.$person->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div class="row form-group">
                        <div class="col-12 mb-4">
                            <label class="w500 black3">Nombre</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$person->name}}" placeholder="Ingrese el nombre" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="row form-group">
                        <div class="col-12 mb-4">
                            <label class="w500 black3">Admisiones</label>
                            <textarea name="title" class="form-control @error('title') is-invalid @enderror" rows="2" required>{{$person->title}}</textarea>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Collegue -->
                    <div class="row form-group">
                        <div class="col-12 mb-4">
                            <label class="w500 black3">Colegio</label>
                            <textarea name="collegue" class="form-control @error('collegue') is-invalid @enderror" rows="2" required>{{$person->collegue}}</textarea>
                            @error('collegue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Admissions -->
                    <div class="row form-group">
                        <div class="col-12 mb-4">
                            <label class="w500 black3">Admisiones</label>
                            <textarea name="admissions" class="form-control @error('admissions') is-invalid @enderror" rows="2" required>{{$person->admissions}}</textarea>
                            @error('admissions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!--Image-->
                    <div class="row form-group mb-5">
                        <div class="col-12 col-lg-2">
                            <img width="100%" src="{{ asset ('storage/people/'.$person->img) }}">
                        </div>
                        <div class="col-12 col-lg-10">
                            <div class="row">
                                <label class="col-lg-12 w500 black3">Imagen de abogado</label>
                                <div class="col-lg-12">
                                    <input type="file" name="image" class="form-control image-upload @error('image') is-invalid @enderror">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="row form-group">
                        <div class="col-12 mb-2 text-lg-right">
                            <button type="submit" class="btn btn-primary py-3 px-5">Guardar</button>
                        </div>
                    </div>

                </form>

            </div>
            <!-- /.Card Body-->
        </div>
        <!-- /.Card -->
    </div>
    <!-- /.Col -->
</div>
@endsection
