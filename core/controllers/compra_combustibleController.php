<?php 
$operacion=isset($_REQUEST['operacion'])?$_REQUEST['operacion']:'default';
switch($operacion){
    case 'eliminar':
        $id=$_REQUEST['id'];
        $combustible=new Combustible;
        $combustible->eliminarOrdenCombustible($id);
        unset($id,$combustible);
        break;
    default:
        include (HTML_DIR.'/index/listaCompraCombustible.php');
        break;
}
