<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION["ROLE"]) && $_SESSION["ROLE"]=='m'){

    }else{
        header ("Location: ".PATH."login.php");
    }
?>