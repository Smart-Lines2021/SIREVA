@extends('layouts.layout')
@section('title')
<h1 class="m-0 text-dark">{{$empresa->razon_social}}</h1>
@endsection
@section('content-header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
    <li class="breadcrumb-item active">Administración</li>
</ol>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Candidatos Registrados de la empresa {{$empresa->razon_social}}</h3>
                    <a href="{{route('candidatos.empresas',Crypt::encryptString($empresa->id))}}" class="btn btn-secondary float-right">
                        <i class="fa fa-plus"></i> Añadir Candidato
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CURP</th>
                                <th>Nombre</th>
                                <th>Sexo</th>
                                <th>Domicilio</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Afiliación</th>
                                <th>Tipo de Candidato</th>
                                <th>Usuario Registro</th>
                                <th>Opciones</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($candidatos as $candidato)
                            <tr>
                                <td>{{$candidato->id}}</td>
                                <td>{{$candidato->curp}}</td>
                                <td>
                                    {{$candidato->nombre}} {{$candidato->apellido_paterno}}
                                    {{$candidato->apellido_materno}}
                                </td>
                                <td>{{$candidato->sexo->nombre}}</td>
                                <td>
                                    {{$candidato->calle}}, {{$candidato->numero_exterior }},
                                    @if($candidato->numero_interior != null)
                                        {{$candidato->numero_interior }},
                                    @endif
                                   
                                    <br>{{$candidato->colonia}}, {{$candidato->municipio}}, {{$candidato->estado}}
                                </td>
                                <td>{{$candidato->telefono_celular}}</td>
                                <td>
                                    @if($candidato->correo == null)
                                    Dato no registrado
                                    @else
                                    {{$candidato->correo}}
                                    @endif
                                </td>

                                <td>
                                    {{$candidato->afiliacion->nombre}}
                                </td>

                                <td>
                                    {{$candidato->tipo_candidato->nombre}}
                                </td>
                                <td>
                                {{$candidato->user->name}}
                                </td>

                                <td>
                                    <center>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-flat">Opciones</button>
                                            <button type="button"
                                                class="btn btn-info btn-flat dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">

                                                <a class="dropdown-item"
                                                    href="{{route('candidatos.edit',Crypt::encryptString($candidato->id))}}"><i
                                                        class="fas fa-user-edit"></i> Editar</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-target="#modal-destroy-{{$candidato->id}}"
                                                    data-toggle="modal"><i class="fas fa-user-times"></i> Eliminar</a>
                                                <div class="dropdown-divider"></div>
                                            </div>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                            @include('empresas.candidatos.destroy')
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@stop
@push('styles')
{{-- Incluimos los links del diseño de la tabla de un solo archivo --}}
@include('auxiliares.design-datatables')
@endpush
@push('scripts')
{{-- Incluimos los scripts de la tabla de un solo archivo --}}
@include('auxiliares.scripts-datatables')
@endpush