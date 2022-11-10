<?php 
//encabezado
include (HTML_DIR.'/overall/header.php');?>
<body>
    <?php
    
   if(isset($_SESSION['email'])){
        //si se inicio session
       include 'inicio.php';
   }else{
  
        switch ($operacion= isset($_GET['operacion'])?$_GET['operacion']:'default'){
            case 'registrese':
                include (HTML_DIR.'/public/reg.html');
                break;
            case 'login':
                include (HTML_DIR.'/public/login.php');
                break;
            default :
                include (HTML_DIR.'/public/login.php');
                break;
       }           
   }?>
   
    </body>
     
</html>

