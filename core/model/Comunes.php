<?php 
interface iComunes{
public static function fecha($fecha);
}
class Comunes implements iComunes{
    public static function fecha($fecha)
    {
            $mes=substr($fecha,5,2);
            $dia= substr($fecha,8,2);
            $anho= substr($fecha,0,4);
            
            $meses_Esp=array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
            $s=array(1,2,3,4,5,6,7,8,9,10,11,12);
            /* para obtener el mes */
            for($i=0;$i<12;$i++){
                if($mes==$s[$i]){
                    $cadena=$dia.' '.$meses_Esp[$i].' '.$anho;
                    return $cadena;
                }
            }
            
    }
}