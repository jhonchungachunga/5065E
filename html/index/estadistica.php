<?php 
$combustible=new Combustible;
$mantenimiento=new Mantenimiento;

$estOperador=new EstadisticaOperador;
$anho=isset($_POST['anho'])?$_POST['anho']:'';
echo '<div class="mb-3">';
?>
<br>
<form enctype="application/x-www-form-urlencoded" method="post" action="?accion=estadistica">
<select class="form-select mb-3" aria-label="Default select example" name="anho">
<option selected value="">Todos</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<?php 
echo '</select><button class="w-100 btn btn-md btn-secondary" type="submit">Filtrar resultados</button></form>';
$metaAnual=400;
$horasTrabajadas=$estOperador->totalHorasMinutosImplementoAnho('','',$anho);
$resultado=$horasTrabajadas/$metaAnual*100;
echo '<br><div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="',$resultado,'" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: ',round($resultado,1),'%">',round($resultado,1),'%</div>
</div>';
echo '<h1 class="fw-bold text-center">Estadisticas '.$anho.'</h1>';

$horas=$estOperador->totalHorasMinutosImplementoAnho('','',$anho);
$rastra=$estOperador->totalHorasMinutosImplementoAnho('','4',$anho);
$arado=$estOperador->totalHorasMinutosImplementoAnho('','1',$anho);
$surcadora=$estOperador->totalHorasMinutosImplementoAnho('','3',$anho);

$totalCantidad=$estOperador->totalCantidadOperadorAnho('',$anho);
$gastoCombustible=$combustible->totalGastoCombustible($anho);
$gastoMantenimiento=$mantenimiento->totalGastosMantenimiento($anho);

echo '<div class="contenedor"><div class="card m-1" style="width: 18rem;">
<ul class="list-group list-group-flush">
  <li class="list-group-item fw-bold text-center"><h3>'; if($anho==''){ echo '2022 - '.date('Y').'';}else {echo $anho;} echo '</h3></li>
  <li class="list-group-item">Horas '.round($horas,1).'</li>
  <li class="list-group-item">Rastra '.round($rastra,1).'</li>
  <li class="list-group-item">Arado '.round($arado,1).'</li>
  <li class="list-group-item">Surcadora '.round($surcadora,1).'</li>
  <li class="list-group-item">Total S/. '.round($totalCantidad,1).'</li>
  <li class="list-group-item">Gastos de combustible S/.',round($gastoCombustible,1),'</li>
  <li class="list-group-item">Gastos de mantenimiento S/.',$gastoMantenimiento,'</li>
  <li class="list-group-item">Utilidad S/.', $totalCantidad-$gastoCombustible-$gastoMantenimiento,'</li>
</ul>
</div>
</div>';




for($ope=1;$ope<=4;$ope++){
  
  $thorasOp=$estOperador->totalHorasMinutosImplementoAnho($ope,'',$anho);
  $thorasOpRastra=$estOperador->totalHorasMinutosImplementoAnho($ope,4,$anho);
  $thorasOpArado=$estOperador->totalHorasMinutosImplementoAnho($ope,1,$anho);
  $thorasOpSurcadora=$estOperador->totalHorasMinutosImplementoAnho($ope,3,$anho);
  
  $totCantOpAnho=$estOperador->totalCantidadOperadorAnho($ope,$anho);

  if($thorasOp>0){
      echo '<div class="contenedor"><div class="card m-1" style="width: 18rem;">
      <ul class="list-group list-group-flush">
      <li class="list-group-item fw-bold text-center">'; 
      if ($ope==1){ echo 'Alex Morales';} else if ($ope==2){ echo 'José Gonzales';} else if ($ope==3){ echo 'Jhon Chunga';} else if($ope==4){ echo 'Miguel Chunga';};
      echo '</li>
      <li class="list-group-item">Horas '.round($thorasOp,1).'</li>
      <li class="list-group-item">Rastra '.round($thorasOpRastra,1).'</li>
      <li class="list-group-item">Arado '.round($thorasOpArado,1).' </li>
      <li class="list-group-item">Surcadora '.round($thorasOpSurcadora,1).'</li>
      <li class="list-group-item">Total S/. '.$totCantOpAnho.'</li>
      </ul>
      </div></div>';
  }  

 
  }



echo '</div></div>';


