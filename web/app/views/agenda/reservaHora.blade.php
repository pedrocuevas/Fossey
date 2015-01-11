    
@extends('layout2')

@section('titulo')
Reservar Hora
@endsection

@section('cabecera')
{{ HTML::script('js/jquery.Rut.js') }}
{{ HTML::script('js/rut.js') }}
@endsection

@section('contenido')     
<div class="row"> 
    <div class="col-lg-6"> 
        {{ Form::open(array('route' => 'reservarHora')) }}
        {{Form::label('rut', 'Rut:')}}
        {{Form::text('rut',null,array('class' => 'form-control', 'placeholder' => 'Ingrese rut', 'maxlength' => '12', 'required' => 'required', 'id' => 'rut'))}}
    </div>
    <div class="col-lg-6"> 
        {{Form::label('nombres', 'Nombre Completo:')}}
        {{Form::text('nombres',null,array('class' => 'form-control', 'placeholder' => 'Ingrese nombre completo aquí', 'required' => 'required'))}}
    </div>
</div>
<div class="row">   
    <div class="col-lg-6"> 
        {{Form::label('correo', 'E-mail:')}}
        {{Form::text('correo',Session::get('correo_pro'),array('class' => 'form-control', 'placeholder' => 'email@dominio.com', 'required' => 'required'))}}          
    </div>
    <div class="col-lg-6"> 
        {{Form::label('fono', 'Fono de contacto:')}}
        {{Form::text('fono',Session::get('fono_pro'),array('class' => 'form-control', 'placeholder' => 'Ingrese número de contacto', 'maxlength' => '8'))}} 
    </div>
</div>
<div class="row">   
    <div class="col-lg-12">
        {{Form::hidden('hora',$hora.":".$minutos.":".$segundos )}}   
        <p><button type="Submit" class="btn btn-primary btn-lg">Enviar</button></p>
    </div> 
    {{ Form::close(); }}
</div>        

@endsection

