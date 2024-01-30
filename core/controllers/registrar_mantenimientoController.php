<?php
$operacion=isset($_REQUEST['operacion'])?$_REQUEST['operacion']:'default';
switch($operacion){
    case 'registrar':
    if(!empty($_REQUEST['horometro']) && !empty($_REQUEST['descripcion']) && !empty($_REQUEST['precio']) && !empty($_REQUEST['fecha'])){
    $horometro=$_REQUEST['horometro'];
    $descripcion=$_REQUEST['descripcion'];
    $precio=$_REQUEST['precio'];
    $fecha=$_REQUEST['fecha'];
    
    $mantenimiento=new Mantenimiento;
    $mantenimiento->registrarMantenimiento($horometro,$descripcion,$precio,$fecha);
    unset($horometro,$descripcion,$precio,$fecha);
    unset($mantenimiento);
    }    
    break;
    default:
    include (HTML_DIR.'/index/registrar_Mantenimiento.php');
    break;
}
