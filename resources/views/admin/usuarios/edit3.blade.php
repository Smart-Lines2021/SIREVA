@extends('layouts.layout')
@section('title')
<h1 class="m-0 text-dark">Editar Usuario Empresas</h1>
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
                <h3 class="card-title">Editar Usuario</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <form method="POST" action="{{route('store.usuarios.empresas')}}">
                    @csrf


                    <div class="form-group">
                        <label for="name">Nombre: </label>
                        <input type="text" name="name" value="{{old('name',$usuario->name)}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electronico: </label>
                        <input type="email" name="email" value="{{old('email',$usuario->email)}}" class="form-control">
                    </div>
                   

                  
                   
                    <input type="hidden" value="{{$usuario->empresa_id}}" name="empresa_id">
                  
                    


                    <button class="btn btn-info btn-block">Crear Usuario</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
{{-- Incluimos los links del diseño de la tabla de un solo archivo --}}
{{-- Incluimos css de select2 --}}
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush
@push('scripts')
{{-- Incluimos los scripts de la tabla de un solo archivo --}}
<script src="{{asset('js/password.js')}}"></script>
<script>
    function rellenarPassword(){
        document.getElementById('password').value=getPassword();
    }

    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    $("#roles").on('change', function() {
        var selectValue = $(this).val();
        if(selectValue=== "2"){
            $("#divempresa").show();
            $("#empresa_input").hide();
            $('#empresas').prop('required',true);
        } else{
            $("#divempresa").hide();
            $('#roles').prop('required',false);
        }
    }).change();

});

    
</script>
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
@endpush