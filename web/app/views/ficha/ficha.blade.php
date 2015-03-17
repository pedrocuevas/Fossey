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
                <div class="col-lg-4">          
                    <h3>Nombre: <strong>{{Session::get('nombremascota')}}</strong></h3>
                </div>
                <div class="col-lg-4">
                    <h3>Especie: <strong>{{$especie}}</strong></h3>     
                </div>
                <div class="col-lg-4">
                    <h3>Folio: <strong>{{$id}}</strong></h3>     
                </div>
            </div>   
            <div class="row">
                <div class="col-lg-4">          
                    <h3>Raza: <strong>{{$raza}}</strong></h3>
                </div>
                <div class="col-lg-4">
                    <h3>Fecha de Nacimiento: <strong>{{$fechanac}}</strong></h3>     
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
                    <?php $fechaF = explode("-",$atencion->fecha); ?>
                    <td>{{ $fechaF[2]."-".$fechaF[1]."-".$fechaF[0] }}</td>
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

