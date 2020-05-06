@extends('admin.panel')

@section('panel-title', 'Usuarios')

@section('panel-content')
<div class="row justify-content-center">
    <!-- Col -->
    <div class="col-12 col-lg-6 mb-3">
        <!-- Card -->
        <div class="card">
            <div class="card-header border-none">
                Crear nuevo usuario
            </div>
            <!-- Card Body -->
            <div class="card-body p-4">
                <form action="{{ url('/admin/createUser') }}" method="POST">
                    @csrf

                    <!-- Nombre -->
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="pl-3">Nombre</label>
                            <input type="text" name="name" class="form-control form-rounded" placeholder="Ingresá un nombre" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="w500 black3 pl-3">Email</label>
                            <input type="email" name="email" class="form-control form-rounded" placeholder="Ingresá un email" required>
                        </div>
                    </div>

                    <!-- Contraseña -->
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="w500 black3 pl-3">Contraseña</label>
                            <input type="password" name="password" class="form-control form-rounded" placeholder="Ingresá la nueva contraseña" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Repetir contraseña -->
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="w500 black3 pl-3">Repetir contraseña</label>
                            <input type="password" name="password_repeat" class="form-control form-rounded" placeholder="Repetí la nueva contraseña" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-12 text-lg-right">
                            <button type="submit" class="btn btn-primary btn-rounded">Crear <i class="fas fa-user-plus"></i></button>
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
<div class="row justify-content-center">
    <!-- Col -->
    <div class="col-12 col-lg-6 mb-3">
        <!-- Card -->
        <div class="card h-100">
            <div class="card-header border-none">
                Listado de Usuarios
            </div>
            <!-- Card Body -->
            <div class="card-body p-4">
                <ul class="list-group">
                    @foreach ($users as $user)
                        @if($user->email <> 'admin@gmail.com')
                        <li class="list-group-item border-none">
                            <div class="row">
                                <div class="col-5">
                                    {{ $user->name }}
                                </div>
                                <div class="col-6">
                                    {{ $user->email }}
                                </div>
                            </div>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <!-- /.Card Body-->
        </div>
        <!-- /.Card -->
    </div>
    <!-- /.Col -->
</div>
@endsection