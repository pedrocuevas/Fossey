@extends('layout')

@section('titulo')
Resultados de Búsqueda por Folio
@endsection

@section('cabecera')
@endsection

@section('contenido')

<div class="row">
    <div class="col-lg-12">
     <div class="panel panel-default">
        <div class="panel-heading">
                Striped Rows
        </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre del propietario</th>
                                <th>Nombre de la mascota</th>
                                <th>Ver Ficha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?php echo $folio;?></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
<div>    



@endsection