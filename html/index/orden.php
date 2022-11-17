<?php 
$listas=new Select;
$listaOperador=$listas->listaOperador();
$listaImplemento=$listas->listaImplemento();
$listaEstado=$listas->listaEstado();
?>
<h1 class="px-3">Orden de trabajo</h1>
<form class="px-3" method="POST" action="">

<div class="mb-3">
  
  <input type="hidden" class="form-control" name="operacion" value="crear">
</div>


<div class="mb-3">
  <label for="descripcion" class="form-label border-bottom border-primary border-3 text-primary">Descripcion</label>
  <input type="text" class="form-control" id="descripcion" placeholder="Descripcion" name="descripcion">
</div>
<div class="border border-success rounded p-4">
  <h3 class="border-bottom border-success border-2 text-success">Importe</h3>
<div class="mb-3">
  <label for="nro_horas" class="form-label">Numero de horas</label>
  <input type="number" class="form-control" id="nro_horas" placeholder="numero de horas" value="0" name="nro_horas">
</div>
<div class="mb-3">
  <label for="nro_minutos" class="form-label">Minutos</label>
  <input type="number" class="form-control" id="nro_minutos" placeholder="minutos" value="0" max="60" name="nro_minutos">
</div>

<div class="mb-3">
  <label for="precio" class="form-label">Precio por hora</label>
  <input type="number" class="form-control" id="precio_hora" placeholder="precio por hora" value="120" name="precio_hora">
</div>

<div class="mb-3">
  <label for="total" class="form-label">Precio total</label>
  <input type="number" class="form-control" id="precio_total" placeholder="total a cancelar" name="precio_total">
</div>

<div class="d-grid gap-2">
  <button class="btn btn-success" type="button" onclick="calcular()">calcular total</button>
  <button class="btn btn-danger" type="reset">limpiar datos</button>
</div>
</div>
<br>
<div class="border border-info rounded p-4">
<h3 class="border-bottom border-info border-3 text-info">Datos adicionales</h3>
<div class="mb-3">
  <label for="fecha" class="form-label">Fecha</label>
  <input type="date" class="form-control" id="fecha" name="fecha">
</div>

<select class="form-select mb-3" aria-label="Default select example" name="operador">
  <option selected>Seleccione operador</option>
    <?php 
    if($listaOperador){
        foreach($listaOperador as $item){
            echo '<option value="'.$item['id'].'">'.$item['nombre'].'</option>';
        }
    }
    ?>
</select>

<select class="form-select mb-3" aria-label="Default select example" name="implemento">
  <option selected>Seleccione implemento</option>
    <?php 
    if($listaImplemento){
        foreach($listaImplemento as $item){
            echo '<option value="'.$item['id'].'">'.$item['descripcion'].'</option>';
        }
    }
    ?>
</select>

<select class="form-select mb-3" aria-label="Default select example" name="estado">
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
  <label for="by" class="form-label">Creador por</label>
  <input type="number" class="form-control" id="by" value="<?php echo $_SESSION['id'];?>" name="by">
</div>
</div>
<br>
<div class="d-grid gap-2">
  <button class="btn btn-primary" type="submit">enviar datos</button>
  
</div>
</form>



