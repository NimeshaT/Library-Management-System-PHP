<?php
   include_once("../includes/head.php");
  include_once("../includes/admin_only.php");
    //1 collect form data from post method
    $bookname=$_POST["bookname"];
    $authorname=$_POST["authorname"];
    $category=$_POST["category"];
    // $photo=$_POST["photo"];
    $photo='/images/default.jpg';

    $destFile="../uploads/".basename($_FILES["photo"]["name"]);
    $sourceFile=$_FILES["photo"]["tmp_name"];

    if(move_uploaded_file($sourceFile,$destFile)){
            $photo="uploads/".basename($_FILES["photo"]["name"]);
    }else{
        echo "Error uploading....";
    }

    //2process data
    //2.1Validations
    $errors="";
    if(strlen($bookname)<5){
        $errors .="Name must have 5 characters min...";
    }

    //2.2non-fillables
    $availability=10;
    $view_count=0;

    //2.3 business logic should implement
    if(!$errors)  {
        //3insert record to the database
        include_once("../includes/db.php");
        //3.1create sql and execute
        $sql="INSERT INTO book (name,oid,cid,photo,availability,view_count) VALUES ('$bookname','$authorname','$category','$photo','$availability','$view_count')";
        if(mysqli_query($conn,$sql)){
            echo "<h1>saved successfully</h1>";
        }else{
            echo "errors : ".mysqli_error($conn);
        }
    } else{
        header ("Location: add.php?msg=".$errors);
    }


?>