@extends('admin.panel')

@section('panel-title', 'Noticias redactadas')

@section('panel-content')
<div class="row justify-content-center">
    @foreach ($posts as $post)
        <div class="col-12 col-lg-7 mb-2">
            <div class="card">
                <div class="card-header border-none row">
                    <div class="col-6">
                        {{$post->title}}
                    </div>
                    <div class="col-6 text-right">
                        <a href="/noticia/{{$post->post_id}}" class="opacity-1" title="Ver noticia"><i class="fas fa-eye black3 mr-2"></i></a>
                        <a href="{{ url('admin/modify_post/'.$post->post_id) }}" class="opacity-1" title="Modificar noticia"><i class="fas fa-edit black3 mr-2"></i></a>
                        <a onclick="return confirm('¿Estas seguro de eliminar la noticia?')" href="{{ url('admin/delete_post/'.$post->post_id) }}" class="opacity-1" title="Eliminar noticia"><i class="fas fa-trash-alt black3"></i></a>
                    </div>                    
                </div>
                <div class="card-body py-3 px-4">
                    <div class="row">
                        <div class="col-12 col-lg-10 py-0">
                            <div class="row">
                                <div class="col-12 col-lg-10 py-0">
                                    <label class="black5 p my-0">{{$post->date}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
