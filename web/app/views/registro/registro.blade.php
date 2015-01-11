@extends('layout')

@section('titulo')
Ingresar Nuevo Registro
@endsection

@section('cabecera')
{{ HTML::script('js/jquery.Rut.js') }}
{{ HTML::script('js/rut.js') }}
{{ HTML::script('js/bootstrap-colorselector.js') }}
{{ HTML::style('css/bootstrap-colorselector.css') }}
@endsection

@section('contenido')

@if(!empty(Session::get('message')))
    @if(Session::get('message') == 'no_comuna')
       <script>
          alert("Debe seleccionar una comuna");
       </script>
    @endif
    @if(Session::get('message') == 'no_especie')
       <script>
          alert("Debe seleccionar una especie");
       </script>
    @endif
    @if(Session::get('message') == 'no_raza')
       <script>
          alert("Debe seleccionar una raza");
       </script>
    @endif
@endif    

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> Datos del Propietario
        <div class="pull-right">
        </div>
    </div>
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
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-4">
                {{ Form::open(array('url' => '/ingreso')) }}
                <div class="form-group">
                    {{Form::label('rut', 'RUT:')}}
                    {{Form::text('rut',null,array('class' => 'form-control', 'placeholder' => '1234567k','maxlength' => '12', 'id' => 'rut', 'required' => 'required'))}}
                    <p class="help-block">Ingrese el rut del propietario</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('nombres', 'Nombres:')}}
                    {{Form::text('nombres',null,array('class' => 'form-control', 'placeholder' => 'Ingrese nombres aquí', 'required' => 'required'))}}                  
                    <p class="help-block">Ej: Juan Pablo</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('apellidos', 'Apellidos:')}}
                    {{Form::text('apellidos',null,array('class' => 'form-control', 'placeholder' => 'Ingrese apellidos', 'required' => 'required'))}}
                    <p class="help-block">Ej: Pérez Cotapos</p>
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
                    {{Form::text('direccion',null,array('class' => 'form-control', 'placeholder' => 'Ingrese aquí la dirección', 'required' => 'required'))}}
                    <p class="help-block">Ej: Av Pajaritos #6090</p>                   
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('genero', 'Género:')}}
                    <label class="radio-inline">
                        {{Form::radio('genero', '1',true, array('id' => 'optionsRadiosInline1'))}}Masculino
                    </label>
                    <label class="radio-inline">
                        {{Form::radio('genero', '2',null, array('id' => 'optionsRadiosInline2'))}}Femenino
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('correo', 'Correo:')}}
                    {{Form::email('correo',null,array('class' => 'form-control', 'placeholder' => 'email@dominio.com', 'required' => 'required'))}}
                    <p class="help-block">Ingrese la dirección de correo electrónico.</p>					
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('fono', 'Fono de contacto:')}}
                    {{Form::text('fono',null,array('class' => 'form-control', 'placeholder' => 'Ingrese teléfono de contacto', 'required' => 'required', 'maxlength' => '11'))}}
                    <p class="help-block">Ej: 09-12345678 o 02-1234567</p>
                </div>                
            </div>
        </div>       
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-star fa-fw"></i> Datos de la Mascota
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4"> 
                        <div class="form-group">
                            {{Form::label('nombre_mascota', 'Nombre:')}}
                            {{Form::text('nombre_mascota',null,array('class' => 'form-control', 'placeholder' => 'Ingrese el nombre aquí', 'required' => 'required'))}}
                            <p class="help-block">Ingrese el nombre de la mascota.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">  
                        <div class="form-group">
                            <label>Especie:</label>
                            {{Form::select('especie', array('0' => 'Seleccione una especie','1' => 'Canino',  '2' => 'Felino' ,
                                                    '3' => 'Otros'),'', array('class' => 'form-control','id' => 'especie'))}}
                        </div>
                    </div>
                    <div class="col-lg-4">   
                        <div class="form-group">
                            {{Form::label('razas', 'Raza:')}}
                            {{Form::select('razas', array('' => 'Seleccione una opción'),'', array('class' => 'form-control','id' => 'razas'))}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Fecha de Nacimiento:</label>
                            <input name="fecha_nac_mascota" class="form-control" type="date">
                        </div> 
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Color:</label>
                            <select id="colorselector">
                                <option value="Negro" data-color="#000000" selected="selected">Negro</option>
                                <option value="Blanco" data-color="#ffffff" >Blanco</option>
                                <option value="Café" data-color="#2B1906">Café</option>
                                <option value="Café Claro" data-color="#995003">Café Claro</option>
                                <option value="Gris" data-color="#A19E9A">Gris</option>
                            </select>
                            <script>
                                $('#colorselector').colorselector();
                            </script>
                        </div>
                    </div>    
                    <div class="col-lg-4">
                        <div class="form-group">
                            {{Form::label('sexo', 'Sexo:')}}
                            <label class="radio-inline">
                                {{Form::radio('sexo', '1',true, array('id' => 'optionsRadiosInline1'))}}Macho
                            </label>
                            <label class="radio-inline">
                                {{Form::radio('sexo', '2',null, array('id' => 'optionsRadiosInline2'))}}Hembra
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">  
                        <div class="form-group">
                            {{Form::label('comentario', 'Observaciones:')}}
                            {{Form::textarea('comentario',null,array('class' => 'form-control', 'rows' => '3', 'placeholder' => 'Escribe aquí cualquier observación extra'))}}
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





            <script>

                $(document).ready(function($) {

                    $('#especie').change(function() {

                        $.get("{{ url('razas')}}", {option: $(this).val()},
                        function(data) {

                            var razas = $('#razas');

                            razas.empty();

                            $.each(data, function(key, value) {

                                razas

                                        .append($("<option></option>")

                                                .attr("value", key)

                                                .text(value));
                            });

                        });

                    });

                });
            </script>

            @endsection

    


