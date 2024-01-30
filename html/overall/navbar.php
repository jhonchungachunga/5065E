<nav class="navbar navbar-dark navbar-expand-lg bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="views/app/images/iconos/tractor.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      John Deere 5065E
    </a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?accion=lista_horas">inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?accion=orden">registrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?accion=registrar_compra_combustible">registrar compra combustible</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?accion=registrar_mantenimiento">registrar mantenimiento</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="?accion=estadistica">ver estadisticas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?accion=compra_combustible">ver compra de combustible</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?accion=mantenimientos">ver mantenimientos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?view=cerrar_session">cerrar session</a>
        </li>
      </ul>
      <span class="navbar-text">
        <?php echo strtoupper($_SESSION['nombres'])?>
      </span>
    </div>
  </div>
</nav>