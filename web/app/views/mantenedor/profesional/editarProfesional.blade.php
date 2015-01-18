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
        <i class="fa fa-user fa-fw"></i> Datos del Profesional
        <div class="pull-right">
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-8">
                {{ Form::open(array('route' => 'editarProfesionalGuardar')) }}
                <div class="form-group">
                    {{Form::label('nombres', 'Nombre Completo:')}}
                    {{Form::text('nombres',Session::get('nombres_pro'),array('class' => 'form-control', 'placeholder' => 'Ingrese nombre completo aquí', 'required' => 'required'))}}
                    <p class="help-block">Ej: Juan Pablo</p>
                </div>
            </div>          
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Comuna:</label>
                    {{ Form::select('comunas', $combobox, $selected, array('class' => 'form-control')) }}
                    <p class="help-block">Seleccione una comuna de la lista.</p>
                </div>
            </div>    
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('direccion', 'Dirección:')}}
                    {{Form::text('direccion',Session::get('direccion_pro'),array('class' => 'form-control', 'placeholder' => 'Ingrese aquí su dirección'))}}
                    <p class="help-block">Ej: Av Pajaritos #6090</p>      
                </div> 
            </div>
            <div class="col-lg-4"> 
                <div class="form-group">
                    {{Form::label('correo', 'E-mail:')}}
                    {{Form::text('correo',Session::get('correo_pro'),array('class' => 'form-control', 'placeholder' => 'email@dominio.com', 'required' => 'required'))}}
                    <p class="help-block">Ingrese la dirección de correo electrónico.</p>					
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('fono', 'Fono de contacto:')}}
                    {{Form::text('fono',Session::get('fono_pro'),array('class' => 'form-control', 'placeholder' => 'Ingrese número de contacto', 'maxlength' => '11'))}}      
                    <p class="help-block">Ej: 9-12345678 o 2-1234567</p>
                </div>
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