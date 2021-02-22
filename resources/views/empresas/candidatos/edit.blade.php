@extends('layouts.layout')
@section('title')
<h1 class="m-0 text-dark">Editar candidato</h1>
@endsection
@section('content-header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
    <li class="breadcrumb-item active">Administración</li>
</ol>
@stop
@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Editar Candidato</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <form method="POST" action="{{route('candidatos.update',Crypt::encryptString($candidato->id))}}">
                    @csrf
                       @method('PUT')
                    <input type="hidden" name="empresa_id" value="{{$candidato->empresa_id}}">
                    <div class="row">

                    <input type="hidden" name="id" value="{{$candidato->id}}">

                        <div class="form-group col-md-3">
                            <label for="curp">CURP:</label>
                            <input type="text"
                                pattern="^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$"
                                name="curp" value="{{old('curp',$candidato->curp)}}" class="form-control"
                                placeholder="Ingrese curp con el formato correcto" required minlegth="1" maxlength="18"
                                title="Ejemplo: SAGA940416MZSNRN08">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="razon_social">Nombre:</label>
                            <input type="text" name="nombre" value="{{old('nombre',$candidato->nombre)}}" class="form-control"
                                placeholder="Ingrese nombre del candidato" required minlegth="1" maxlength="120"
                                title="Ejemplo: Juan Jose">
                        </div>


                        <div class="form-group col-md-3">
                            <label for="razon_social">Apellido Paterno:</label>
                            <input type="text" name="apellido_paterno" value="{{old('apellido_paterno',$candidato->apellido_paterno)}}"
                                class="form-control" placeholder="Ingrese apellido paterno del candidato" required
                                minlegth="1" maxlength="120" title="Ejemplo: Rosales">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="razon_social">Apellido Materno:</label>
                            <input type="text" name="apellido_materno" value="{{old('apellido_materno',$candidato->apellido_materno)}}"
                                class="form-control" placeholder="Ingrese apellido materno del candidato" required
                                minlegth="1" maxlength="120" title="Ejemplo: Delgado">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="estado">Estado</label>

                            <select class="form-control select2" id="estados" data-placeholder="Seleccione un Estado"
                                style="width: 100%;" name="estado" required>
                                <option {{ old('estado') == $candidato->estado ? "selected" : "" }} value="{{$candidato->estado}}"> {{$candidato->estado}}</option>
                                @foreach ($estados->response->estado as $estado)
                                <option {{ old('estado') == $estado ? "selected" : "" }} value="{{$estado}}">{{$estado}} </option>
                                @endforeach
                                @if($errors->any())
                                <option {{old('estado')}}>{{old('estado')}}</option>
                                @endif
                            </select>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="municipio">Municipio</label>
                            <select class="select2" id="municipios" data-placeholder="Seleccione un Municipio"
                                style="width: 100%;" name="municipio" required>
                                <option {{ old('municipio') == $candidato->municipio ? "selected" : "" }} value="{{$candidato->municipio}}"> {{$candidato->municipio}}</option>
                                @if($errors->any())
                                <option {{old('municipio')}}>{{old('municipio')}}</option>
                                @endif
                            </select>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="codigo_postal">Código postal</label>
                            <select class="select2" id="codigos_postales" data-placeholder="Seleccione un Codigo Postal"
                                style="width: 100%;" name="codigo_postal" required>
                                <option {{ old('codigo_postal') == $candidato->codigo_postal ? "selected" : "" }} value="{{$candidato->codigo_postal}}"> {{$candidato->codigo_postal}}</option>
                                @if($errors->any())
                                <option {{old('codigo_postal')}}>{{old('codigo_postal')}}</option>
                                @endif
                            </select>
                        </div>


                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="colonia">Colonias</label>
                            <select class="select2" id="colonias" data-placeholder="Seleccione una colonia"
                                style="width: 100%;" name="colonia" required>
                                <option {{ old('colonia') == $candidato->colonia ? "selected" : "" }} value="{{$candidato->colonia}}"> {{$candidato->colonia}}</option>
                                @if($errors->any())
                                <option {{old('colonia')}}>{{old('colonia')}}</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="razon_social">calle:</label>
                            <input type="text" name="calle" value="{{old('calle',$candidato->calle)}}" class="form-control"
                                placeholder="Ingrese calle del domiclio del candidato" required minlegth="1"
                                maxlength="120" title="Ejemplo: De los Varela">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="numero_exterior">Número exterior</label>
                            <input type="text" value="{{old('numero_exterior',$candidato->numero_exterior)}}" class="form-control"
                                name="numero_exterior" minlength="1" maxlength="5" required pattern="[0-9]{1,5}"
                                title="Solamente se aceptan números. Tamaño mínimo: 1. Tamaño máximo: 5."
                                placeholder="Ingrese número exterior del domicilio">
                        </div>


                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="numero_interior">Número interior</label>
                                <input type="text" value="{{old('numero_interior',$candidato->numero_interior)}}" class="form-control"
                                    name="numero_interior" minlength="1" maxlength="5"
                                    title="Solamente se aceptan números. Tamaño mínimo: 1. Tamaño máximo: 5."
                                    placeholder="Ingrese número interior del domicilio">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="cargo_id">Sexo</label>
                            <select class="form-control select2" id="sexos" data-placeholder="Seleccione Sexo"
                                style="width: 100%;" name="sexo_id" required>
                                <option {{ old('sexo_id') == $candidato->sexo_id ? "selected" : "" }} value="{{$candidato->sexo_id}}"> {{$candidato->sexo->nombre}}</option>
                                @foreach ($sexos as $sexo)
                                <option {{ old('sexo_id') == $sexo->id ? "selected" : "" }} value="{{$sexo->id}}">
                                    {{$sexo->nombre}} </option>

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group col-md-4">

                            <label for="correo">Correo:</label>
                            <input type="email" name="correo" class="form-control"
                                placeholder="Ingrese el correo del candidato"
                                pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s/.-_@0-9]{4,80}" required minlegth="4" maxlength="80"
                                title="Solo se permiten letras y números. Tamaño mínimo: 4. Tamaño máximo: 80"
                                value="{{old('correo',$candidato->correo)}}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="telefono">Telefono:</label>
                            <input type="text" name="telefono_celular" class="form-control"
                                placeholder="Ingrese el telefono del candidato" required pattern="[0-9]{4,12}"
                                minlegth="4" maxlength="12"
                                title="Solo se permiten letras y números. Tamaño mínimo: 4. Tamaño máximo: 12"
                                value="{{old('telefono_celular',$candidato->telefono_celular)}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="afiliacion_id">Afiliaciones</label>
                            <select class="form-control select2" id="afiliaciones"
                                data-placeholder="Seleccione Afiliacíon" style="width: 100%;" name="afiliacion_id"
                                required>
                                <option {{ old('afiliacion_id') == $candidato->afiliacion_id ? "selected" : "" }} value="{{$candidato->afiliacion_id}}"> {{$candidato->afiliacion->nombre}}</option>
                                @foreach ($afiliaciones as $afiliacion)
                                <option {{ old('afiliacion_id') == $afiliacion->id ? "selected" : "" }}
                                    value="{{$afiliacion->id}}">
                                    {{$afiliacion->nombre}} </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cargo_id">Tipos de Candidatos</label>
                            <select class="form-control select2" id="tipo_de_candidatos"
                                data-placeholder="Seleccione Tipo de Candidato" style="width: 100%;"
                                name="tipo_candidato_id" required>
                                <option {{ old('afiliacion_id') == $candidato->tipo_candidato_id ? "selected" : "" }} value="{{$candidato->tipo_candidato_id}}"> {{$candidato->tipo_candidato->nombre}}</option>
                                @foreach ($tipos_de_candidatos as $tipo_candidato)
                                <option {{ old('tipo_candidato_id') == $candidato->id ? "selected" : "" }}
                                    value="{{$tipo_candidato->id}}">
                                    {{$tipo_candidato->nombre}} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                     <input type="hidden" name="user_id" value="{{$candidato->user_id}}">


                    <button class="btn btn-info btn-block">Editar Candidato</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
{{-- Incluimos css de select2 --}}
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@include('auxiliares.design-datetime')
@endpush
@push('scripts')
{{-- Incluimos js de select2 --}}
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
@include('auxiliares.scripts-design-datetime')

<script src="{{asset('js/api_sepomex.js')}}"></script>
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
})
   
</script>


@endpush