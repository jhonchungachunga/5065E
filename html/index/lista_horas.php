<?php 
$lista=new Orden;
$datos=$lista->leerOrden();
echo '<h1>Lista de Ordenes generadas</h1>';
if($datos){
    echo '<table class="table table-info table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">FECHA</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">ESTADO</th>
    </tr>
  </thead>';
    foreach($datos as $item){
      $estilo=$item['descEstado']=='PENDIENTE'?'table-danger':'';
      echo '<tbody><tr class="'.$estilo.'">
      <th scope="row">',$item['fecha'],'</th>
      <td><span class="fs-6 fst-italic">',$item['descripcion'],'</span><br>
      <span class="fs-5 fw-bold">Horas: ',$item['nro_horas'],'</span><br>
      <span class="fs-5 fw-bold">Minutos: ',$item['minutos'],'</span><br>
      <span class="badge text-bg-success">PRECIO: ',$item['precio_total'],' s/.</span><br>
      <span class="fs-6 fst-italic">Operador: ',$item['nombreOperador'],'</span><br>
      <span class="fs-6 fst-italic">Implemento: ',$item['descImplemento'],'</span><br>
      <span class="fs-6 fst-italic">By: ',$item['creadoPor'],'</span><br>
      <!-- Example single danger button -->
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
    ver
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">editar</a></li>
    <li><a class="dropdown-item" href="?accion=lista_horas&operacion=eliminar&id='.$item['id'].'">eliminar</a></li>
  </ul>
</div>

  
      </td>
      <td>';
      echo $item['descEstado']=='PENDIENTE'?'<span class="badge text-bg-warning">'.$item['descEstado'].'</span>':'<span class="badge text-bg-info">'.$item['descEstado'].'</span>';
      
      echo '</td>
      </tr>
      </tbody>';
      }
    echo '</table>';
}else {
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hola!</strong> No se encontraron registros.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
