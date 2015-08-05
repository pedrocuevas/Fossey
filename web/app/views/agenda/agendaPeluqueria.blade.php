@extends('layout')

@section('titulo')
Agenda Semanal Peluquería
@endsection

@section('cabecera')
@endsection

@section('contenido')

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-file fa-fw"></i> Horas agendadas
        <div class="pull-right">
        </div>
    </div>
    <div class="table-responsive">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Profesional</th>
                     <th>Servicios</th>
                     <th>Solicitante</th>
                      <th>Fono de Contacto</th>
                     
                </tr>
            </thead>                        
            <tbody>    
                @foreach ($agendas as $agenda)
                 @if($agenda->profesional->tipo->nombre_servicio == "Peluquería")
                    <td>{{ $agenda->fecha}}</td>
                    <td>{{ $agenda->hora }}</td>
                    <td>{{ $agenda->profesional->nombres }}</td>
                    <td>{{ $agenda->profesional->tipo->nombre_servicio }}</td>
                    <td>{{ $agenda->solicitante->nombre }}</td>
                    <td>{{ $agenda->solicitante->fono }}</td>
                </tr>
                 @endif
                @endforeach  

            </tbody>

        </table>
    </div>
</div>

@endsection