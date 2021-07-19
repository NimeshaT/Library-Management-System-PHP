<?php

<?php include_once("../includes/head.php")?>
<?php include_once("../includes/admin_only.php")?>

    //1 collect form data from post method
    $lid=$_POST["id"];
    $uname=$_POST["uname"];
    $bname=$_POST["bname"];
    $dDate=$_POST["dDate"];
    $rDate=$_POST["rDate"];

    //2process data
    //2.1Validations
    $errors="";
    if(strlen($bname)<2){
        $errors .="Name must have 2 characters min...";
    }

    //2.2non-fillables
    // $availability=0;
    // $view_count=0;

    //2.3 business logic should implement
    if(!$errors)  {
        //3insert record to the database
        include_once("../includes/db.php");
        //3.1create sql and execute
        $sql="UPDATE lending SET uid='$uname',bid='$bname',dueDate='$dDate',returnDate='$rDate' WHERE lid='$lid'";
        if(mysqli_query($conn,$sql)){
            header ("Location: list.php");
        }else{
            echo "errors : ".mysqli_error($conn);
        }
    } else{
        header ("Location: edit.php?msg=".$errors);
    }


?>