@extends('layout')

@section('titulo')
Buscar Registros por Propietario
@endsection

@section('cabecera')
{{ HTML::script('js/jquery.Rut.js') }}
{{ HTML::script('js/rut.js') }}
@endsection

@section('contenido')

{{ Form::open(array('url' => '/busqueda/propietario/buscarPropietario/resultadoRut')) }}
<div class="input-group custom-search-form">
    <input name="rut" id="rut" type="text" class="form-control" placeholder="Ingrese Rut del Propietario" >
    <span class="input-group-btn">
        <button class="btn btn-default" type="submit">
            <i class="fa fa-search"></i>
        </button>
    </span>
</div>
{{ Form::close(); }}

@endsection