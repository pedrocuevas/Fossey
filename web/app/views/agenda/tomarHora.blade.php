
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tomar Hora</title>
        {{ HTML::style('css/datepicker.css') }}
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::script('js/jquery-1.10.2.js') }}
        {{ HTML::script('js/bootstrap-datepicker.js') }}
        {{ HTML::script('js/jquery.Rut.js') }}
        {{ HTML::script('js/rut.js') }}

    </head>
    <body>
    
        <?php if (empty(Session::get('message')))
                  $message = 'prueba';
             else
                 $message = Session::get('message');
        ?>
         @if($message == 'reserva_exitosa')
           <script>
              alert("Reserva realizada con éxito");
           </script>
         @endif
         @if($message == 'no_hora')
           <script>
              alert("No existen horas disponibles para este día");
           </script>
         @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-4"> 
                    {{ Form::open(array('route' => 'verHorario')) }}
                    <div class="hero-unit">
                        <input  name="fecha" type="text"  placeholder="click to show datepicker"  id="example1">
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
            </div>
            <div class="row">   
          <div class="col-lg-12">         
            <p><button type="Submit" class="btn btn-primary btn-lg">Ver Horas</button></p>
   
        </div> 
                {{ Form::close(); }}
            </div>        
        </div>
        <!-- Load jQuery and bootstrap datepicker scripts -->
        <script src="js/jquery-1.9.1.min.js"></script>
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
        {{ HTML::script('js/bootstrap.min.js') }}
        
      
    </body>     

</html>



