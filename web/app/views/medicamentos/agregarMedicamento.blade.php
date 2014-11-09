@extends('layout')

@section('titulo')
Agregar Medicamento
@endsection


@section('contenido')

<?php if(empty(Session::get('message')))$message='prueba';else$message=Session::get('message');?>
@if($message == 'medicamento_existe')
<script>
alert("Ya existe un medicamento con ese nombre")
</script>
@elseif($message == 'medicamento_add')
<script>
alert("Medicamento guardado con exito!")
</script>
@endif


<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> Datos del Medicamento
        <div class="pull-right">
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-3">
                {{ Form::open(array('route' => 'guardarMedicamento')) }}
                <div class="form-group">
                    {{Form::label('nombre_generico', 'Nombre Genérico:')}}
                    {{Form::text('nombre_generico',null,array('class' => 'form-control', 'required' => 'required'))}}
                    <p class="help-block">Ej: Amoxixilina</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {{Form::label('nombre_comercial', 'Nombre Comercial:')}}
                    {{Form::text('nombre_comercial',null,array('class' => 'form-control'))}}
                    <p class="help-block">Opcional</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {{Form::label('dosis_min', 'Dosis Mínima:')}}
                    {{Form::text('dosis_min',null,array('class' => 'form-control', 'maxlength' => '3','required' => 'required'))}}
                    <p class="help-block">mg/Kg</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {{Form::label('dosis_max', 'Dosis Máxima:')}}
                    {{Form::text('dosis_max',null,array('class' => 'form-control', 'maxlength' => '3','required' => 'required'))}}
                    <p class="help-block">mg/Kg</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {{Form::label('frecuencia', 'Frecuencia:')}}
                    {{Form::select('frecuencia', array('1' => '1', '2' => '2','3' => '3', '4' => '4'), '1',array('class' => 'form-control') )}}
                    <p class="help-block">Veces/Día</p>
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {{Form::label('descripcion', 'Descripcion:')}}
                    {{Form::textarea('descripcion',null,array('class' => 'form-control', 'rows' => '5'))}}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{Form::label('contraindicaciones', 'Contraindicaciones:')}}
                    {{Form::textarea('contraindicaciones',null,array('class' => 'form-control', 'rows' => '5'))}}
                </div>
            </div>      
        </div>
                        
    <div class="panel panel-default">

    <div class="panel-body">
        <div class="col-lg-12">         
            <p><button type="Submit" class="btn btn-primary btn-lg">Guardar</button></p>
        </div> 
    </div>        
    </div>
    {{ Form::close(); }}

   
    
    @endsection