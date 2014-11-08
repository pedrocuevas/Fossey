@extends('layout')

@section('titulo')
Ingresar Nueva Atención
@endsection

@section('cabecera')
{{ HTML::script('js/jquery.Rut.js') }}
{{ HTML::script('js/rut.js') }}
@endsection

@section('contenido')


<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> GokU
        <div class="pull-right">
        </div>
    </div>
    <!-- /.panel-heading -->
<div class="panel-body">
    <div class="well"> 
        <div class="row">
            <div class="col-lg-6">          
                <h1>Nombre: GokU {{var_dump($mascotas->toArray())}}</h1>
            </div>
            <div class="col-lg-6">
                <h1>Especie: Canino</h1>     
            </div>
        </div>   
        <div class="row">
            <div class="col-lg-6">          
                <h1>Raza: Poodle</h1>
            </div>
            <div class="col-lg-6">
                <h1>Fecha de Nacimiento:11/11/2011</h1>     
            </div>
        </div>
    </div>
    {{ Form::open(array('url' => '/registroAtencion')) }}
        <div class="row">
            <div class='col-lg-6'>
                <div class="form-group">
                    <label>Fecha:</label>
                    <input name="fecha" class="form-control" type="date" value="24-10-1989">                   
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Peso:</label>
                    <input name="peso" id="peso" class="form-control"   maxlength="4" required>
                    <p class="help-block">Ingrese el peso de la mascota en KG</p>
                </div>
            </div>
        </div>    
        <div class="row">  
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Vacuna:</label>
                    <select class="form-control">
                        <option>Octuple</option>
                    </select>
                </div>  
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Otros:</label>
                    <select class="form-control">
                        <option>Antiparasitario</option>
                    </select>
                </div>  
            </div>
        </div>    
        <div class="row">  
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('descripcion', 'Descripción') }}
                    {{ Form::textarea('descripcion', 'detalle de la atención', array('class' => 'form-control')) }}
                </div>  
            </div>
        </div>    
        <div class="row">
            <div class='col-lg-6'>
                <div class="form-group">
                    <label>Fecha del próximo control:</label>
                    <input name="fecha_control" class="form-control" type="date">
                </div>
            </div>
            <div class='col-lg-6'>
                <div class="form-group">
                  {{ Form::label('notificación', '¿Notificar por correo al propietario?') }}
                  {{ Form::checkbox('notificar', '1', true) }}
                </div>
            </div>  
        </div>
  <div class="row"> 
        <div class="col-lg-12">         
            <p><button type="Submit" class="btn btn-primary btn-lg">Guardar Registro</button></p>
        </div> 
    </div>
      {{ Form::close(); }}  
  </div>   
   
    </div>
 

    @endsection
