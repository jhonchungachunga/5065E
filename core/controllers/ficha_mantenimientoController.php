<?php 
$operacion=isset($_REQUEST['operacion'])?$_REQUEST['operacion']:'default';
switch($operacion){
    case 'crear':
        $id_mantenimiento=$_REQUEST['id_mantenimiento'];
        $idproductos_mantenimiento=$_REQUEST['idproductos_mantenimiento'];

        $detalleMantenimiento= new DetalleMantenimiento;
        $detalleMantenimiento->agregarDetalleMantenimiento($id_mantenimiento,$idproductos_mantenimiento);
        unset($id_mantenimiento,$idproductos_mantenimiento,$detalleMantenimiento);
        break;
    case 'eliminar':
        $id_mantenimiento=$_REQUEST['id_mantenimiento'];
        $id=$_REQUEST['id'];

        $detalleMantenimiento= new DetalleMantenimiento;
        $detalleMantenimiento->eliminarDetalleMantenimiento($id,$id_mantenimiento);
        break;
    default:
        include (HTML_DIR.'/index/ficha_mantenimiento.php');
        break;
}
