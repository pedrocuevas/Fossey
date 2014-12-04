@extends('layout')

@section('titulo')
Agregar Raza
@endsection


@section('contenido')

<?php
if (empty(Session::get('message')))
    $message = 'prueba';

    else$message = Session::get('message');
?>
@if($message == 'raza_existe')
<script>
    alert("La raza ingresada ya existe");
</script>
@endif
@if($message == 'raza_exito')
<script>
    alert("Raza ingresada con éxito");
</script>
@endif

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> Agregar Raza
        <div class="pull-right">
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::open(array('route' => 'guardarRaza')) }}
                    {{Form::label('tipo', 'Tipo:')}}
                    {{Form::select('tipo', array('1' => 'Canino', '2' => 'Felino', '3' => 'Otros'), '1', array('class' => 'form-control'))}} 
                </div>  
            </div>
            <div class="col-lg-6">               
                <div class="form-group">
                    {{Form::label('nombre', 'Nombre de la raza:')}}
                    {{Form::text('nombre',null,array('class' => 'form-control', 'required' => 'required'))}}
                    <p class="help-block">Ej: Poodle</p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                {{Form::label('descripcion', 'Descripcion:')}}
                {{Form::textarea('descripcion',null,array('class' => 'form-control', 'rows' => '5'))}}
            </div>
        </div>
    </div> 
    <div class="panel-body">
        <div class="col-lg-12">         
            <p><button type="Submit" class="btn btn-primary btn-lg">Guardar Registro</button></p>
        </div> 
    </div>
</div>        

{{ Form::close(); }}

@endsection    