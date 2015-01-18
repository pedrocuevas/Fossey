    
@extends('layout2')

@section('titulo')
Tomar Hora
@endsection

@section('cabecera')
  {{ HTML::style('css/datepicker.css') }}
  {{ HTML::script('js/bootstrap-datepicker.js') }}
@endsection

@section('contenido')     
    
 @if(!empty(Session::get('message')))
         @if(Session::get('message') == 'reserva_exitosa')
           <script>
              alert("Reserva realizada con éxito");
           </script>
         @elseif(Session::get('message') == 'no_hora')
           <script>
              alert("No existen horas disponibles para este día");
           </script>
         @elseif(Session::get('message') == 'no_horario')
           <script>
              alert("El profesional seleccionado no ha ingresado su horario");
           </script>
         @endif
 @endif
 
                <div class="col-lg-4"> 
                    {{ Form::open(array('route' => 'verHorario')) }}
                    <div class="hero-unit">
                        <input  name="fecha" type="text"  placeholder="click para mostrar fecha"  id="example1">
                    </div>
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
            <p><button type="Submit" class="btn btn-primary btn-lg">Ver Horas</button></p>
        </div> 
                {{ Form::close(); }}
            </div>        

        <!-- Load jQuery and bootstrap datepicker scripts -->
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
// When the document is ready
$(document).ready(function() {

    $('#example1').datepicker({
        format: "dd/mm/yyyy"
    });
    
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



