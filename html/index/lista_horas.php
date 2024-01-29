<?php
$lista=new Orden;
$datos=$lista->leerOrden();

$estadisticas=new Estadistica;
$horas=$estadisticas->totalHoras();
$minutos=$estadisticas->totalMinutos();
$minutosA_Horas=$minutos/60;
$cantidad=$estadisticas->totalCantidad();
echo '<div class="contenedor"><div class="card m-1 col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8" >
<ul class="list-group list-group-flush">
  <li class="list-group-item">Horas ',round($horas+$minutosA_Horas,1),'</li>
  <li class="list-group-item">Rastra ',round($totalHorasMinutosImplemento=$estadisticas->totalHorasMinutosImplemento(4),1),'</li>
  <li class="list-group-item">Arado ',round($totalHorasMinutosImplemento=$estadisticas->totalHorasMinutosImplemento(1),1),'</li>
  <li class="list-group-item">Surcadora ',round($totalHorasMinutosImplemento=$estadisticas->totalHorasMinutosImplemento(3),1),'</li>
  <li class="list-group-item">Total S/. ',$cantidad,'</li>
</ul>
</div></div>';
echo '<h3>ordenes generadas</h3>';



echo '<div class="contenedor col-12">';

if($datos){
  
 
    foreach($datos as $item){
      $estilo=$item['descEstado']=='PENDIENTE'?'table-danger':'';
      echo '<div class="card contenido col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 m-1">';
      if($item['descImplemento']=='Arado'){
        echo '<img src="views/app/images/iconos/arado.png" class="card-img-top" style="width:50px;" alt="...">';
      }else if($item['descImplemento']=='Surcadora'){
        echo '<img src="views/app/images/iconos/surcadora.png" class="card-img-top" style="width:50px;" alt="...">';
      }else if($item['descImplemento']=='Rastra'){
        echo '<img src="views/app/images/iconos/rastra.png" class="card-img-top" style="width:50px;" alt="...">';
      }
      

      echo '<div class="card-body ">
      <h5 class="card-title">',Comunes::fecha($item['fecha']),' </h5>';
        echo $item['descEstado']=='PENDIENTE'?'<span class="badge text-bg-warning">'.$item['descEstado'].'</span><div class="spinner-grow text-warning" role="status">
         <span class="visually-hidden">Loading...</span>
      </div><br>':'<span class="badge text-bg-info">'.$item['descEstado'].'</span><br>';
        echo '<span class="fs-5 fw-bold card-text">',$item['descImplemento'],' </span> <span class="badge text-bg-success">S/. ',$item['precio_total'],'</span><br>
        <span class="card-text">',$item['descripcion'],'</span><br>
        <span class="card-text fw-bold">horas: ',$item['nro_horas'],', minutos: ',$item['minutos'],'</span><br>
      <span class="card-text">operador: ',$item['nombreOperador'],'.</span><br><br>


        
        <p class="card-text"><small>registrado por: ',$item['creadoPor'],'</small></p>
        <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
          ver
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">editar</a></li>
          <li><a class="dropdown-item" href="?accion=lista_horas&operacion=eliminar&id='.$item['id'].'">eliminar</a></li>
        </ul>
      </div>
      </div>
    </div>';
    
      }  
}else {
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hola!</strong> No se encontraron registros.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
echo '</div>';