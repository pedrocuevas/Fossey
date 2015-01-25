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
       <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Completado!</strong> Registro borrado exitosamente
        </div>
    @elseif(Session::get('message') == 'ok_update')
       <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Completado!</strong> Datos Actualizados
        </div>
    @elseif(Session::get('message') == 'no_propietario')
       <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Lo Sentimos!</strong> No se encontró propietario
        </div>
    @endif
@endif

 @if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Por favor corrige los siguentes errores:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif

{{ Form::open(array('route' => 'resultadoPropietarioMantenedor')) }}
<div class="input-group custom-search-form">
    <input name="rut" id="rut" type="text" class="form-control" placeholder="Ingrese Rut del Propietario" required>
    <span class="input-group-btn">
        <button class="btn btn-default" type="submit">
            <i class="fa fa-search"></i>
        </button>
    </span>
</div>
{{ Form::close(); }}

@endsection
