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
                {{ Form::open(array('url' => '/ingreso')) }}
                <div class="form-group">
                    <label>RUT:</label>
                    <input name="rut" id="rut" class="form-control" placeholder="12345678k"  maxlength="13" tabindex="1" required>
                    <p class="help-block">Ingrese el rut del propietario</p>
                </div>

                <div class="form-group">
                    <label>Comuna:</label>
                       {{ Form::select('comunas', $combobox, $selected, array('class' => 'form-control', 'tabindex' => '4')) }}
                    <p class="help-block">Seleccione una comuna de la lista.</p>
                </div>
                <div class="form-group">
                    <label>Correo:</label>
                    <input name="correo" class="form-control" type="email" placeholder="email@dominio.com" tabindex="7" required>
                    <p class="help-block">Ingrese la dirección de correo electrónico.</p>					
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label>Nombres:</label>
                    <input name="nombres" class="form-control" placeholder="Ingrese nombres aquí" tabindex="2" required>
                    <p class="help-block">Ej: Juan Pablo</p>
                </div>


                <div class="form-group">
                    <label>Dirección:</label>
                    <input name="direccion" class="form-control" placeholder="Ingrese aquí la dirección" tabindex="5">
                    <p class="help-block">Ej: Av Pajaritos #6090</p>
                    
                </div>
                <div class="form-group">
                    <label>Fono de contacto:</label>
                    <input name="fono" class="form-control" placeholder="Ingrese teléfono de contacto"  maxlength="8" tabindex="8">
                    <p class="help-block">Ingrese el teléfono sin código de área.</p>
                </div>
                
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Apellidos:</label>
                    <input name="apellidos" class="form-control" placeholder="Ingrese el nombre aquí" tabindex="3">
                    <p class="help-block">Ej: Pérez Cotapos</p>
                </div>
                <div class="form-group">
                    <label>Género:</label>
                    <label class="radio-inline">
                        <input type="radio" name="genero" id="optionsRadiosInline1" value="1" tabindex="6" checked>Masculino
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="genero" id="optionsRadiosInline2" value="2">Femenino
                    </label>
                </div>
            </div>
        </div>
    </div>       
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-star fa-fw"></i> Datos de la Mascota
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Nombre:</label>
                    <input name="nombre_mascota" class="form-control" placeholder="Ingrese el nombre aquí" tabindex="9">
                    <p class="help-block">Ingrese el nombre de la mascota.</p>
                </div>

                <div class="form-group">
                    <label>Sexo:</label>
                    <label class="radio-inline">
                        <input type="radio" name="sexo" id="optionsRadiosInline1" value="1" tabindex="12" checked>Macho
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sexo" id="optionsRadiosInline2" value="2" tabindex="13">Hembra
                    </label>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Especie:</label>
                    <select class="form-control" id="especie" name="especie" tabindex="10">
                        <option value="1">Canino</option>
                        <option value="2">Felino</option>
                        <option value="3">Otros</option>
                    </select>
                </div>
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
                    <label>Raza:</label>
                    <select class="form-control" id="razas" name="razas" tabindex="11">
                        <option value="">Seleccione una opción</option>
                    </select>
               </div>
                <div class="form-group">
                    <label>Fecha de Nacimiento:</label>
                    <input name="fecha_nac_mascota" class="form-control" type="date" tabindex="14">
                </div>         
        </div>
            <div class="row">
                <div class="col-lg-12">  
                    <div class="form-group">
                       <label>Observaciones:</label>
                       <textarea name="comentario" class="form-control" type="textarea" rows="3" placeholder="Escribe aquí cualquier observación extra" tabindex="15"></textarea>
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
    
      $(document).ready(function($){

        $('#especie').change(function(){

            $.get("{{ url('razas')}}", { option: $(this).val() }, 

            function(data) {

                var razas = $('#razas');

                    razas.empty();

                    $.each(data, function(key, value) {   

              razas

              .append($("<option></option>")

              .attr("value",key)

              .text(value)); 
              });

            });

        });

    });
</script>
    
    @endsection

    


