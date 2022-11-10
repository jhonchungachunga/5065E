<?php
require 'core/core.php';
//gestion de las peticiones ajax

if($_POST){
    switch(isset($_GET['mode'])?$_GET['mode']:null){
        case 'login':
            require('core/bin/ajax/iniciarSession.php');
            break;
    }
}else {
    header('location:index.php');
}