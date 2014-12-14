    
@extends('layout2')

@section('titulo')
Horas Disponibles
@endsection



@section('contenido')     


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
            <?php $inicio = date('H:s:i', strtotime($inicio . ' + 1 hours')); ?>
            @endforeach
        </table> 
    </div>

    @endsection
