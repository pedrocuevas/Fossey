@extends('layout')

@section('titulo')
Ficha de {{$nombre}}
@endsection

@section('cabecera')
@endsection

@section('contenido')


<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> Datos de la mascota
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
<div class="panel panel-default">
                        <div class="panel-heading">
                        <i class="fa fa-file fa-fw"></i> Historial de Atenciones
                        <div class="pull-right">
                        </div>
                    </div>
  <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Atendido por</th>
                                <th></th>
                            </tr>
                        </thead>                        
                        <tbody>    
                                <td>19/09/2014</td>
                                <td>Sebastián Suanez</td>
                                <td><a href="#">Ver Detalles</a></td>
                            </tr>    
                        </tbody>
                    </table>
                </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-plus fa-fw"></i> Ingresar Atención
        <div class="pull-right">
        </div>
    </div>
    <!-- /.panel-heading -->
<div class="panel-body">
   
           {{ Form::open(array('url' => '/registroAtencion'."$id")) }}
        <div class="row">
            <div class='col-lg-6'>
                <div class="form-group">
                    <label>Fecha:</label>
                    <input name="fecha" class="form-control" type="date">
                   
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


@endsection
    
    