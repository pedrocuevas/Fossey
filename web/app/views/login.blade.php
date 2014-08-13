<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inicie Sesión, por favor</h3>
                        </div>
                        <div class="panel-body">
                             {{ Form::open(array('url' => '/login')) }}
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nombre de Usuario" name="usuario" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Contraseña" name="contraseña" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Recordar Contraseña
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="Submit" class="btn btn-lg btn-success btn-block">Iniciar Sesión</button>
                                </fieldset>
                             {{ Form::close(); }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Scripts - Include with every page -->

        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/plugins/metisMenu/jquery.metisMenu.js') }}

        <!-- Page-Level Plugin Scripts - Dashboard -->
        {{ HTML::script('js/plugins/morris/raphael-2.1.0.min.js') }}
        {{ HTML::script('js/plugins/morris/morris.js') }}

        <!-- SB Admin Scripts - Include with every page -->
        {{ HTML::script('js/sb-admin.js') }}

        <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
        {{ HTML::script('js/demo/dashboard-demo.js') }}    

    </body>
</html>