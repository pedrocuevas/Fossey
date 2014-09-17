@extends('layout')

@section('titulo')
Buscar Registros por N° de folio
@endsection

@section('cabecera')
@endsection

@section('contenido')

        
<form action="resultadoFolio" method="post" >
<div class="input-group custom-search-form">
    <input name="folio" id="folio" type="text" class="form-control" placeholder="Ingrese el N° de folio" >
    <span class="input-group-btn">
        <button class="btn btn-default" type="submit">
            <i class="fa fa-search"></i>
        </button>
    </span>
</div>
</form>    

@endsection