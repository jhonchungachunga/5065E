<?php 
$operacion=isset($_REQUEST['operacion'])?$_REQUEST['operacion']:'';
switch($operacion){
    case 'eliminar':
        $id=$_REQUEST['id'];
        $datos=new Orden;
        $datos->eliminarOrden($id);
        unset($datos,$id);
        break;
    default:
        include (HTML_DIR.'/index/lista_horas.php');
        break;
}