 <!DOCTYPE html>
 <html lang="es">
   <head>
      <meta charset="utf-8">
   </head>
   <body>
      <img src="<?php echo $message->embed('img/correo.jpg'); ?>">
      <h1>{{Session::get('nombremascota')}}</h1>
      <h2>La fecha de tu próximo control es el : {{$fecha}}</h2>
  </body>