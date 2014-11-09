@extends('layout')

@section('titulo')
Calculo de Dosis
@endsection

@section('contenido')

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> Calculo de Dosis
        <div class="pull-right">
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-4">
                {{ Form::open(array('route' => 'calculoDosis')) }}
                <div class="form-group">
                    {{Form::label('medicamentos', 'Nombre Genérico:')}}
                    {{ Form::select('medicamentos', $combobox, $selected, array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {{Form::label('peso', 'Peso:')}}
                    {{Form::text('peso',null,array('class' => 'form-control', 'maxlength' => '3','required' => 'required'))}}
                    <p class="help-block">Peso de la mascota en Kg.</p>
                </div>
            </div>
            </div>
        </div>                            
    <div class="panel panel-default">
    <div class="panel-body">
        <div class="col-lg-12">         
            <p><button type="Submit" class="btn btn-primary btn-lg">Calcular</button></p>
        </div> 
    </div>        
    </div>
    {{ Form::close(); }}

   
    
    @endsection