@extends('layout')

@section('titulo')
Agregar Horario Peluqueria
@endsection

@section('cabecera')
{{ HTML::script('js/mascaraHora.js') }}
@endsection

@section('contenido')


@if(!empty(Session::get('message')))
@if(Session::get('message') == 'existe_horario')
<div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Lo Sentimos!</strong> Ya existe un horario para el profesional seleccionado
</div>
@elseif(Session::get('message') == 'no_profesional')
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Advertencia!</strong> Debe seleccionar un profesional
</div>
@elseif(Session::get('message') == 'hora_invalida')
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Advertencia!</strong> Debe seleccionar un horario válido
</div>
@endif
@endif


<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> Horario de Peluqueria
        <div class="pull-right">
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                {{ Form::open(array('route' => 'agregaHorario')) }}
                <div class="form-group">
                    {{Form::label('profesional', 'Profesional:')}}
                    {{ Form::select('profesional', $combobox, $selected, array('class' => 'form-control')) }}
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::checkbox('lunes', '1',true, array( 'onclick '=>'changeLunes(this)'))}}
                    {{Form::label('lunes', 'Lunes')}}                  
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horainicio_l', 'Hora de Inicio:')}}
                    {{Form::text('horainicio_l',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)' , 'placeholder' => 'hh:mm:ss', 'id' => 'horainicio_l'))}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horafin_l', 'Hora de Término:')}}
                    {{Form::text('horafin_l',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)',  'placeholder' => 'hh:mm:ss', 'id' => 'horafin_l'))}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::checkbox('martes', '1',true, array( 'onclick '=>'changeMartes(this)'))}}
                    {{Form::label('martes', 'Martes')}}                 
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horainicio_ma', 'Hora de Inicio:')}}
                    {{Form::text('horainicio_ma',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)' , 'placeholder' => 'hh:mm:ss', 'id' => 'horainicio_ma'))}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horafin_ma', 'Hora de Término:')}}
                    {{Form::text('horafin_ma',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)',  'placeholder' => 'hh:mm:ss', 'id' => 'horafin_ma'))}}
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::checkbox('miercoles', '1',true, array( 'onclick '=>'changeMiercoles(this)'))}}
                    {{Form::label('miercoles', 'Miércoles')}}                  
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horainicio_mi', 'Hora de Inicio:')}}
                    {{Form::text('horainicio_mi',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)' , 'placeholder' => 'hh:mm:ss', 'id' => 'horainicio_mi'))}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horafin_mi', 'Hora de Término:')}}
                    {{Form::text('horafin_mi',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)',  'placeholder' => 'hh:mm:ss', 'id' => 'horafin_mi'))}}
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::checkbox('jueves', '1',true, array( 'onclick '=>'changeJueves(this)'))}}
                    {{Form::label('jueves', 'Jueves')}}                
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horainicio_j', 'Hora de Inicio:')}}
                    {{Form::text('horainicio_j',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)' , 'placeholder' => 'hh:mm:ss', 'id' => 'horainicio_j'))}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horafin_j', 'Hora de Término:')}}
                    {{Form::text('horafin_j',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)',  'placeholder' => 'hh:mm:ss', 'id' => 'horafin_j'))}}
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::checkbox('viernes', '1',true, array( 'onclick '=>'changeViernes(this)'))}}
                    {{Form::label('viernes', 'Viernes')}}                 
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horainicio_v', 'Hora de Inicio:')}}
                    {{Form::text('horainicio_v',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)' , 'placeholder' => 'hh:mm:ss', 'id' => 'horainicio_v'))}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horafin_v', 'Hora de Término:')}}
                    {{Form::text('horafin_v',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)',  'placeholder' => 'hh:mm:ss', 'id' => 'horafin_v'))}}
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::checkbox('sabado', '1',true,array( 'onclick '=>'changeSabado(this)'))}}
                    {{Form::label('sabado', 'Sábado')}}                 
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horainicio_s', 'Hora de Inicio:')}}
                    {{Form::text('horainicio_s',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)' , 'placeholder' => 'hh:mm:ss', 'id' => 'horainicio_s'))}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horafin_s', 'Hora de Término:')}}
                    {{Form::text('horafin_s',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)',  'placeholder' => 'hh:mm:ss','id' => 'horafin_s'))}}
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::checkbox('domingo', '1',true, array( 'onclick '=>'changeDomingo(this)'))}}
                    {{Form::label('domingo', 'Domingo')}}                 
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horainicio_d', 'Hora de Inicio:')}}
                    {{Form::text('horainicio_d',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)' , 'placeholder' => 'hh:mm:ss', 'id' => 'horainicio_d'))}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{Form::label('horafin_d', 'Hora de Término:')}}
                    {{Form::text('horafin_d',null,array('class' => 'form-control', 'onkeyup' => "mascara(this,':',patron,true)", 
                                 'onblur' => 'CheckTime(this)',  'placeholder' => 'hh:mm:ss', 'id' => 'horafin_d'))}}
                </div>
            </div>
        </div>        
        <div class="panel panel-default">

            <div class="panel-body">
                <div class="col-lg-12">         
                    <p><button type="Submit" class="btn btn-primary btn-lg">Guardar</button></p>
                </div> 
            </div>        
    </div>
        
  <script>
 function changeLunes(obj){
     document.getElementById("horainicio_l").disabled = ! obj.checked;
     document.getElementById("horafin_l").disabled = ! obj.checked;
    }
    
 function changeMartes(obj){
     document.getElementById("horainicio_ma").disabled = ! obj.checked;
     document.getElementById("horafin_ma").disabled = ! obj.checked;
    } 
    
    
 function changeMiercoles(obj){
     document.getElementById("horainicio_mi").disabled = ! obj.checked;
     document.getElementById("horafin_mi").disabled = ! obj.checked;
    } 
    
    
  function changeJueves(obj){
     document.getElementById("horainicio_j").disabled = ! obj.checked;
     document.getElementById("horafin_j").disabled = ! obj.checked;
    } 
    
   function changeViernes(obj){
     document.getElementById("horainicio_v").disabled = ! obj.checked;
     document.getElementById("horafin_v").disabled = ! obj.checked;
    } 
    
    function changeSabado(obj){
     document.getElementById("horainicio_s").disabled = ! obj.checked;
     document.getElementById("horafin_s").disabled = ! obj.checked;
    }  
   
    function changeDomingo(obj){
     document.getElementById("horainicio_d").disabled = ! obj.checked;
     document.getElementById("horafin_d").disabled = ! obj.checked;
    } 
        
        
        
 </script>         
    {{ Form::close(); }}

   
    
    @endsection