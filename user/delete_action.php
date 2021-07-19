<?php

 include_once("../includes/head.php");
 include_once("../includes/admin_only.php");

    //1 collect form data from post method
    $uid=$_GET["id"];

    //2process data
    //2.1Validations
    $errors="";
    // if(strlen($name)<2){
    //     $errors .="Name must have 2 characters min...";
    // }

    //2.2non-fillables
    //2.3 business logic should implement
    if(!$errors)  {
        //3insert record to the database
        include_once("../includes/db.php");
        //3.1create sql and execute
        $sql="DELETE FROM user WHERE uid='$uid'";
        if(mysqli_query($conn,$sql)){
            header ("Location: list.php");
        }else{
            echo "errors : ".mysqli_error($conn);
        }
    } else{
        header ("Location: list.php?msg=".$errors);
    }


?>