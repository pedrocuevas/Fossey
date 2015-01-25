@extends('layout')

@section('titulo')
Agregar Profesional
@endsection

@section('cabecera')
{{ HTML::script('js/jquery.Rut.js') }}
{{ HTML::script('js/rut.js') }}
@endsection

@section('contenido')

@if(!empty(Session::get('message')))
    @if(Session::get('message') == 'rut_existe')
       <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Error!</strong> El rut ingresado ya existe
        </div>
    @endif
@endif

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
            <div class="col-lg-4">
                {{ Form::open(array('url' => 'agregarProfesional')) }}
                <div class="form-group">
                    {{Form::label('rut', 'Rut:')}}
                    {{Form::text('rut',null,array('class' => 'form-control', 'placeholder' => '12345678k', 'id' => 'rut', 'required' => 'required'))}}
                    <p class="help-block">Ingrese el rut del propietario</p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="form-group">
                    {{Form::label('nombres', 'Nombre Completo:')}}
                    {{Form::text('nombres',null,array('class' => 'form-control', 'placeholder' => 'Ingrese nombre completo aquí', 'required' => 'required'))}}
                    <p class="help-block">Ej: Juan Pablo</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('comunas', 'Comuna:')}}
                    {{ Form::select('comunas', $combobox, $selected, array('class' => 'form-control')) }}
                    <p class="help-block">Seleccione una comuna de la lista.</p>
                </div>
            </div>     
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('direccion', 'Dirección:')}}
                    {{Form::text('direccion',null,array('class' => 'form-control', 'placeholder' => 'Ingrese aquí su dirección'))}}
                    <p class="help-block">Ej: Av Pajaritos #6090</p>      
                </div>
            </div>   
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('genero', 'Género:')}}
                    <label class="radio">
                        {{Form::radio('genero', '1',true)}}Masculino
                    </label>
                    <label class="radio">
                        {{Form::radio('genero', '2')}}Femenino
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4"> 
                <div class="form-group">
                    {{Form::label('correo', 'E-mail:')}}
                    {{Form::text('correo',null,array('class' => 'form-control', 'placeholder' => 'email@dominio.com', 'required' => 'required'))}}
                    <p class="help-block">Ingrese la dirección de correo electrónico.</p>					
                </div>
            </div>
            <div class="col-lg-4"
                 <div class="form-group">
                    {{Form::label('fono', 'Fono de contacto:')}}
                    {{Form::text('fono',null,array('class' => 'form-control', 'placeholder' => 'Ingrese número de contacto', 'maxlength' => '8'))}}      
                    <p class="help-block">Ingrese el teléfono sin código de área.</p>
                </div>

                <div class="col-lg-4">     
                    <div class="form-group">
                        {{Form::label('titulo', 'Título:')}}
                        {{Form::text('titulo',null,array('class' => 'form-control', 'required' => 'required'))}}
                        <p class="help-block">Ej: Médico Veterinario</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {{Form::label('institucion', 'Institución:')}}
                        {{Form::text('institucion',null,array('class' => 'form-control', 'required' => 'required'))}}
                        <p class="help-block">Ej: Universidad de Chile</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {{Form::label('fecha_nac', 'Fecha de Nacimiento:')}}
                        {{Form::input('date','fecha_nac',null,array('class' => 'form-control'))}} 
                    </div>  
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {{Form::label('tipo', 'Tipo:')}}
                        {{Form::select('tipo', array('1' => 'Veterinaria', '2' => 'Peluquería'), '1', array('class' => 'form-control'))}} 
                    </div>  
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