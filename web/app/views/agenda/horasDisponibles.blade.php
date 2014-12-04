
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tomar Hora</title>
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::script('js/jquery-1.10.2.js') }}
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                  <table class="table table-striped">  
                    <thead>
                        <tr>
                            <th>Hora</th>
                            <th></th>
                        </tr>
                    </thead>  
                    @foreach($array as $datos)
                     <tr>
                         <td>{{$inicio}}</td>
                         @if($datos == 1)
                         <?php 
                          $hora = explode(":",$inicio);
                          $hh = $hora[0];        
                          $mm = $hora[1];
                          $ss = $hora[2];
                         ?>
                         <td><a href="reserva={{$hh}}={{$mm}}={{$ss}}">Tomar Hora</a></td>
                         @else
                         <td>Hora no disponible</td>
                         @endif
                     </tr>
                     <?php $inicio = date('H:s:i', strtotime($inicio.' + 1 hours')); ?>
                    @endforeach
                  </table> 
                </div>
            </div>
        </div>
        {{ HTML::script('js/bootstrap.min.js') }}
    </body>          

</html>

