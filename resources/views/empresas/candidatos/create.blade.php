@extends('layouts.layout')
@section('title')
<h1 class="m-0 text-dark">Crear candidato</h1>
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
                <h3 class="card-title">Nuevo Candidato</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <form method="POST" action="{{route('candidatos.store')}}">
                    @csrf
                    <input type="hidden" name="empresa_id" value="{{$empresa->id}}">
                    <div class="row">
                        
                        <div class="form-group col-md-3">
                            <label for="razon_social">CURP:</label>
                            <input type="text" pattern="^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$" name="curp" value="{{old('nombre')}}" class="form-control"
                                placeholder="Ingrese curp con el formato correcto" required minlegth="1" maxlength="18"
                                title="Ejemplo: SAGA940416MZSNRN08">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="razon_social">Nombre:</label>
                            <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control"
                                placeholder="Ingrese nombre del candidato" required minlegth="1" maxlength="120"
                                title="Ejemplo: Juan Jose">
                        </div>


                        <div class="form-group col-md-3">
                            <label for="razon_social">Apellido Paterno:</label>
                            <input type="text" name="apellido_paterno" value="{{old('apellido_paterno')}}"
                                class="form-control" placeholder="Ingrese apellido paterno del candidato" required
                                minlegth="1" maxlength="120" title="Ejemplo: Rosales">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="razon_social">Apellido Materno:</label>
                            <input type="text" name="apellido_materno" value="{{old('apellido_materno')}}"
                                class="form-control" placeholder="Ingrese apellido materno del candidato" required
                                minlegth="1" maxlength="120" title="Ejemplo: Delgado">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="estado">Estado</label>

                            <select class="form-control select2" id="estados" 
                                data-placeholder="Seleccione un Estado" style="width: 100%;" name="estado" required>
                                <option selected="selected" value="">Seleccione un Estado</option>
                                @foreach ($estados->response->estado as $estado)
                                <option>{{$estado}}</option>
                                @if($errors->any())
                                <option {{old('estado')}}>{{old('estado')}}</option>
                                @endif
                                @endforeach

                            </select>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="municipio">Municipio</label>
                            <select class="select2" id="municipios" data-placeholder="Seleccione un Municipio"
                                style="width: 100%;" name="municipio" required>
                                @if($errors->any())
                                <option {{old('municipio')}}>{{old('municipio')}}</option>
                                @endif
                            </select>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="codigo_postal">Código postal</label>
                            <select class="select2" id="codigos_postales" data-placeholder="Seleccione un Codigo Postal"
                                style="width: 100%;" name="codigo_postal" required>
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
                                @if($errors->any())
                                <option {{old('colonia')}}>{{old('colonia')}}</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="razon_social">calle:</label>
                            <input type="text" name="calle" value="{{old('calle')}}" class="form-control"
                                placeholder="Ingrese calle del domiclio del candidato" required minlegth="1"
                                maxlength="120" title="Ejemplo: De los Varela">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="numero_exterior">Número exterior</label>
                            <input type="text" value="{{old('numero_exterior')}}" class="form-control"
                                name="numero_exterior" minlength="1" maxlength="5" required pattern="[0-9]{1,5}"
                                title="Solamente se aceptan números. Tamaño mínimo: 1. Tamaño máximo: 5."
                                placeholder="Ingrese número exterior del domicilio">
                        </div>


                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="numero_interior">Número interior</label>
                                <input type="text" value="{{old('numero_interior')}}" class="form-control"
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
                                <option selected="selected" value="">Seleccione un sexo</option>
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
                                value="{{old('correo')}}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="telefono">Telefono:</label>
                            <input type="text" name="telefono_celular" class="form-control"
                                placeholder="Ingrese el telefono del candidato" required pattern="[0-9]{4,12}"
                                minlegth="4" maxlength="12"
                                title="Solo se permiten letras y números. Tamaño mínimo: 4. Tamaño máximo: 12"
                                value="{{old('telefono')}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="cargo_id">Afiliaciones</label>
                            <select class="form-control select2" id="afiliaciones"
                                data-placeholder="Seleccione Afiliacíon" style="width: 100%;" name="afiliacion_id"
                                required>
                                <option selected="selected" value="">Seleccione afiliación</option>
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
                                <option selected="selected" value="">Seleccione Tipo de Candidato</option>
                                @foreach ($tipos_de_candidatos as $tipo_candidato)
                                <option {{ old('tipo_candidato_id') == $tipo_candidato->id ? "selected" : "" }}
                                    value="{{$tipo_candidato->id}}">
                                    {{$tipo_candidato->nombre}} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <button class="btn btn-info btn-block">Crear Candidato</button>
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