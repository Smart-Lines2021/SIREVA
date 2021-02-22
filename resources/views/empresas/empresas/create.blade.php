@extends('layouts.layout')
@section('title')
<h1 class="m-0 text-dark">Crear empresa</h1>
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
                <h3 class="card-title">Nueva empresa</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <form method="POST" action="{{route('empresas.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="razon_social">Razón social:</label>
                        <input type="text" name="razon_social" value="{{old('razon_social')}}" class="form-control"
                            placeholder="Ingrese razón social de la empresa" required minlegth="1" maxlength="120"
                            title="Ejemplo:Minera Peñasquito">
                    </div>

                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input type="text" name="telefono" class="form-control"
                            placeholder="Ingrese el telefono del cliente" pattern="[0-9]{4,12}" minlegth="4"
                            maxlength="12"
                            title="Solo se permiten letras y números. Tamaño mínimo: 4. Tamaño máximo: 12"
                            value="{{old('telefono')}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="text" name="correo" class="form-control"
                            placeholder="Ingrese el correo del cliente" 
                            pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s/.-_@0-9]{4,80}" minlegth="4" maxlength="80"
                            title="Solo se permiten letras y números. Tamaño mínimo: 4. Tamaño máximo: 80"
                            value="{{old('correo')}}">
                    </div>


                    <div class="form-group">
                        <label for="nombre">Domicilio: </label>
                        <input type="text" name="domicilio" value="{{old('domicilio')}}" class="form-control"
                            placeholder="Ingrese el domicilio" minlegth="2" maxlength="100" title="">
                    </div>

                    <button class="btn btn-info btn-block">Crear empresa</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection