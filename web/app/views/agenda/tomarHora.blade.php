    
@extends('layout2')

@section('titulo')
Agendar Hora
@endsection

@section('cabecera')
  {{ HTML::style('css/datepicker.css') }}
  {{ HTML::script('js/bootstrap-datepicker.js') }}
@endsection

@section('contenido')     
    
 @if(!empty(Session::get('message')))
         @if(Session::get('message') == 'reserva_exitosa')
       <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Completado!</strong> Reserva realizada con éxito
        </div>
         @elseif(Session::get('message') == 'no_hora')
       <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Lo Sentimos!</strong> No existen horas disponibles para este día
        </div>
         @elseif(Session::get('message') == 'no_horario')
       <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Lo Sentimos!</strong> El profesional seleccionado no ha ingresado su horario
        </div>
       @elseif(Session::get('message') == 'hora_existe')
       <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Lo Sentimos!</strong> La hora ya fue tomada.
        </div>
        @elseif(Session::get('message') == 'no_dia')
       <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Lo Sentimos!</strong> El profesional no atiende este día.
        </div>
         @endif
 @endif
 
                <div class="col-lg-4"> 
                    {{ Form::open(array('route' => 'verHorario')) }}
                        <input  name="fecha" type="date" class="form-control">
                </div>
                <div class="col-lg-4"> 
                        {{Form::select('tipo', array('0' => 'Seleccione un servicio', '1' => 'Veterinaria', '2' => 'Peluqueria'), '0',array('class' => 'form-control', 'id' => 'tipo'))}}
                </div>
                <div class="col-lg-4"> 
                    <select class="form-control" id="profesional" name="profesional">
                        <option value="">Seleccione una opción</option>
                    </select>
                        
                </div>

            <div class="row">   
          <div class="col-lg-12">         
              <h1 class="page-header"></h1>
                  <p><button type="Submit" class="btn btn-primary btn-lg">Ver Horas</button></p>
        </div> 
                {{ Form::close(); }}
            </div>
  

        <!-- Load jQuery and bootstrap datepicker scripts -->
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
// When the document is ready
$(document).ready(function() {


    
            $('#tipo').change(function(){

            $.get("{{ url('selectTipo')}}", { option: $(this).val() }, 

            function(data) {

                var profesional = $('#profesional');

                    profesional.empty();

                    $.each(data, function(key, value) {   

              profesional

              .append($("<option></option>")

              .attr("value",key)

              .text(value)); 
              });

            });

        });

});
        </script>

 
           

@endsection



