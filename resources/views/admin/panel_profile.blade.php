@extends('admin.panel')

@section('panel-title', 'Mi cuenta')

@section('panel-content')
<div class="row justify-content-center">
    <!-- Col -->
    <div class="col-12 col-lg-5 mb-4">
        <!-- Card -->
        <div class="card">
            <div class="card-header border-none">
                Información personal
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="{{ url('/admin/update_profile') }}" method="POST">
                    @csrf
                    
                    <!-- Nombre -->
                    <div class="row form-group mb-3">
                        <div class="col-12">
                            <label class="pl-3">Nombre</label>
                            <input type="text" name="name" class="form-control form-rounded" value="{{Auth::user()->name}}" placeholder="Tu nombre" required>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="row form-group mb-3">
                        <div class="col-12">
                            <!-- Nombre -->
                            <label class="pl-3">Email</label>
                            <input type="email" name="email" class="form-control form-rounded" value="{{Auth::user()->email}}" placeholder="Tu email" required>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="row form-group">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary">Guardar información</button>
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
    <div class="col-12 col-lg-5 mb-4">
        <!-- Card -->
        <div class="card">
            <div class="card-header border-none">
                Cambiar contraseña
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="{{ url('/admin/update_password') }}" method="POST">
                    @csrf

                    <!-- Nombre -->
                    <div class="row form-group">    
                        <div class="col-12">
                            <label class="pl-3">Contraseña actual</label>
                            <input type="password" name="password" class="form-control form-rounded" placeholder="Ingresá tu contaseña actual" required>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row form-group">
                        <div class="col-12">
                            <label class="pl-3">Nueva contraseña</label>
                            <input type="password" name="new_password" class="form-control form-rounded" placeholder="Ingresá tu nueva contraseña" required>
                        </div>
                    </div>

                    <!-- Repetir nueva contraseña -->
                    <div class="row form-group mb-3">
                        <div class="col-12">
                            <label class="pl-3">Repetir nueva contraseña</label>
                            <input type="password" name="new_password_repeat" class="form-control form-rounded" placeholder="Repetí tu nueva contaseña" required>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="row form-group">
                        <div class="col-md-12 text-right mt-3">
                            <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
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
