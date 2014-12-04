
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Reservar Hora</title>
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::script('js/jquery-1.10.2.js') }}
        {{ HTML::script('js/jquery.Rut.js') }}
        {{ HTML::script('js/rut.js') }}
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-6"> 
                    {{ Form::open(array('route' => 'reservarHora')) }}
                    {{Form::label('rut', 'Rut:')}}
                    {{Form::text('rut',null,array('class' => 'form-control', 'placeholder' => 'Ingrese rut', 'required' => 'required', 'id' => 'rut'))}}
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



