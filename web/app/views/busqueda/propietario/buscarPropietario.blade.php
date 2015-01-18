@extends('layout')

@section('titulo')
Buscar Registros por Propietario
@endsection

@section('cabecera')
{{ HTML::script('js/jquery.Rut.js') }}
{{ HTML::script('js/rut.js') }}
@endsection

@section('contenido')

@if(!empty(Session::get('message')))
    @if(Session::get('message') == 'no_propietario')
    <script>
    alert("'No se encontraron mascotas coincidentes con el rut ingresado")
    </script>
    @elseif(Session::get('message') == 'registro_ok')
    <script>
    alert("Registro Exitoso")
    </script>
    @endif
@endif

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
