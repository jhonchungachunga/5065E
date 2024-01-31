<?php
$comunes=new Comunes;
$listaProductos=new Select;
$productos=$listaProductos->listarProductosMantenimiento();

$id=isset($_REQUEST['id'])?$_REQUEST['id']:null;
$mantenimiento=new Mantenimiento;
$datos=$mantenimiento->fichaMantenimiento($id);

if($datos){
    foreach($datos as $item){
        echo '<div class="card text-center m-2 col-12 ">
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

    echo '<form class="p-3 card" method="POST" action="">
    <input type="hidden" class="form-control" name="operacion" value="crear">
    <input type="hidden" class="form-control" name="id_mantenimiento" value="'.$id.'">
    <select class="form-select mb-3" aria-label="Default select example" name="idproductos_mantenimiento">
  <option selected>SUMINISTRO</option>'; 
    if($productos){
        foreach($productos as $item){
            echo '<option value="'.$item['idproductos_mantenimiento'].'">'.$item['suministro'].' - '.$item['articulo'].'</option>';
        }
    }
    
echo '</select>
<div class="d-grid gap-2">
  <button class="btn btn-primary" type="submit">Agregar</button>
  
</div></form>';


    echo '<h1>Detalles del mantenimiento</h1>';

$detalle_Mantenimiento=new DetalleMantenimiento;
$lista=$detalle_Mantenimiento->verDetalleMantenimiento($id);

if($lista){
  echo '<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Suministro</th>
      <th scope="col">Descripcion</th>
      <th scope="col"></th>
    
    </tr>
  </thead>';
  foreach($lista as $item2){
    echo '
    <tbody>
      <tr>
        <th scope="row">',$item2['suministro'],'</th>
        <td>',$item2['articulo'],'</td>
        <td><div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Acciones
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?accion=ficha_mantenimiento&operacion=eliminar&id_mantenimiento='.$item2['id_mantenimiento'].'&id='.$item2['id'].'">Eliminar</a></li>
          </ul>
        </div>
      </div></td>
    
    
      </tr>
    
     
    </tbody>';
 
  }
  echo ' </table>';
}
}