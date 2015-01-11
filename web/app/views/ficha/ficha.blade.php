@extends('layout')

@section('titulo')
Ficha de {{Session::get('nombremascota')}}
@endsection

@section('cabecera')
@endsection

@section('contenido')

 @if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Por favor corrige los siguentes errores:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
 @endif

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
                    <h1>Nombre: {{Session::get('nombremascota')}}</h1>
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
                @foreach ($atenciones as $atencion)
                <tr>
                    <td>{{ $atencion->fecha }}</td>
                    <td>{{ $atencion->profesional->nombres.' '.$atencion->profesional->apellidos }}</td>
                    <td><a href="verAtencion{{$atencion->id}}">Ver Detalles</a></td>
                </tr>
                @endforeach  

            </tbody>

        </table>
        {{ $atenciones->links() }}
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

        {{ Form::open(array('url' => 'ficha/registroAtencion'."$id")) }}
        <div class="row">
            <div class='col-lg-4'>
                <div class="form-group">
                    <label>Fecha:</label>
                    <input name="fecha" class="form-control" type="date" value="{{date("Y-m-d")}}">

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Peso:</label>
                    <input name="peso" id="peso" class="form-control"   maxlength="3" required>
                    <p class="help-block">Ingrese el peso de la mascota en KG</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Atendido por:</label>
                    {{ Form::select('profesionales', $combobox2, $selected2, array('class' => 'form-control', 'tabindex' => '4')) }}
                    <p class="help-block">Seleccione una comuna de la lista.</p>
                </div>
            </div>
        </div>    
        <div class="row">  
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Vacuna:</label>
                    <select class="form-control">
                        <option value="Octuple">Octuple</option>
                        <option value="Antirábica">Antirábica</option>
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
                    {{ Form::textarea('descripcion',null, array('class' => 'form-control', 'placeholder' => 'detalle de la atención')) }}
                </div>  
            </div>
        </div>    
        <div class="row">
            <div class='col-lg-6'>
                <div class="form-group">
                    <label>Fecha del próximo control:</label>
                    <input name="fecha_control" class="form-control" type="date" min="{{date("Y-m-d")}}">
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

