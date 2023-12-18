<?php
interface iEstadistica{
public function totalHoras();
public function totalMinutos();
public function totalHorasMinutosImplemento(string $implemento);
public function totalCantidad();
}
class Estadistica implements iEstadistica{
public function totalHoras(){
$conexion=new mysqli('65.108.108.218','fundodon_fundodon','Yykyi9fs.71758992','fundodon_5065E');
$consulta="SELECT SUM(nro_horas) as horas from orden_trabajo;";
if($resultado=$conexion->query($consulta)){
    $row=$resultado->fetch_assoc();
    return $row['horas'];
}else {
    echo 'no se pudo realizar la consulta';
}
$conexion->close();
}



public function totalMinutos(){
    $conexion=new mysqli('65.108.108.218','fundodon_fundodon','Yykyi9fs.71758992','fundodon_5065E');
    $consulta="SELECT SUM(minutos) as minutos from orden_trabajo;";
    if($resultado=$conexion->query($consulta)){
        $row=$resultado->fetch_assoc();
        return $row['minutos'];
    }else {
        echo 'no se pudo realizar la consulta';
    }
    $conexion->close();
}
public function totalHorasMinutosImplemento($implemento){
    $conexion=new mysqli('65.108.108.218','fundodon_fundodon','Yykyi9fs.71758992','fundodon_5065E');
    $consulta="SELECT SUM(nro_horas) as horas, SUM(minutos) as minutos  from orden_trabajo WHERE id_implemento='$implemento';";
    if($resultado=$conexion->query($consulta)){
        $row=$resultado->fetch_assoc();
        $horas=$row['horas'];
        $minutos=$row['minutos']/60;
        return $horas+$minutos;
    }else {
        echo 'no se pudo realizar la consulta';
    }
    $conexion->close();
}
public function totalCantidad(){
    $conexion=new mysqli('65.108.108.218','fundodon_fundodon','Yykyi9fs.71758992','fundodon_5065E');
    $consulta="SELECT SUM(precio_total) as total from orden_trabajo;";
    if($resultado=$conexion->query($consulta)){
        $row=$resultado->fetch_assoc();
        return $row['total'];
    }else {
        echo 'no se pudo realizar la consulta';
    }
    $conexion->close();
    }
}


$estadisticas=new Estadistica;
$horas=$estadisticas->totalHoras();
$minutos=$estadisticas->totalMinutos();
$minutosA_Horas=$minutos/60;
$cantidad=$estadisticas->totalCantidad();





$para  = 'chunga.chunga.jhon.anthony@gmail.com' . ', '; // atención a la coma
$para .= 'caminanteespacial@hotmail.es';
$titulo    = '5065E - HORAS TRABAJADAS '.round($horas+$minutosA_Horas,1).' - S/. '.$cantidad;
$mensaje   = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="margin:auto; width:90%; font-family:sans-serif;">
<h1>Total horas</h1>
<ul style="width:90%; margin:auto; background-color:#f8f9fb; border: 1px solid #eaebeb; border-radius:10px;">
  <li style="display:block;  padding:10px;">Horas '.round($horas+$minutosA_Horas,1).'</li>
  <li style="display:block;  padding:10px;"><img src="https://www.5065e.fundodonbotas.com/views/app/images/iconos/rastra.png" style="width:50px;"/>Rastra '.round($totalHorasMinutosImplemento=$estadisticas->totalHorasMinutosImplemento(4),1).'</li>
  <li style="display:block;  padding:10px;"><img src="https://www.5065e.fundodonbotas.com/views/app/images/iconos/arado.png" style="width:50px;"/>Arado '.round($totalHorasMinutosImplemento=$estadisticas->totalHorasMinutosImplemento(1),1).'</li>
  <li style="display:block;  padding:10px;"><img src="https://www.5065e.fundodonbotas.com/views/app/images/iconos/surcadora.png" style="width:50px;"/>Surcadora '.round($totalHorasMinutosImplemento=$estadisticas->totalHorasMinutosImplemento(3),1).'</li>
  <li style="display:block;  padding:10px;">Total S/. '.$cantidad.'</li>
</ul>
</div>
</body>
</html>';
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras.= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$cabeceras.= 'From: jhonchunga@fundodonbotas.com ' . "\r\n" .
  'Reply-To: jhonchunga@fundodonbotas.com ' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);



?>
