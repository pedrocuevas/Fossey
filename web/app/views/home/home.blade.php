                
@extends('layout')

@section('titulo')
Inicio
@endsection


@section('contenido')

@if(!empty(Session::get('message')))
@if(Session::get('message') == 'registro_ok')
<script>
    alert("Registro realizado con éxito");
</script>
@endif
@endif
<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-list-alt fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{Session::get('totalmascotas')}}</div>
                    <div>Mascotas Registradas</div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-book fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{Session::get('totalmedicamentos')}}</div>
                    <div>Medicamentos ingresados</div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="col-lg-3 col-md-6">
    <a href="{{URL::route('agendaVeterinaria')}}">    
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-plus fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{Session::get('totalvet')}}</div>
                        <div>Agenda diaria Veterinaria</div>
                    </div>
                </div>
            </div>
        </div>
    </a>   
</div> 
<div class="col-lg-3 col-md-6">
    <a href="{{URL::route('agendaPeluqueria')}}">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-scissors fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{Session::get('totalpelu')}}</div>
                        <div>Agenda diaria Peluquería</div>
                    </div>
                </div>
            </div>
        </div>
    </a> 
</div>  
<div class="col-lg-12">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Últimos registros</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Fecha de ingreso</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($ultimos as $ultimo)    
                    <tr>
                        <td>{{$ultimo->id}}</td>
                        <td><a href="ficha/verFicha<?=$ultimo->id;?>">{{$ultimo->nombremascota}}</a></td>
                        <td>{{$ultimo->nombre}}</td>
                        <td>{{$ultimo->raza}}</td>
                        <td>{{$ultimo->created_at}}</td>
                    </tr>
                @endforeach    
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>    

@endsection





