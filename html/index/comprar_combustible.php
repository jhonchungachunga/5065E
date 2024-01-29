<?php 
echo '<div class="mb-3">
<form method="POST" action="">
<h1>Registrar compra de combustible</h1>
<input type="hidden" class="form-control" name="operacion" value="crear">

<label for="total" class="form-label">Total compra</label>
<input type="number" class="form-control" id="total_compra" placeholder="precio en soles" name="total_compra">
</div>
<div class="mb-3">
  <label for="fecha" class="form-label">Fecha</label>
  <input type="date" class="form-control" id="fecha" name="fecha">  

  <div class="d-grid gap-2">
  <br>
  <button class="btn btn-primary" type="submit">enviar datos</button>
  
</div>
  </form>
</div>';