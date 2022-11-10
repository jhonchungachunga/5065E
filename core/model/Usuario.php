<?php
interface iUsuario{
public function iniciarSession($email,$contrasena); 
}

class Usuario implements iUsuario{
    public $id,$nombre,$apellidos,$email;
    private $contrasena;

    public function iniciarSession($email,$contrasena){
        $conexion=new Conexion;
        $this->nombre=$conexion->real_escape_string($email);
        $this->contrasena=$conexion->real_escape_string(Encrypt($contrasena));
        $consulta="select id,email,nombres from usuario where(nombres='$this->nombre' or email='$this->nombre') and contrasena='$this->contrasena' LIMIT 1;";
        if($query=$conexion->query($consulta)){
            if(($query->num_rows)>0){            
                if($row=$query->fetch_array(MYSQLI_ASSOC)){
                    $_SESSION['id']=$row['id'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['nombres']=$row['nombres'];
                    #retornamos succes para redirecionar la pagina
                  echo 1;
                    }
            }
         $query->free();   
         
        }
        $conexion->close();

    }
        
    }
