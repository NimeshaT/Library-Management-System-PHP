<?php

<?php include_once("../includes/head.php")?>
<?php include_once("../includes/admin_only.php")?>

    //1 collect form data from post method
    $name=$_POST["name"];

    //2process data
    //2.1Validations
    $errors="";
    if(strlen($name)<2){
        $errors .="Name must have 2 characters min...";
    }

    //2.2non-fillables
    //2.3 business logic should implement
    if(!$errors)  {
        //3insert record to the database
        include_once("../includes/db.php");
        //3.1create sql and execute
        $sql="INSERT INTO author (name) VALUES ('$name')";
        if(mysqli_query($conn,$sql)){
            echo "<h1>saved successfully</h1>";
        }else{
            echo "errors : ".mysqli_error($conn);
        }
    } else{
        header ("Location: add.php?msg=".$errors);
    }


?>