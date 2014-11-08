@extends('layout')

@section('titulo')
Ficha de {{$nombremascota}}
@endsection

@section('cabecera')
@endsection

@section('contenido')

<div class="row">
    <div class="col-lg-12">
     <div class="panel panel-default">
        <div class="panel-heading">
                {{$nombremascota}}
        </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6"><h1>Nombre: {{$nombremascota}}</h1></div>
                    <div class="col-lg-6"><h1>Especie: {{$especie}}</h1></div>
                    <div class="col-lg-6"><h1>Raza: {{$raza}}</h1></div>
                    <div class="col-lg-6"><h1>Fecha de Nacimiento: {{$fechanac}}</h1></div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
<div>    



@endsection