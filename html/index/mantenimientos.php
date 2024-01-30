<?php
$mantenimiento=new Mantenimiento;
$datos=$mantenimiento->leerRegistrosMantenimiento();

$comunes=new Comunes;
echo '<h1>Mantenimientos</h1>';
echo '<div class="d-flex justify-content-center align-items-center align-content-center flex-wrap">';
if($datos){
    foreach($datos as $item){
        echo '<div class="card text-center m-2 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
        <div class="card-header">
          HOROMETRO ',$item['horometro'],'
        </div>
        <div class="card-body">
          <h5 class="card-title">S/. ',$item['precio'],'</h5>
          <p class="card-text">',$item['descripcion'],'</p>

          <div class="btn-group" role="group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      opciones
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">editar</a></li>
      <li><a class="dropdown-item" href="?accion=mantenimientos&operacion=eliminar&id='.$item['idmantenimiento'].'"">eliminar</a></li>
    </ul>
  </div>

        </div>
        <div class="card-footer text-body-secondary">
          ',$comunes->fecha($item['fecha']),'
        </div>
      </div>';
    }
}
echo '</div>';
