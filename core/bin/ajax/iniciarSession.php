<?php
//verificamos si hay una session activa
if(!isset($_SESSION['nombres'])){
    //verificamos si se han enviado datos por post
    
    if($_POST){
        if(!empty($_POST['user']) and !empty($_POST['pass'])){     
        $a=new Usuario;
        $a->iniciarSession($_POST['user'],$_POST['pass']);
        exit;
        }
    }else {
        include (HTML_DIR.'/public/login.html');
    }
}else {
    header('location:index.php');
}

