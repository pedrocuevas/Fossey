@extends('layout')

@section('titulo')
Resultados de Búsqueda por propietario
<p>Propietario: {{$nombrePropietario." ".$apellidoPropietario}}</p>
@endsection

@section('cabecera')
{{ HTML::script('js/bootstrap-colorselector.js') }}
{{ HTML::style('css/bootstrap-colorselector.css') }}
@endsection

@section('contenido')

<div class="row">
    <div class="col-lg-12">
     <div class="panel panel-default">
        <div class="panel-heading">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Nombre</th>
                                <th>Especie</th>
                                <th>Ver ficha</th>
                                <th>Acción</th>
                            </tr>
                        </thead>                        
                        <tbody>
                       @foreach ($mascotas as $mascota)     
                            <tr>
                                <td>{{$mascota->id}}</td>
                                <td>{{$mascota->nombre}}</td>
                                <td>{{$mascota->raza->especie->nombre}}</td>
                                <td><a href="{{URL::to('/ficha/verFicha'.$mascota->id)}}">Ver ficha</a></td>
                                <td><abbr title="Eliminar"><button type="button" class="btn btn-danger btn-circle " onclick="borrarMascota({{$mascota->id}})"><i class="fa fa-times"></i></button></abbr></td>
                            </tr>
                       @endforeach     
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<div class="row"> 
    <div class="col-lg-12">         
        <p><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Agregar Mascota</button></p>
    </div> 
</div>

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Mascota</h4>
        </div>
        <div class="modal-body">
        {{ Form::open(array('url' => '/ingresoMascota')) }}    
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
         {{Form::hidden('idpropietario',$idpropietario,null)}}   
         {{ Form::close() }}    
        </div>
      </div>
      
    </div>
  </div>

 <script>
$(document).ready(function($) {
    $('#especie').change(function() {
        $.get("{{ url('razas')}}", {option: $(this).val()},
        function(data) {
            var razas = $('#razas');
            razas.empty();

            $.each(data, function(key, value) {
                razas.append($("<option></option>").attr("value", key).text(value));
            });
        });

    });

        $.get("{{ url('razas')}}", {option: $('#especie').val()},
        function(data) {
            var razas = $('#razas');
            razas.empty();

            $.each(data, function(key, value) {
                razas.append($("<option></option>").attr("value", key).text(value));
            });
        });
        
        



});

    function borrarMascota(idmascota){        
        if(confirm("¿Está seguro que desea eliminar el registro?")){
            document.location.href="{{URL::to('borrarMascota"+idmascota+"')}}";
        }
    }


</script>


@endsection