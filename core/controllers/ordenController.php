<?php 
$operacion=isset($_REQUEST['operacion'])?$_REQUEST['operacion']:'';
switch($operacion){
    case 'crear':
        if(!empty($_REQUEST['descripcion']) && strlen($_REQUEST['nro_horas'])>0 && strlen($_REQUEST['nro_minutos'] )>0 && !empty($_REQUEST['precio_hora']) && !empty($_REQUEST['precio_total']) && !empty($_REQUEST['fecha']) && !empty($_REQUEST['operador']) && !empty($_REQUEST['implemento']) && !empty($_REQUEST['estado']) && !empty($_REQUEST['by'])){
            $descripcion=$_REQUEST['descripcion'];
            $nHoras=$_REQUEST['nro_horas'];
            $nMinutos=$_REQUEST['nro_minutos'];
            $precioHora=$_REQUEST['precio_hora'];
            $precioTotal=$_REQUEST['precio_total'];
            $fecha=$_REQUEST['fecha'];
            $operador=$_REQUEST['operador'];
            $implemento=$_REQUEST['implemento'];
            $estado=$_REQUEST['estado'];
            $by=$_REQUEST['by'];

            $orden=new Orden;
            $orden->crearOrden($descripcion,$nHoras,$nMinutos,$precioHora,$precioTotal,$fecha,$operador,$implemento,$estado,$by);
            unset($descripcion,$nHoras,$nMinutos,$precioHora,$precioTotal,$fecha,$operador,$implemento,$estado,$by);
            unset($orden);
        }else {
            echo '<div class="alert alert-danger mx-3 my-1" role="alert">
                   no envies campos vacios!
                </div>';
            include (HTML_DIR.'/index/orden.php');    
        }
        
        break;
    default:
        include (HTML_DIR.'/index/orden.php');
        break;
}
