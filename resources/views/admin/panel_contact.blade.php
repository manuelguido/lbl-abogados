@extends('admin.panel')

@section('panel-title', 'Contacto')

@section('panel-content')

<div class="row">
    <div class="col-12 col-lg-4 mb-5">
        <div class="card h-100">
            <div class="card-header p-3 bg-white2">
                <h1 class="h6 m-1 black2">Información de contacto</h1>
            </div>
            <div class="card-body p-5">
                <form method="admin/update_home_info" method="POST">
                    @csrf
                    <div class="row form-group">
                        <div class="col-12 mb-2">
                            <label class="w500 black3">Teléfono de contacto</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="phone" class="form-control" placeholder="Ingresá un teléfono">
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="w500 black3">Email de contácto</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Ingresá un email">
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="w500 black3">Dirección</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="text" name="address" class="form-control" placeholder="Ingresá una dirección">
                            </div>
                        </div>
                        <div class="col-12 text-right mt-2">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 mb-5">
        <div class="card">
            <div class="card-header p-3 bg-white2">
                <h1 class="h6 m-1 black2">Número de whatsapp</h1>
            </div>
            <div class="card-body p-5">
                <form method="admin/update_home_info" method="POST">
                    @csrf
                    <div class="row form-group">
                        <div class="col-12 mb-2">
                            <label class="w500 black3">Numero</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                </div>
                                <input type="text" name="whatsapp" class="form-control" placeholder="Ingresá un número">
                            </div>
                        </div>
                        <div class="col-12 text-right mt-2">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
