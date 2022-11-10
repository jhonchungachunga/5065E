<?php 
$listas=new Select;
$listaOperador=$listas->listaOperador();
$listaImplemento=$listas->listaImplemento();
$listaEstado=$listas->listaEstado();
?>
<h1 class="px-3">Orden de trabajo</h1>
<form class="px-3">
<div class="mb-3">
  <label for="descripcion" class="form-label">Descripcion</label>
  <input type="text" class="form-control" id="descripcion" placeholder="Descripcion">
</div>
<div class="mb-3">
  <label for="nro_horas" class="form-label">Numero de horas</label>
  <input type="number" class="form-control" id="nro_horas" placeholder="numero de horas">
</div>
<div class="mb-3">
  <label for="nro_minutos" class="form-label">Minutos</label>
  <input type="number" class="form-control" id="nro_minutos" placeholder="minutos" value="0" max="60">
</div>

<div class="mb-3">
  <label for="precio" class="form-label">Precio</label>
  <input type="number" class="form-control" id="precio" placeholder="precio en soles">
</div>

<div class="mb-3">
  <label for="fecha" class="form-label">Fecha</label>
  <input type="date" class="form-control" id="fecha">
</div>

<select class="form-select mb-3" aria-label="Default select example">
  <option selected>Seleccione operador</option>
    <?php 
    if($listaOperador){
        foreach($listaOperador as $item){
            echo '<option value="'.$item['id'].'">'.$item['nombre'].'</option>';
        }
    }
    ?>
</select>

<select class="form-select mb-3" aria-label="Default select example">
  <option selected>Seleccione implemento</option>
    <?php 
    if($listaImplemento){
        foreach($listaImplemento as $item){
            echo '<option value="'.$item['id'].'">'.$item['descripcion'].'</option>';
        }
    }
    ?>
</select>

<select class="form-select mb-3" aria-label="Default select example">
  <option selected>Seleccione Estado</option>
    <?php 
    if($listaEstado){
        foreach($listaEstado as $item){
            echo '<option value="'.$item['id'].'">'.$item['descripcion'].'</option>';
        }
    }
    ?>
</select>

<div class="mb-3">
  <label for="id" class="form-label">Creador por</label>
  <input type="number" class="form-control" id="id" value="<?php echo $_SESSION['id'];?>">
</div>
</form>
