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
    @if(Session::get('message') == 'ok_delete')
    <script>
    alert("Registro borrado exitosamente")
    </script>
    @elseif(Session::get('message') == 'ok_update')
    <script>
    alert("Datos actualizados")
    </script>
    @elseif(Session::get('message') == 'no_propietario')
    <script>
    alert("No se encontró propietario")
    </script>
    @endif
@endif

{{ Form::open(array('route' => 'resultadoPropietarioMantenedor')) }}
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
