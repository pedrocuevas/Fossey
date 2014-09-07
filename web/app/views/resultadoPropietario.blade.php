@extends('layout')

@section('titulo')
Resultados de Búsqueda por propietario
<p>Propietario: {{$nombrePropietario." ".$apellidoPropietario}}</p>
@endsection

@section('cabecera')
@endsection

@section('contenido')

<div class="row">
    <div class="col-lg-12">
     <div class="panel panel-default">
        <div class="panel-heading">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Nombre</th>
                                <th>Especie</th>
                                <th><a href="#">Ver ficha</a></th>
                            </tr>
                        </thead>                        
                        <tbody>
                       @foreach ($mascotas as $mascota)     
                            <tr>
                                <td>{{$mascota->id}}</td>
                                <td>{{$mascota->nombre}}</td>
                                <td>{{$mascota->raza->especie->nombre}}</td>
                                <td><a href="verFicha{{$mascota->id}}">Ver ficha</a></td>
                            </tr>
                       @endforeach     
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