@extends('layout')

@section('titulo')
Editar Registro
@endsection

@section('cabecera')
{{ HTML::script('js/jquery.Rut.js') }}
{{ HTML::script('js/rut.js') }}
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
        <i class="fa fa-user fa-fw"></i> Datos del Propietario
        <div class="pull-right">
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">

            <!-- /.col-lg-4 (nested) -->
            <div class="col-lg-4">
                {{ Form::open(array('route' => 'editarPropietarioGuardar')) }}
                <div class="form-group">
                    <label>Nombres:</label>
                    <input name="nombres" class="form-control" value="{{Session::get('nombres')}}" required>
                    <p class="help-block">Ej: Juan Pablo</p>
                </div>

                <div class="form-group">
                    <label>Comuna:</label>
                       {{ Form::select('comunas', $combobox, $selected, array('class' => 'form-control')) }}
                    <p class="help-block">Seleccione una comuna de la lista.</p>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label>Apellidos:</label>
                    <input name="apellidos" class="form-control" value="{{Session::get('apellidos')}}">
                    <p class="help-block">Ej: Pérez Cotapos</p>
                </div>


                <div class="form-group">
                    <label>Dirección:</label>
                    <input name="direccion" class="form-control" value="{{Session::get('direccion')}}">
                    <p class="help-block">Ej: Av Pajaritos #6090</p>
                    
                </div>

                
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Correo:</label>
                    <input name="correo" class="form-control" type="email" value="{{Session::get('correo')}}" required>
                    <p class="help-block">Ingrese la dirección de correo electrónico.</p>					
                </div>
                 <div class="form-group">
                    <label>Fono de contacto:</label>
                    <input name="fono" class="form-control" value="{{Session::get('fono')}}"  maxlength="11">
                    <p class="help-block">Ej: 9-12345678 o 2-1234567</p>
                </div>

            </div>
        </div>
    </div>       
    <div class="panel panel-default">

    <div class="panel-body">
        <div class="col-lg-12">         
            <p><button type="Submit" class="btn btn-primary btn-lg">Guardar</button></p>
        </div> 
    </div>        

    {{ Form::close(); }}

   
    
    @endsection