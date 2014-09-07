@extends('layout')

@section('titulo')
Ficha de {{$nombre}}
@endsection

@section('cabecera')
@endsection

@section('contenido')


<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> {{$nombre}}
        <div class="pull-right">
        </div>
    </div>
<div class="panel-body">
    <div class="well"> 
        <div class="row">
            <div class="col-lg-6">          
                <h1>Nombre: {{$nombre}}</h1>
            </div>
            <div class="col-lg-6">
                <h1>Especie: {{$especie}}</h1>     
            </div>
        </div>   
        <div class="row">
            <div class="col-lg-6">          
                <h1>Raza: {{$raza}}</h1>
            </div>
            <div class="col-lg-6">
                <h1>Fecha de Nacimiento: {{$fechanac}}</h1>     
            </div>
        </div>
    </div> 
</div>
</div>

@endsection
    
    