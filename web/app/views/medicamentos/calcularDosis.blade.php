@extends('layout')

@section('titulo')
<?php if(Session::get('iddosis') == 1)
       echo "Cálculo de dosis para caninos";
      else
       echo "Cálculo de dosis para felinos";
?>      
@endsection

@section('contenido')

<?php $c_min = isset($calculo_min) ? $calculo_min : '0' ;
      $c_max = isset($calculo_max) ? $calculo_max : '0' ;
      $c_prom = isset($calculo_prom) ? $calculo_prom : '0' ;
      $frc = isset($frecuencia) ? $frecuencia : '0' ;
?>

<script>
$(document).ready(function(){
                                
        var consulta;
                                                                          
         //hacemos focus al campo de búsqueda
        $("#busqueda").focus();
                                                                                                    
        //comprobamos si se pulsa una tecla
        $("#busqueda").keyup(function(e){
                                     
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#busqueda").val();                                                           
              //hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "{{ URL::route('ajax') }}",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<p align='center'><img src='{{ asset('img/ajax-loader.gif') }}' /></p>");
                    },
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){                                                    
                          $("#resultado").empty();
                          $("#resultado").append(data);
                                                             
                    }
              });
                                                                                  
                                                                           
        });
                                                                   
});

function cambiaValor(a){
 var x = $(a).html();
 document.getElementById('busqueda').value = x;
 $('#resultado').hide();
}

function limpiarValor(){
 $('#resultado').show();
}

</script>


<style>
    #result{
        padding: 8px;
    }
    #result:hover { background-color:#428BCA ;
                    cursor:pointer ;
                    color: white;
    }    
</style>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> Calculo de Dosis
        <div class="pull-right">
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-4">
                {{ Form::open(array('route' => 'calculoDosis')) }}
                <div class="form-group">
                   {{Form::label('busqueda', 'Nombre Genérico:')}}
                   {{Form::text('busqueda',null,array('class' => 'form-control', 'id' => 'busqueda', 'onBlur' => 'limpiarValor()', 'onFocus' => 'limpiarValor()', 'autocomplete' => 'off'))}}
                    <div id="resultado"  class="panel panel-info"></div>
                </div>
               
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {{Form::label('peso', 'Peso:')}}
                    {{Form::text('peso',null,array('class' => 'form-control', 'maxlength' => '3','required' => 'required'))}}
                    <p class="help-block">Peso de la mascota en Kg.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-primary" id="calculo" style="<?php if(($c_min==0) && ($c_prom==0) && ($c_max==0) && ($frc==0)) { echo 'display:none';}else{ echo '';}?>">
                    <div class="panel-heading">
                        Resultado
                    </div>
                    <div class="panel-body">
                        <p>{{"La dosis mínima es : ".$c_min." mg."}}</p>
                        <p>{{"La dosis promedio es : ".$c_prom." mg."}}</p>
                        <p>{{"La dosis máxima es : ".$c_max." mg."}}</p>
                        <p>{{"La frecuencia es : ".$frc." por día"}}</p>
                    </div>
                </div>
            </div>
            </div>
        </div>                            
    <div class="panel panel-default">
    <div class="panel-body">
        <div class="col-lg-12">         
            <p><button type="Submit" id="calcular" class="btn btn-primary btn-lg">Calcular</button></p>
        </div> 
    </div>        
    </div>
    {{ Form::close(); }}

   
    
    @endsection