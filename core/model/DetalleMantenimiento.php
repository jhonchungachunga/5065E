<?php 
interface iDetalleMantenimiento{
    public function agregarDetalleMantenimiento(int $id_mantenimiento,int $id_producto_mantenimiento);
    public function verDetalleMantenimiento(int $id);
    public function eliminarDetalleMantenimiento(int $id, int $id_mantenimiento);
}
class DetalleMantenimiento implements iDetalleMantenimiento{
    protected $id,$id_mantenimiento,$id_producto_mantenimiento;

    public function agregarDetalleMantenimiento(int $id_mantenimiento, int $id_producto_mantenimiento){
    $conexion=new Conexion;
    $this->id_mantenimiento=$conexion->real_escape_string($id_mantenimiento);
    $this->id_producto_mantenimiento=$conexion->real_escape_string($id_producto_mantenimiento);
    
    $consulta="INSERT INTO detalle_mantenimiento (id, id_mantenimiento, id_producto_mantenimiento) VALUES (NULL, '$this->id_mantenimiento', '$this->id_producto_mantenimiento');";
    if($query=$conexion->query($consulta)){
        header('Location:?accion=ficha_mantenimiento&id='.$this->id_mantenimiento.'');
    }else {
        echo 'no se agrego el registro';
    }
    $conexion->close();
    }

    public function verDetalleMantenimiento(int $id_mantenimiento){
    $conexion=new Conexion;
    $this->id_mantenimiento=$conexion->real_escape_string($id_mantenimiento);
    $consulta="SELECT D.id, D.id_mantenimiento, D.id_producto_mantenimiento, P.suministro, P.articulo FROM detalle_mantenimiento D LEFT JOIN productos_mantenimiento P ON D.id_producto_mantenimiento = P.idproductos_mantenimiento WHERE D.id_mantenimiento='$this->id_mantenimiento';";    
    if($query=$conexion->query($consulta)){
        if(($query->num_rows)>0){
            while($row=$query->fetch_array(MYSQLI_ASSOC)){
                $array[]=[
                    'id'=>$row['id'],
                    'id_mantenimiento'=>$this->id_mantenimiento=$row['id_mantenimiento'],
                    'id_producto_mantenimiento'=>$this->id_producto_mantenimiento=$row['id_producto_mantenimiento'],
                    'suministro'=>$row['suministro'],
                    'articulo'=>$row['articulo']
                ];
            }return $array;
        }
        $query->free();
    }
    $conexion->close();
    }

    public function eliminarDetalleMantenimiento(int $id,int $id_mantenimiento){
    $conexion=new Conexion;
    $this->id=$conexion->real_escape_string($id);
    $this->id_mantenimiento=$conexion->real_escape_string($id_mantenimiento);
    $consulta="DELETE FROM detalle_mantenimiento WHERE detalle_mantenimiento.id = '$this->id'";
    if($query=$conexion->query($consulta)){
        header('Location:?accion=ficha_mantenimiento&id='.$this->id_mantenimiento.'');
    }else {
        echo 'no se elimino el registro';
    }
    $conexion->close();
    }

}