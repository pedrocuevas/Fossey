
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Veterinaria Fossey</title>

        <!-- Core CSS - Include with every page -->
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('font-awesome/css/font-awesome.css') }}

        <!-- Page-Level Plugin CSS - Dashboard -->
        {{ HTML::style('css/plugins/morris/morris-0.4.3.min.css') }}
        {{ HTML::style('css/plugins/timeline/timeline.css') }}

        <!-- SB Admin CSS - Include with every page -->
        {{ HTML::style('css/sb-admin.css') }}
        {{ HTML::script('js/jquery-1.10.2.js') }}
    </head>
    <body>
        <div id="wrapper">
            <div class="row">
                <div class="col-lg-12"> 
                    <img src="{{ asset('img/correo.jpg') }}"/>
                </div>
            </div>      
            <h1>{{Session::get('nombremascota')}}</h1>
            <h2>La fecha de tu próximo control es el : {{$fecha}}</h2>  

        </div>
    </body>
</html>