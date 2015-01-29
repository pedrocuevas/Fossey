@extends('layout')

@section('titulo')
Editar/Eliminar Profesional
@endsection

@section('cabecera')
{{ HTML::script('js/jquery.Rut.js') }}
{{ HTML::script('js/rut.js') }}
@endsection

@section('contenido')

<script>

$(document).ready (function (){
    $('#delete').click (function () {
        
        if(confirm("¿Está seguro que desea eliminar el registro?")){
              document.location.href="{{URL::route('borrarProfesional')}}";
        }

    });
    
});

</script>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-file fa-fw"></i> Resultado de Búsqueda
        <div class="pull-right">
        </div>
    </div>
    <div class="table-responsive">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Rut</th>
                    <th></th>
                </tr>
            </thead>                        
            <tbody>    
                
                <tr>
                    <td>{{ $nombres.' '.$apellidos }}</td>
                    <td>{{ $rut}}</td>
                    <td>
                        <abbr title="Editar"><a href="editarProfesional"><button type="button" class="btn btn-success btn-circle btn-lg"><i class="fa fa-pencil"></i></button></a></abbr>
                        <abbr title="Eliminar"><button type="button" class="btn btn-danger btn-circle btn-lg" id="delete"><i class="fa fa-times"></i></button></abbr>
                    </td>
                </tr>
                 
                
            </tbody>

        </table>
       
    </div>
</div>

@endsection