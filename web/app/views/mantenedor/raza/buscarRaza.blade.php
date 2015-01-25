@extends('layout')

@section('titulo')
Buscar Raza
@endsection


@section('contenido')

@if(!empty(Session::get('message')))
    @if(Session::get('message') == 'ok_delete')
       <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Completado!</strong> Registro borrado exitosamente
        </div>
    @elseif(Session::get('message') == 'editar_ok')
       <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Completado!</strong> Registro modificado correctamente
        </div>
    @endif
@endif

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> Buscar Raza
        <div class="pull-right">
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::open(array('route' => 'resultadoRaza')) }}
                    {{Form::label('tipo', 'Tipo:')}}
                    {{Form::select('tipo', array('0' => 'Seleccione una especie', '1' => 'Canino', '2' => 'Felino', '3' => 'Otros'), '0', array('class' => 'form-control','id' => 'especie'))}} 
                </div>  
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{Form::label('raza', 'Raza:')}}
                    {{Form::select('raza', array('' => 'Seleccione una raza'), '', array('class' => 'form-control', 'id' => 'razas'))}} 
                </div>
            </div>

        </div>
    </div> 
    <div class="panel-body">
        <div class="col-lg-12">         
            <p><button type="Submit" class="btn btn-primary btn-lg">Buscar</button></p>
        </div> 
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