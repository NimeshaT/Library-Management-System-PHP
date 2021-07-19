<?php
     include_once("../includes/head.php");
    include_once("../includes/admin_only.php");
    
    //1 collect form data from post method
    $name=$_POST["uname"];
    $bookname=$_POST["bname"];
    $duedate=$_POST["dDate"];
    $returndate=$_POST["rDate"];

    //2process data
    //2.1Validations
    $errors="";
    // if(strlen($bookname)<5){
    //     $errors .="Name must have 5 characters min...";
    // }

    //2.2non-fillables
    //2.3 business logic should implement
    if(!$errors)  {
        //3insert record to the database
        include_once("../includes/db.php");

        //transaction Part
        mysqli_autocommit($conn, false);
        $flag = true;

        //3.1create sql and execute
        $sql1="INSERT INTO lending (uid,bid,dueDate,returnDate) VALUES ('$name','$bookname','$duedate','$returndate')";
        $sql2="UPDATE book INNER JOIN lending ON book.bid=lending.bid SET availability=availability-1";
        // if(mysqli_query($conn,$sql1)){
        //     echo "<h1>saved successfully</h1>";
        // }else{
        //     echo "errors : ".mysqli_error($conn);
        // }
        $result = mysqli_query($conn, $sql1);

        if (!$result) {
            $flag = false;
                echo "Error details: " . mysqli_error($conn) . ".";
        }

        $result = mysqli_query($conn, $sql2);
        if (!$result) {
            $flag = false;
                echo "Error details: " . mysqli_error($conn) . ".";
        }

        if ($flag) {
            mysqli_commit($conn);
            echo "All queries were executed successfully";
            } else {
            mysqli_rollback($conn);
            echo "All queries were rolled back";
            }

            mysqli_close($conn);
    } else{
        header ("Location: add.php?msg=".$errors);
    }


?>