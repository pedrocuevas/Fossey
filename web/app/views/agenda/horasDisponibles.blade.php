    
@extends('layout2')

@section('titulo')
Horas Disponibles {{$fecha}}
@endsection



@section('contenido')     

<h3>Servicio: {{$servicio}}</h3>
<h3>Nombre del profesional: {{$nombre}}</h3>

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped">  
            <thead>
                <tr>
                    <th>Hora</th>
                    <th></th>
                </tr>
            </thead> 
            @foreach($array as $datos)
            <tr>
                <td>{{$inicio}}</td>
                @if($datos == 1)
                <?php
                $hora = explode(":", $inicio);
                $hh = $hora[0];
                $mm = $hora[1];
                $ss = $hora[2];
                ?>
                <td><a href="reserva={{$hh}}={{$mm}}={{$ss}}">Tomar Hora</a></td>
                @else
                <td>Hora no disponible</td>
                @endif
            </tr>
            <?php 
             if($tipo == 2)
               $inicio = date('H:i:s', strtotime($inicio . ' + 5400 seconds'));
             else
               $inicio = date('H:i:s', strtotime($inicio . ' + 3600 seconds'));  
            
             ?>
            @endforeach
        </table> 
    </div>

    @endsection
