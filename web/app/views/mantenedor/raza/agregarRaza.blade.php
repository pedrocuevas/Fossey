@extends('layout')

@section('titulo')
Agregar Raza
@endsection


@section('contenido')

@if(!empty(Session::get('message')))
    @if(Session::get('message') == 'raza_existe')
       <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Advertencia!</strong> La raza ingresada ya existe
        </div>
    @endif
    @if(Session::get('message') == 'raza_exito')
       <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Completado!</strong> Raza ingresada con éxito
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
        <i class="fa fa-user fa-fw"></i> Agregar Raza
        <div class="pull-right">
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::open(array('route' => 'guardarRaza')) }}
                    {{Form::label('tipo', 'Tipo:')}}
                    {{Form::select('tipo', array('1' => 'Canino', '2' => 'Felino', '3' => 'Otros'), '1', array('class' => 'form-control'))}} 
                </div>  
            </div>
            <div class="col-lg-6">               
                <div class="form-group">
                    {{Form::label('nombre', 'Nombre de la raza:')}}
                    {{Form::text('nombre',null,array('class' => 'form-control', 'required' => 'required'))}}
                    <p class="help-block">Ej: Poodle</p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                {{Form::label('descripcion', 'Descripcion:')}}
                {{Form::textarea('descripcion',null,array('class' => 'form-control', 'rows' => '5'))}}
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