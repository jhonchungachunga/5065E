<?php 
interface iEstadisticaOperador{
public function totalHorasMinutosImplementoAnho( string $idOperador,string $implemento , string $anho);
public function totalCantidadOperadorAnho(string $idOperador, string $anho);
}
class EstadisticaOperador implements iEstadisticaOperador{
    protected $idOpe,$anho;
    public function totalHorasMinutosImplementoAnho(string $idOperador, string $implemento, string $anho){
    $conexion= new Conexion;
    $this->idOpe=$conexion->real_escape_string($idOperador);
    $this->anho=$conexion->real_escape_string($anho);
    
    $consulta="SELECT SUM(nro_horas) as horas, SUM(minutos) as minutos  from orden_trabajo WHERE id_operador like '%$idOperador%' and id_implemento like '%$implemento%' and fecha like '%$anho%';";
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

    public function totalCantidadOperadorAnho($idOperador,$anho){
        $conexion=new Conexion;
        $this->idOpe=$conexion->real_escape_string($idOperador);
        $this->anho=$conexion->real_escape_string($anho);
        $consulta="SELECT SUM(precio_total) as total from orden_trabajo WHERE id_operador like '%$idOperador%' and fecha like '%$anho%';";
        if($resultado=$conexion->query($consulta)){
            $row=$resultado->fetch_assoc();
            $total=$row['total'];
            return $total;
        }else {
            echo 'no se pudo realizar la consulta';
        }
        $conexion->close();
    }
}