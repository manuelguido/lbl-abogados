@extends('admin.panel')

@section('panel-title', 'Sobre nosotros')

@section('panel-content')
<div class="row">
    <div class="col-12 col-lg-8 mb-5">
        <div class="card">
            <div class="card-header p-3 bg-white2">
                <h1 class="h6 m-1 black2">Información de la página sobre nosotros</h1>
            </div>
            <div class="card-body py-4 px-5">
                <form method="admin/update_home_info" method="POST">
                    @csrf
                    <div class="row form-group">
                        <div class="col-12 mb-3">
                            <label class="w500 black3">Descripción</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Ingresá una descripción" required></textarea>
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
