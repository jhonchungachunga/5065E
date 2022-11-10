<?php 
//menu o barra de navegacion
include HTML_DIR.'/overall/navbar.php'
?>
<div class="container-fluid bg-light">
    <div class="row">
        <div class="col-lg-12">


        <?php 
        //controlador que llamara luego a las vistas
        if(isset($_GET['accion'])){
            if(file_exists('core/controllers/'. strtolower($_GET['accion']).'Controller.php')){
    
             include('core/controllers/'.strtolower($_GET['accion']).'Controller.php');
    
        }else{
            include ('core/controllers/errorController.php');
       }
       }else {
            include ('core/controllers/lista_horasController.php');
        }        
        ?>

        </div>
    </div>
</div>

<a href="?view=cerrar_session">Cerrar Session</a>
<?php 
//footer ?>