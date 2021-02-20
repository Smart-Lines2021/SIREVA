@extends('layouts.layout')
@section('title')
<h1 class="m-0 text-dark">Crear Usuario</h1>
@endsection
@section('content-header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
    <li class="breadcrumb-item active">Administración</li>
</ol>
@stop
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Nuevo Usuario</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <form method="POST" action="{{route('admin.usuarios.store')}}">
                    @csrf
                    <input name="empresa_id" value="{{$empresa->id}}">
                    <div class="form-group">
                        <label for="name">Nombre: </label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electronico: </label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Contraseña: </label>
                            <input type="password" id="password" name="password" value="{{old('password')}}"
                                class="form-control">
                            <input type="checkbox" onclick="mostrarPassword();"> Mostrar contraseña
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">&nbsp; </label>
                            <button type="button" onclick="rellenarPassword();"
                                class="btn btn-block btn-outline-primary"> <i class="fas fa-sync-alt"></i> Generar
                                Contraseña</button>
                        </div>
                    </div>
                    



                    <button class="btn btn-info btn-block">Crear empresa</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
{{-- Incluimos los links del diseño de la tabla de un solo archivo --}}

@endpush
@push('scripts')
{{-- Incluimos los scripts de la tabla de un solo archivo --}}
<script src="{{asset('js/password.js')}}"></script>
<script>
    function rellenarPassword(){
        document.getElementById('password').value=getPassword();
    }
</script>
@endpush