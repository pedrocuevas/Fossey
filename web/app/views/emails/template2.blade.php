 <!DOCTYPE html>
 <html lang="es">
   <head>
      <meta charset="utf-8">
   </head>
   <body>
      <img src="<?php echo $message->embed('img/correo.jpg'); ?>">
      <h1>{{$servicio}}</h1>
      <h2>Fecha : {{$fecha}}</h2>
      <h2>Hora : {{$horas}}</h2>
      <h2>Profesional : {{$nombre}}</h2>
  </body>
  </html>