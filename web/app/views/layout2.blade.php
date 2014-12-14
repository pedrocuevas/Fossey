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

        @yield('cabecera')

    </head>

    <body>


        <div id="page-wrapper" style="margin:0">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('titulo',"Inicio")</h1>
                    </div>  <!-- /.row -->
                </div>
                <div class="row">                      
                        @yield('contenido')
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