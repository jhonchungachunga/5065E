<?php
if(isset($_SESSION['email'])){
    session_destroy();
   header('location:index.php');
}else {
     session_destroy();
     header('location:index.php');
}
?>