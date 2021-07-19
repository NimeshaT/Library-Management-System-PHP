<?php
    <?php include_once("../includes/head.php")?>
    <?php include_once("../includes/admin_only.php")?>
    
    // 1.colect form data from post method in php
    $oid=$_POST["id"];
    $name=$_POST["name"];
    

    // 2.process data
    // 2.1 validations

    $errors="";
    if(strlen($name)<2){
        $errors .="name must have 2 characters min";
    }

    // 2.2non-fillables
    // 2.3business logic should implement here

    if(!$errors){
        // 3.insert record to the database
        include_once("../includes/db.php");

        // 3.3create sql and execute
        $sql="UPDATE  author SET name='$name' WHERE  oid='$oid'";
        if(mysqli_query($conn,$sql)){
            header ("Location: list.php");
        }else{
            echo "error: ".mysqli_error($conn);
        }
    }else{
        header ("Location: edit.php?msg=".$errors);
    }
?>