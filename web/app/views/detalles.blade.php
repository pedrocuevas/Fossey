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
                <h1>Nombre: {{Session::get('nombremascota')}}</h1>
            </div>
            <div class="col-lg-6">
                <h1>Peso: {{$peso}} Kg.</h1>     
            </div>
        </div>   
        <div class="row">
            <div class="col-lg-6">          
                <h1>Fecha de Atención: {{$fecha_atencion}}</h1>
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