<?php
interface iTrabajosCron{
    public function nuevaOrden($operador,$implemento,$estado);
}

class TrabajosCron implements iTrabajosCron{
    public function nuevaOrden($operador,$implemento,$estado)
    {
        $conexion=new Conexion;
        $this->$operador=$conexion->real_escape_string($operador);
        $this->$implemento=$conexion->real_escape_string($implemento);
        $this->$estado=$conexion->real_escape_string($estado);
        $consulta="SELECT e.descripcion as estado, i.descripcion as implemento , o.nombre as operador FROM estado e, implemento i, operador o WHERE e.id='$estado' AND i.id='$implemento' AND o.id='$operador';";
        if($query=$conexion->query($consulta)){
            if(($query->num_rows)>0){
                $row=$query->fetch_array(MYSQLI_ASSOC);
                    $array=[
                        'estado'=>$this->$estado=$row['estado'],
                        'implemento'=>$this->$implemento=$row['implemento'],
                        'operador'=>$this->$operador=$row['operador']
                    ];
                 return $array;
            } $query->free();
        }
        $conexion->close();
    }
}
?>