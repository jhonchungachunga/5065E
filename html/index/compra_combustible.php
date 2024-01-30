<?php

$combustible=new Combustible;
$datos=$combustible->leerOrdenCombustible();

$comunes=new Comunes;
echo '<h1 class="text-center">Compra de combustible</h1><br><br>';
if($datos){
    echo '<div class="contenedor col-12">';
    
    foreach($datos as $item){
       echo '<div class="card m-1 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" >
       <div class="card-body">
         <h5 class="card-title">',$item['idcombustible'],'</h5>
         <h6 class="card-subtitle mb-2 text-body-secondary">S/.',$item['totalcompra'],'</h6>
         <p class="card-text">',$comunes->fecha($item['fecha']),'</p>


         <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      opciones
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">editar</a></li>
      <li><a class="dropdown-item" href="?accion=compra_combustible&operacion=eliminar&id='.$item['idcombustible'].'"">eliminar compra</a></li>
    </ul>
  </div>
</div>  
       </div>
     </div>';

    }
    echo '</div>';
}

