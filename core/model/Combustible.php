<?php
interface iCombustible{
    public function crearOrdenCombustible($totalCompra,$fecha);
    public function leerOrdenCombustible();
    public function actualizarOrdenCombustible(int $id,int $totalCompra,$fecha);
    public function eliminarOrdenCombustible($id);
    public function totalGastoCombustible($anho);
}
class Combustible implements iCombustible{

    protected $id,$totalCompra,$fecha,$anho;

    public function crearOrdenCombustible($totalCompra, $fecha){
    $conexion=new Conexion;
    $this->totalCompra=$conexion->real_escape_string($totalCompra);
    $this->fecha=$conexion->real_escape_string($fecha);
    $consulta="INSERT INTO combustible (idcombustible,totalcompra,fecha) VALUES (NULL, '$this->totalCompra', '$this->fecha');";
    if($query=$conexion->query($consulta)){
        header("Location:index.php?accion=compra_combustible");
    } else {
        echo 'no se ejecuto la consulta';
    }
    $conexion->close();
    }

    public function leerOrdenCombustible(){
        $conexion=new Conexion();
        $consulta="SELECT * FROM combustible order by idcombustible desc";
        if($query=$conexion->query($consulta)){
            if(($query->num_rows)>0){
                while($row=$query->fetch_array(MYSQLI_ASSOC)){
                    $array[]=[
                        'idcombustible'=>$this->id=$row['idcombustible'],
                        'totalcompra'=>$this->totalCompra=$row['totalcompra'],
                        'fecha'=>$this->fecha=$row['fecha']
                    ];
                } return $array;
            } $query->free();
        }
        $conexion->close();
        
    }

    public function actualizarOrdenCombustible(int $id, int $totalCompra, $fecha){
        $conexion=new Conexion;
        $this->id=$conexion->real_escape_string($id);
        $this->totalCompra=$conexion->real_escape_string($totalCompra);
        $this->fecha=$conexion->real_escape_string($fecha);

        $consulta="UPDATE combustible SET totalcompra = '$this->totalCompra', fecha = '$this->fecha' WHERE combustible.idcombustible = '$this->id';";
        if($query=$conexion->query($consulta)){
            header("Location:index.php?accion=compra_combustible");
        }else {
            echo 'no se edito el registro';
        }
        $conexion->close();
    }

    public function eliminarOrdenCombustible($id){
        $conexion=new Conexion;
        $this->id=$conexion->real_escape_string($id);

        $consulta="DELETE FROM combustible WHERE combustible.idcombustible = '$this->id';";
        if($query=$conexion->query($consulta)){
            header("Location:index.php?accion=compra_combustible");
        }else {
            echo 'no se elimino el registro';
        }
        $conexion->close();
    }




    public function totalGastoCombustible($anho){
        $conexion=new Conexion;
        $this->anho=$conexion->real_escape_string($anho);

        $consulta="SELECT SUM(totalcompra) as total from combustible WHERE  fecha like '%$anho%';";
        if($query=$conexion->query($consulta)){
            $row=$query->fetch_assoc();
            $total=$row['total'];
            return $total;
        }else{
            echo 'no se realizo la consulta';
        }
        $conexion->close();
    }

}