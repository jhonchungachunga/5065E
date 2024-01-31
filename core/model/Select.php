<?php 
interface iSelect{
public function listaOperador();
public function listaImplemento();
public function listaEstado();
public function listarProductosMantenimiento();
}
class Select implements iSelect{

public function listaOperador(){
    $conexion=new Conexion;
    $consulta="SELECT * FROM operador";
    if($query=$conexion->query($consulta)){
        if(($query->num_rows)>0){
            while($row=$query->fetch_array(MYSQLI_ASSOC)){
                $array[]=[
                    'id'=>$row['id'],
                    'nombre'=>$row['nombre']
                ];
            }
            return $array;
        }
      $query->free();  
    }
    $conexion->close();
}


public function listaImplemento(){
    $conexion=new Conexion;
    $consulta="SELECT * FROM implemento";
    if($query=$conexion->query($consulta)){
        if(($query->num_rows)>0){
            while($row=$query->fetch_array(MYSQLI_ASSOC)){
                $array[]=[
                    'id'=>$row['id'],
                    'descripcion'=>$row['descripcion']
                ];
            }
            return $array;
        }
        $query->free();
    }
    $conexion->close();
}


public function listaEstado(){
    $conexion=new Conexion;
    $consulta="SELECT * FROM estado";
    if($query=$conexion->query($consulta)){
        if(($query->num_rows)>0){
            while($row=$query->fetch_array(MYSQLI_ASSOC)){
                $array[]=[
                    'id'=>$row['id'],
                    'descripcion'=>$row['descripcion']
                ];
            }
            return $array;
        }
        $query->free();
    }
}


public function listarProductosMantenimiento(){
$conexion=new Conexion;    
$consulta="SELECT * from productos_mantenimiento";
if($query=$conexion->query($consulta)){
    if(($query->num_rows)>0){
        while($row=$query->fetch_array(MYSQLI_ASSOC)){
            $array[]=[
                'idproductos_mantenimiento'=>$row['idproductos_mantenimiento'],
                'suministro'=>$row['suministro'],
                'articulo'=>$row['articulo']
            ];
        }return $array;
    }
    $query->free();
}
$conexion->close();
}


}