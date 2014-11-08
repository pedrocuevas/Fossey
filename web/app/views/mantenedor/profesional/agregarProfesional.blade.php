@extends('layout')

@section('titulo')
Agregar Profesional
@endsection

@section('cabecera')
{{ HTML::script('js/jquery.Rut.js') }}
{{ HTML::script('js/rut.js') }}
@endsection

@section('contenido')

<?php if(empty(Session::get('message')))$message='prueba';else$message=Session::get('message');?>
@if($message == 'rut_existe')
<script>
alert("El Rut ingresado ya existe");
</script>
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

            <!-- /.col-lg-4 (nested) -->
            <div class="col-lg-4">
                {{ Form::open(array('url' => 'agregarProfesional')) }}
                <div class="form-group">
                    {{Form::label('rut', 'Rut:')}}
                    {{Form::text('rut',null,array('class' => 'form-control', 'placeholder' => '12345678k', 'tabindex' => '1', 'id' => 'rut', 'required' => 'required'))}}
                    <p class="help-block">Ingrese el rut del propietario</p>
                </div>

                <div class="form-group">
                    {{Form::label('comunas', 'Comuna:')}}
                    {{ Form::select('comunas', $combobox, $selected, array('class' => 'form-control', 'tabindex' => '4')) }}
                    <p class="help-block">Seleccione una comuna de la lista.</p>
                </div>
                <div class="form-group">
                    {{Form::label('correo', 'E-mail:')}}
                    {{Form::text('correo',null,array('class' => 'form-control', 'placeholder' => 'email@dominio.com', 'tabindex' => '6', 'required' => 'required'))}}
                    <p class="help-block">Ingrese la dirección de correo electrónico.</p>					
                </div>
                <div class="form-group">
                    {{Form::label('institucion', 'Institución:')}}
                    {{Form::text('institucion',null,array('class' => 'form-control', 'tabindex' => '9', 'required' => 'required'))}}
                    <p class="help-block">Ej: Universidad de Chile</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('nombres', 'Nombres:')}}
                    {{Form::text('nombres',null,array('class' => 'form-control', 'placeholder' => 'Ingrese nombres aquí', 'tabindex' => '2', 'required' => 'required'))}}
                    <p class="help-block">Ej: Juan Pablo</p>
                </div>


                <div class="form-group">
                    {{Form::label('direccion', 'Dirección:')}}
                    {{Form::text('direccion',null,array('class' => 'form-control', 'placeholder' => 'Ingrese aquí su dirección', 'tabindex' => '5',))}}
                    <p class="help-block">Ej: Av Pajaritos #6090</p>      
                </div>
                <div class="form-group">
                    {{Form::label('fono', 'Fono de contacto:')}}
                    {{Form::text('fono',null,array('class' => 'form-control', 'placeholder' => 'Ingrese número de contacto', 'tabindex' => '7', 'maxlength' => '8'))}}      
                    <p class="help-block">Ingrese el teléfono sin código de área.</p>
                </div>
                <div class="form-group">
                    {{Form::label('fecha_nac', 'Fecha de Nacimiento:')}}
                    {{Form::input('date','fecha_nac',null,array('class' => 'form-control','tabindex' => '10'))}} 
                </div>  

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('apellidos', 'Apellidos:')}}
                    {{Form::text('apellidos',null,array('class' => 'form-control', 'placeholder' => 'Ingrese apellidos aquí', 'tabindex' => '3', 'required' => 'required'))}}                
                    <p class="help-block">Ej: Pérez Cotapos</p>
                </div>
                <div class="form-group">
                   {{Form::label('genero', 'Género:')}}
                    <label class="radio">
                    {{Form::radio('genero', '1',true)}}Masculino
                    </label>
                     <label class="radio">
                    {{Form::radio('genero', '2')}}Femenino
                    </label>
                </div>
                <div class="form-group">
                     {{Form::label('titulo', 'Título:')}}
                     {{Form::text('titulo',null,array('class' => 'form-control', 'tabindex' => '8', 'required' => 'required'))}}
                    <p class="help-block">Ej: Médico Veterinario</p>
                </div>
            </div>
        </div>
    </div>   
        <div class="panel-body">
        <div class="col-lg-12">         
            <p><button type="Submit" class="btn btn-primary btn-lg">Guardar Registro</button></p>
        </div> 
    </div>        

    {{ Form::close(); }}
    
@endsection    