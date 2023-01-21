<?php
interface iEstadistica{
public function totalHoras();
public function totalMinutos();
public function totalCantidad();
}
class Estadistica implements iEstadistica{
public function totalHoras(){
$conexion=new Conexion;
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
    $conexion=new Conexion;
    $consulta="SELECT SUM(minutos) as minutos from orden_trabajo;";
    if($resultado=$conexion->query($consulta)){
        $row=$resultado->fetch_assoc();
        return $row['minutos'];
    }else {
        echo 'no se pudo realizar la consulta';
    }
    $conexion->close();
}

public function totalCantidad(){
    $conexion=new Conexion;
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
