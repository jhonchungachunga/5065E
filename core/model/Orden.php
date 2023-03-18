<?php 
interface iOrden{
public function crearOrden(string $descripcion,$nHoras,$minutos,$precioHora,$precioTotal,$fecha,$idOperador,$idImplemento,$idEstado,$createdBy);
public function leerOrden();
public function actualizarOrden(int $id,$descripcion,$nHoras,$minutos,$precioHora,$precioTotal,$fecha,$idOperador,$idImplemento,$idEstado,$createdBy);
public function eliminarOrden(int $id);
}
class Orden implements iOrden{
    protected $id,$descripcion,$nHoras,$minutos,$precioHora,$precioTotal,$fecha,$idOperador,$idImplemento,$idEstado,$createdBy;

    public function crearOrden(string $descripcion,$nHoras,$minutos,$precioHora,$precioTotal,$fecha,$idOperador,$idImplemento,$idEstado,$createdBy){    
    $conexion= new Conexion;
    $this->descripcion=$conexion->real_escape_string($descripcion);
    $this->nHoras=$conexion->real_escape_string($nHoras);
    $this->minutos=$conexion->real_escape_string($minutos);
    $this->precioHora=$conexion->real_escape_string($precioHora);
    $this->precioTotal=$conexion->real_escape_string($precioTotal);
    $this->fecha=$conexion->real_escape_string($fecha);
    $this->idOperador=$conexion->real_escape_string($idOperador);
    $this->idImplemento=$conexion->real_escape_string($idImplemento);
    $this->idEstado=$conexion->real_escape_string($idEstado);
    $this->createdBy=$conexion->real_escape_string($createdBy);
    $consulta="insert into orden_trabajo (id, descripcion, nro_horas, minutos, precio_hora, precio_total, fecha, id_operador, id_implemento, id_estado, created_by) VALUES (NULL, '$this->descripcion', '$this->nHoras', '$this->minutos', '$this->precioHora','$this->precioTotal' , '$this->fecha', '$this->idOperador', '$this->idImplemento', '$this->idEstado', '$this->createdBy');";
    if($query=$conexion->query($consulta)){
        header("Location:index.php?accion=lista_horas");
    }else {
        echo 1;
    }
    $conexion->close();
    }
    public function leerOrden(){
    $conexion=new Conexion;
    $consulta="SELECT o.id,o.descripcion,o.nro_horas,o.minutos,o.precio_hora,o.precio_total,o.fecha,ope.nombre as nombreOperador,i.descripcion as descImplemento,e.descripcion as descEstado,u.email as creadoPor FROM orden_trabajo o left JOIN operador ope on ope.id=o.id_operador LEFT JOIN implemento i on i.id=o.id_implemento LEFT JOIN estado e on e.id=o.id_estado LEFT JOIN usuario u on u.id=o.created_by order by fecha desc;";
    if($query=$conexion->query($consulta)){
        if(($query->num_rows)>0){
            while($row=$query->fetch_array(MYSQLI_ASSOC)){
                $array[]=[
                    'id'=>$this->id=$row['id'],
                    'descripcion'=>$this->descripcion=$row['descripcion'],
                    'nro_horas'=>$this->nHoras=$row['nro_horas'],
                    'minutos'=>$this->minutos=$row['minutos'],
                    'precio_hora'=>$this->precioHora=$row['precio_hora'],
                    'precio_total'=>$this->precioTotal=$row['precio_total'],
                    'fecha'=>$this->fecha=$row['fecha'],
                    'nombreOperador'=>$row['nombreOperador'],
                    'descImplemento'=>$row['descImplemento'],
                    'descEstado'=>$row['descEstado'],
                    'creadoPor'=>$row['creadoPor']
                ];
            } return $array;
        } $query->free();
    }
    $conexion->close();
    }
    public function actualizarOrden(int $id,$descripcion,$nHoras,$minutos,$precioHora,$precioTotal,$fecha,$idOperador,$idImplemento,$idEstado,$createdBy){
    $conexion=new Conexion;
    $this->id=$conexion->real_escape_string($id);
    $this->descripcion=$conexion->real_escape_string($descripcion);
    $this->nHoras=$conexion->real_escape_string($nHoras);
    $this->minutos=$conexion->real_escape_string($minutos);
    $this->precioHora=$conexion->real_escape_string($precioHora);
    $this->precioTotal=$conexion->real_escape_string($precioTotal);
    $this->fecha=$conexion->real_escape_string($fecha);
    $this->idOperador=$conexion->real_escape_string($idOperador);
    $this->idImplemento=$conexion->real_escape_string($idImplemento);
    $this->idEstado=$conexion->real_escape_string($idEstado);
    $this->createdBy=$conexion->real_escape_string($createdBy);    
    $consulta="UPDATE orden_trabajo SET descripcion = '$this->descripcion', nro_horas = '$this->nHoras', `minutos` = '$this->minutos', precio_hora = '$this->precioHora',precio_total = '$this->precioTotal', fecha = '$this->fecha', id_operador = '$this->idOperador', id_implemento = '$this->idImplemento', id_estado = ' $this->idEstado', createdby = '$this->createdBy' WHERE orden_trabajo.id ='$this->id';";
    if($query=$conexion->query($consulta)){
        header("Location:index.php?accion=lista_horas");
    }else {
        echo 'no se pudo realizar la edicion';
    }
    $conexion->close();
    }
    public function eliminarOrden(int $id){
    $conexion=new Conexion;
    $this->id=$conexion->real_escape_string($id);
    $consulta="DELETE FROM orden_trabajo WHERE id = '$this->id';";
    if($query=$conexion->query($consulta)){
        header("Location:index.php?accion=lista_horas");
    }else {
        echo 'no se pudo eliminar';
    }
        
    }
}