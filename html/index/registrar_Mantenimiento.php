<?php 
echo '<h1>Registrar mantenimiento</h1>';

echo '<form method="POST" action="">
<input type="hidden" class="form-control" name="operacion" value="registrar">
<div class="mb-3">
<label for="horometro" class="form-label">Horometro</label>
<input type="number" class="form-control" id="horometro" placeholder="horometro" name="horometro">
</div>
<div class="mb-3">
<label for="descripcion" class="form-label">Descripcion</label>
<input type="text" class="form-control" id="descripcion" placeholder="agregue una descripcion" name="descripcion">
</div>
<div class="mb-3">
<label for="precio" class="form-label">Precio del mantenimiento</label>
<input type="number" class="form-control" id="precio" placeholder="Precio del mantenimiento" name="precio">
</div>
<div class="mb-3">
  <label for="fecha" class="form-label">Fecha</label>
  <input type="date" class="form-control" id="fecha" name="fecha">  

  <div class="d-grid gap-2">
  <br>
  <button class="btn btn-primary" type="submit">enviar datos</button>
  
</div>
  </form>';