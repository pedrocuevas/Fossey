@extends('layout')

@section('titulo')
Agregar Horario Peluqueria
@endsection

@section('cabecera')
{{ HTML::script('js/mascaraHora.js') }}
@endsection

@section('contenido')


@if(!empty(Session::get('message')))
    @if(Session::get('message') == 'existe_horario')
       <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Lo Sentimos!</strong> Ya existe un horario para el profesional seleccionado
        </div>
    @elseif(Session::get('message') == 'no_profesional')
       <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Advertencia!</strong> Debe seleccionar un profesional
        </div>
    @elseif(Session::get('message') == 'hora_invalida')
       <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Advertencia!</strong> Debe seleccionar un horario válido
        </div>
    @endif
@endif


<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> Horario de Peluqueria
        <div class="pull-right">
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                {{ Form::open(array('route' => 'agregaHorario')) }}
                    <div class="form-group">
                        {{Form::label('profesional', 'Profesional:')}}
                        {{ Form::select('profesional', $combobox, $selected, array('class' => 'form-control')) }}
                    </div>
            </div>
        </div> 
        <div class="row">

            <div class="col-lg-12">
                <div class="form-group">
                   {{Form::label('lunes', 'Lunes:')}}
                   {{Form::checkbox('lunes', '1',true)}}
                   {{Form::label('martes', 'Martes:')}}
                   {{Form::checkbox('martes', '1',true)}}
                   {{Form::label('miercoles', 'Miércoles:')}}
                   {{Form::checkbox('miercoles', '1',true)}}
                   {{Form::label('jueves', 'Jueves:')}}
                   {{Form::checkbox('jueves', '1',true)}}
                   {{Form::label('viernes', 'Viernes:')}}
                   {{Form::checkbox('viernes', '1',true)}}
                   {{Form::label('sabado', 'Sábado:')}}
                   {{Form::checkbox('sabado', '1')}}
                   {{Form::label('domingo', 'Domingo:')}}
                   {{Form::checkbox('domingo', '1')}}
                </div>
            </div>
        </div>           
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {{Form::label('horainicio', 'Hora de Inicio:')}}
                    {{Form::text('horainicio',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)' , 'placeholder' => 'hh:mm:ss'))}}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{Form::label('horafin', 'Hora de Término:')}}
                    {{Form::text('horafin',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)',  'placeholder' => 'hh:mm:ss'))}}
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