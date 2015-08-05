@extends('layout')

@section('titulo')
Ficha de {{Session::get('nombremascota')}}
@endsection

@section('cabecera')
@endsection

@section('contenido')

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> <strong>Detalle de Atención</strong>
        <div class="pull-right">
        </div>
    </div>
    <div class="panel-body">
        <div class="well"> 
            <div class="row">
                <div class="col-lg-6">          
                    <h3>Nombre: <strong>{{Session::get('nombremascota')}}</strong></h3>
                </div>
                <div class="col-lg-6">
                    <h3>Peso: <strong>{{$peso}} Kg.</strong></h3>     
                </div>
            </div>   
            <div class="row">
                <div class="col-lg-6">          
                    <h3>Fecha de Atención: <strong>{{$fecha_atencion}}</strong></h3>
                </div>
            </div>
        </div>
        <div class="well">  
            <div class="row">
                <div class="col-lg-6">
                    <h3>Detalles</h3>
                    <p>{{$descripcion}}</p>
                </div>
            </div>
        </div>    
    </div>
     <div class="panel-body">
        <div class="col-lg-12">         
            <p><button type="Submit" onclick="abrirVentana('{{'reportes'.$id}}')" class="btn btn-primary btn-lg">Ver en PDF</button></p>
        </div> 
    </div>
</div>

<script>
function abrirVentana(url) {
    window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=600, height=800");
}
</script>
@endsection