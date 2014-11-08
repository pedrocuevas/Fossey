@extends('layout')

@section('titulo')
Buscar Registros por Propietario
@endsection

@section('cabecera')
{{ HTML::script('js/jquery.Rut.js') }}
{{ HTML::script('js/rut.js') }}
@endsection

@section('contenido')

<?php if(empty(Session::get('message')))$message='prueba';else$message=Session::get('message');?>
@if($message == 'ok_delete')
<script>
alert("Registro borrado exitosamente")
</script>
@elseif($message == 'ok_update')
<script>
alert("Datos actualizados")
</script>
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
