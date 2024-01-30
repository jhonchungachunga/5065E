<?php
$operacion=isset($_REQUEST['operacion'])?$_REQUEST['operacion']:'default';
switch($operacion){
    case 'eliminar':
        $id=$_REQUEST['id'];
        $mantenimiento=new Mantenimiento;
        $mantenimiento->eliminarOrdenMantenimiento($id);
        unset($id,$mantenimiento);
        break;
    default:
    include (HTML_DIR.'/index/mantenimientos.php');
    break;    
}
