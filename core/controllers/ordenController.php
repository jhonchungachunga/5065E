<style>
  b{
    width: 90%;
  }
</style>
<?php 
$operacion=isset($_REQUEST['operacion'])?$_REQUEST['operacion']:'';
switch($operacion){
    case 'crear':
        if(!empty($_REQUEST['descripcion']) && strlen($_REQUEST['nro_horas'])>0 && strlen($_REQUEST['nro_minutos'] )>0 && !empty($_REQUEST['precio_hora']) && !empty($_REQUEST['precio_total']) && !empty($_REQUEST['fecha']) && !empty($_REQUEST['operador']) && !empty($_REQUEST['implemento']) && !empty($_REQUEST['estado']) && !empty($_REQUEST['by'])){
            $descripcion=$_REQUEST['descripcion'];
            $nHoras=$_REQUEST['nro_horas'];
            $nMinutos=$_REQUEST['nro_minutos'];
            $precioHora=$_REQUEST['precio_hora'];
            $precioTotal=$_REQUEST['precio_total'];
            $fecha=$_REQUEST['fecha'];
            $operador=$_REQUEST['operador'];
            $implemento=$_REQUEST['implemento'];
            $estado=$_REQUEST['estado'];
            $by=$_REQUEST['by'];





            /*consultamos parametro para el correo*/

            $cron=new TrabajosCron;
            $datos=$cron->nuevaOrden($operador,$implemento,$estado);

            if($datos['implemento']=='Arado'){
                $imagen= 'arado.png';
              }else if($datos['implemento']=='Surcadora'){
                $imagen= 'surcadora.png';          
              }else if($datos['implemento']=='Rastra'){
                $imagen= 'rastra.png';
              }else {
                $imagen= 'tractor.png';
              }


              $para  = 'chunga.chunga.jhon.anthony@gmail.com' . ', '; // atención a la coma
              $para .= 'caminanteespacial@hotmail.es';
            $titulo    = '5065E - TRABAJO '.$datos['estado'].' - S/.'.$precioTotal. ' '.strtoupper($datos['implemento']);
            $mensaje   = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
                <title>Registro</title>
            </head>
            <body style="background-color:white; width:90%; margin:auto;">
                
            <div style="border:solid 1px #ebeceb; padding:15px; border-radius:50px 30px 20px 40px; width: 90%; background-color:#f8f9fb;">
  <img src="https://www.5065e.fundodonbotas.com/views/app/images/iconos/'.$imagen.'" style="width:150px;" class="card-img-top" alt="imagen">
  <div class="card-body">
    <h2 class="card-title">fecha :'.Comunes::fecha($fecha).'</h2>
    <h2 class="card-title">descripcion : '.$descripcion.'</h2>
    <h2 class="card-title">estado : '.$datos['estado'].'</h2>
    <h2 class="card-title">implemento : '.$datos['implemento'].'</h2>
    <h2 class="card-title">total S/. : '.$precioTotal.'</h2>
    <h2 class="card-title">horas : '.$nHoras.', minutos : '.$nMinutos.'</h2>
    <h2 class="card-title">operador : '.$datos['operador'].'</h2>
  </div>
</div>
<br>
<div style="border:solid 1px #ebeceb; padding:15px; width: 90%; background-color:#f8f9fb;">
<h2><a href="https://www.5065e.fundodonbotas.com/index.php?accion=lista_horas" style="color:black">mas informacion detallada aqui...</a></h2>

</div>
           </body>
            </html>';
            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras.= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $cabeceras.= 'From: jhonchunga@fundodonbotas.com ' . "\r\n" .
                'Reply-To: jhonchunga@fundodonbotas.com ' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($para, $titulo, $mensaje, $cabeceras);

            $orden=new Orden;
            $orden->crearOrden($descripcion,$nHoras,$nMinutos,$precioHora,$precioTotal,$fecha,$operador,$implemento,$estado,$by);
            unset($descripcion,$nHoras,$nMinutos,$precioHora,$precioTotal,$fecha,$operador,$implemento,$estado,$by);
            unset($orden);
        }else {
            echo '<div class="alert alert-danger mx-3 my-1" role="alert">
                   no envies campos vacios!
                </div>';
            include (HTML_DIR.'/index/orden.php');    
        }
        
        break;
    default:
        include (HTML_DIR.'/index/orden.php');
        break;
}
