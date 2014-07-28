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

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Veterinaria Fossey</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

           


                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">

                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="registro"><i class="fa fa-pencil fa-fw"></i> Nuevo Registro</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-search fa-fw"></i> Buscar Registro<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="propietario.html">Por Propietario</a>
                                </li>
                                <li>
                                    <a href="mascota.html">Por Mascota</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-calendar fa-fw"></i>Agenda</a>
                        </li>
                        <li>
                            <a href="medicamentos.html"><i class="fa fa-book fa-fw"></i> Medicamentos</a>
                        </li>
                        

                        
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">

           <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('titulo',"Inicio")</h1>
                </div>  <!-- /.row -->
            </div>
         
             <div class="row">
                <div class="col-lg-12">

	                @yield('contenido')

                </div>

             </div>
       </div>
                
     </div>            

    <!-- Core Scripts - Include with every page -->
  {{ HTML::script('js/jquery-1.10.2.js') }}
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