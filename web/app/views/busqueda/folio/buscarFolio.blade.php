@extends('layout')

@section('titulo')
Buscar Registros por N° de folio
@endsection

@section('cabecera')
@endsection

@section('contenido')

@if(!empty(Session::get('message')))
    @if(Session::get('message') == 'folio_inexistente')
       <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Lo Sentimos!</strong> El folio ingresado no se encuentra en nuestros registros
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
  
  
{{ Form::open(array('route' => 'resultadoFolio')) }}
<div class="input-group custom-search-form">
     {{Form::text('folio',null,array('class' => 'form-control', 'placeholder' => 'Ingrese el N° de folio', 'id' => 'folio', 'required' => 'required'))}}
    <span class="input-group-btn">
        <button class="btn btn-default" type="submit">
            <i class="fa fa-search"></i>
        </button>
    </span>
</div>
{{ Form::close() }}    

@endsection