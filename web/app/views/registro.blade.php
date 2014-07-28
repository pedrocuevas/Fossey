@extends('layout')

@section('titulo')
Ingresar Nuevo Registro
@endsection

@section('contenido')


<div class="panel panel-default">
                <div class="panel-heading">
                      <i class="fa fa-user fa-fw"></i> Datos del Propietario
                        <div class="pull-right">
                        </div>
                 </div>
                        <!-- /.panel-heading -->
        <div class="panel-body">
             <div class="row">
                               
                                <!-- /.col-lg-4 (nested) -->
                <div class="col-lg-4">
				              <form role="form">
                                       <div class="form-group">
                                            <label>RUT:</label>
                                            <input class="form-control" placeholder="12345678" pattern="[0-9]{8}" maxlength="8" required>
											                      <p class="help-block">Ingrese el rut sin dígito verificador</p>
                                        </div>
                                         
                                    	<div class="form-group">
                                            <label>Comuna:</label>
                                            <select class="form-control">
                                                <option>Maipú</option>
                                                
                                            </select>
                                             <p class="help-block">Seleccione una comuna de la lista.</p>
                                        </div>
			                                <div class="form-group">
                                            <label>Correo:</label>
                                            <input class="form-control" type="email" placeholder="email@dominio.com" required>
					                                  <p class="help-block">Ingrese la dirección de correo electrónico.</p>					
                                        </div>
                </div>
								
				        <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombres:</label>
                                            <input class="form-control" placeholder="Ingrese nombres aquí" required>
											                      <p class="help-block">Ej: Juan Pablo</p>
                                         </div>
								
					
					                             <div class="form-group">
                                           <label>Dirección:</label>
                                            <input class="form-control" placeholder="Ingrese aquí la dirección">
											                     <p class="help-block">Ej: Av Pajaritos #6090</p>
										
                                        </div>
					                             <div class="form-group">
                                            <label>Fono de contacto:</label>
                                            <input class="form-control" placeholder="Ingrese teléfono de contacto"  maxlength="8">
                                            <p class="help-block">Ingrese el teléfono sin código de área.</p>
											
                                        </div>
								
								</div>
				  
                                
               <div class="col-lg-4">
                                 
                                    <div class="form-group">
                                            <label>Apellidos:</label>
                                            <input class="form-control" placeholder="Ingrese el nombre aquí">
											                      <p class="help-block">Ej: Pérez Cotapos</p>
                                    </div>
                                    
                                

                                <!-- /.col-lg-8 (nested) -->
                            
                            <!-- /.row -->
             </div>
        
</div>
</div>        <!-- /.panel-body -->

                    <!-- /.panel -->
                    
<div class="panel panel-default">
                  <div class="panel-heading">
                        <i class="fa fa-star fa-fw"></i> Datos de la Mascota
                  </div>
                        <!-- /.panel-heading -->
                  <div class="panel-body">
                      <div class="col-lg-4">
                              <div class="form-group">
                                         <label>Nombre:</label>
                                         <input class="form-control" placeholder="Ingrese el nombre aquí">
											                   <p class="help-block">Ingrese el nombre de la mascota.</p>
                              </div>
					
				                <div class="form-group">
                                         <label>Sexo:</label>
                                         <label class="radio-inline">
                                          <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>Masculino
                                         </label>
                                         <label class="radio-inline">
                                           <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">Femenino
                                         </label>
                                    
                       </div>	
										
										
										
									</div>
                 

								
				              <div class="col-lg-4">
                                    
                                    <div class="form-group">
                                            <label>Especie:</label>
                                            <select class="form-control">
                                                <option>Perro</option>
                                                <option>Gato</option>
                                                <option>Conejo</option>
                                                <option>Hamster</option>
                                                <option>Otros</option>
                                            </select>
                                        </div>
								
							
				                  <div class="form-group">
                                            <label>Color:</label>
                                            <input class="form-control" type="color">
										
                                    </div>
				  			
								
				                  </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                            <label>Raza:</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                  <div class="form-group">
                                            <label>Fecha de Nacimiento:</label>
                                            <input class="form-control" type="date" placeholder="12345678">
											
                                  </div>
					
                             </div>
                        </div>
                        <!-- /.panel-body -->
						
                    </div>
<div class="panel-body">
        <div class="col-lg-12">         
					<p><button type="Submit" class="btn btn-primary btn-lg">Guardar Registro</button></p>
        </div> 
 </div>        
					</form>

         





@endsection

