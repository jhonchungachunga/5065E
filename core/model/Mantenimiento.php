<?php
interface iMantenimiento{
    public function registrarMantenimiento(string $horometro,string $descripcion,int $precio, string $fecha);
    public function leerRegistrosMantenimiento();
    public function editarOrdenMantenimiento(int $id,int $horometro,string $descripcion,int $precio, string $fecha);
    public function eliminarOrdenMantenimiento(int $id);

    public function totalGastosMantenimiento($anho);
    public function fichaMantenimiento(int $id);
}
class Mantenimiento implements iMantenimiento{
protected $id,$horometro,$descripcion,$precio,$fecha;
protected $anho;

public function registrarMantenimiento(string $horometro,string $descripcion, int $precio, string $fecha){
$conexion=new Conexion;
$this->horometro=$conexion->real_escape_string($horometro);
$this->descripcion=$conexion->real_escape_string($descripcion);
$this->precio=$conexion->real_escape_string($precio);
$this->fecha=$conexion->real_escape_string($fecha);
$consulta="INSERT INTO mantenimiento (idmantenimiento,horometro,descripcion,precio,fecha) VALUES (NULL, '$this->horometro', '$this->descripcion', '$this->precio', '$this->fecha');";

if($query=$conexion->query($consulta)){
    header("Location:index.php?accion=mantenimientos");
}else {
    echo 'no se realizo la consulta';
}
$conexion->close();
}

public function leerRegistrosMantenimiento(){
$conexion=new Conexion;
$consulta="SELECT * FROM mantenimiento order by idmantenimiento desc";
if($query=$conexion->query($consulta)){
    if(($query->num_rows)>0){
        while($row=$query->fetch_array(MYSQLI_ASSOC)){
            $array[]=[
            'idmantenimiento'=>$this->id=$row['idmantenimiento'],
            'horometro'=>$this->horometro=$row['horometro'],
            'descripcion'=>$this->descripcion=$row['descripcion'],
            'precio'=>$this->precio=$row['precio'],
            'fecha'=>$this->fecha=$row['fecha']
            ];
        }
        return $array;
        
    } $query->free();
}
$conexion->close();
}

public function editarOrdenMantenimiento(int $id, int $horometro, string $descripcion, int $precio, string $fecha){
$conexion=new Conexion;
$this->id=$conexion->real_escape_string($id);
$this->horometro=$conexion->real_escape_string($horometro);
$this->descripcion=$conexion->real_escape_string($descripcion);
$this->precio=$conexion->real_escape_string($precio);
$this->fecha=$conexion->real_escape_string($fecha);

$consulta="UPDATE mantenimiento SET horometro = '$this->horometro', descripcion = '$this->descripcion', precio = '$this->precio', fecha = '$this->fecha' WHERE mantenimiento.idmantenimiento = '$this->id';";
if($query=$conexion->query($consulta)){
    header("Location:index.php?accion=mantenimientos");
}else {
    echo 'no se actualizo el registro';
}
$conexion->close();
}

public function eliminarOrdenMantenimiento(int $id){
$conexion=new Conexion;
$this->id=$conexion->real_escape_string($id);
$consulta="DELETE FROM mantenimiento WHERE mantenimiento.idmantenimiento = '$this->id'";
if($query=$conexion->query($consulta)){
    header("Location:index.php?accion=mantenimientos");
}else {
    echo 'no se elimino el registro';
}
$conexion->close();
}

public function totalGastosMantenimiento($anho){
$conexion=new Conexion;
$this->anho=$conexion->real_escape_string($anho);
$consulta="SELECT SUM(precio) as total from mantenimiento WHERE  fecha like '%$this->anho%';";
if($query=$conexion->query($consulta)){
    $row=$query->fetch_array(MYSQLI_ASSOC);
    return $row['total'];
}else {
    echo 'no se realizo la consulta';
}
$conexion->close();
}

public function fichaMantenimiento(int $id){
    $conexion=new Conexion;
    $this->id=$conexion->real_escape_string($id);
    $consulta="SELECT * FROM mantenimiento where idmantenimiento='$this->id';";

    if($query=$conexion->query($consulta)){
        if(($query->num_rows)>0){
            while($row=$query->fetch_array(MYSQLI_ASSOC)){
                $array[]=[
                    'idmantenimiento'=>$this->id=$row['idmantenimiento'],
                    'horometro'=>$this->horometro=$row['horometro'],
                    'descripcion'=>$this->descripcion=$row['descripcion'],
                    'precio'=>$this->precio=$row['precio'],
                    'fecha'=>$this->fecha=$row['fecha']
                ];
            } return $array;
        }$query->free();
        

    }
    $conexion->close();
}
}