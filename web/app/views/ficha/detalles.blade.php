@extends('layout')

@section('titulo')
Ficha de {{Session::get('nombremascota')}}
@endsection

@section('cabecera')
@endsection

@section('contenido')

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> Detalle de Atención
        <div class="pull-right">
        </div>
    </div>
<div class="panel-body">
    <div class="well"> 
        <div class="row">
            <div class="col-lg-6">          
                <h2>Nombre: {{Session::get('nombremascota')}}</h2>
            </div>
            <div class="col-lg-6">
                <h2>Peso: {{$peso}} Kg.</h2>     
            </div>
        </div>   
        <div class="row">
            <div class="col-lg-6">          
                <h2>Fecha de Atención: {{$fecha_atencion}}</h2>
            </div>
        </div>
    </div> 
</div>
                     
</div>

<div class="panel panel-default">
    <div class="row">
            <div class="col-lg-6">
                <h2>Detalles: {{$descripcion}}</h2>     
            </div>
    </div>
</div>

@endsection