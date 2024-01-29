<?php 
$operacion=isset($_REQUEST['operacion'])?$_REQUEST['operacion']:'';
switch($operacion){
    case 'crear':
        if(!empty($_REQUEST['total_compra']) && !empty($_REQUEST['fecha'])){
           echo  $totalCompra=$_REQUEST['total_compra'];
            echo $fecha=$_REQUEST['fecha'];

            $combustible=new Combustible;
            $combustible->crearOrdenCombustible($totalCompra,$fecha);
            unset($totalCompra,$fecha,$combustible);
        }
        break;
    default:
        include (HTML_DIR.'/index/comprar_combustible.php');
        break;
}
