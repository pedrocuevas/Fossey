                
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

@endsection




                 
