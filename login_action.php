<?php
    if(!isset($_SESSION)){
        session_start();
    }

$email=$_POST["email"];
$password=$_POST["password"];
$name=$_POST["name"];


// 2.process data
// 2.1validations
$errors="";

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors .="Invalid email format.<br>";
}

if(strlen($password)<2){
    $errors.="password must have 2 characters min";
}

// 2.2non-fillables



// 2.3business logic should implement here

if(!$errors){
    // 3.check records with the database
    include_once("includes/db.php");

    // 3.3create sql and execute
    $sql="SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if($row=mysqli_fetch_array($result)){
        //login success
        //assign session variables when login success
        $_SESSION["ID"] = $row["uid"];
        $_SESSION["NAME"] = $row["name"];
        $_SESSION["ROLE"] = $row["role"];
        $_SESSION["PHOTO"] = $row["photo"];
        
        header ("Location: dashboard.php?msg=");
    }else{
        //login fail
        header ("Location: login.php?msg=Invalid username /password");
    }
    

}else{
    // echo "error: ".$errors;
    header ("Location: login.php?msg=".$errors);
}


?>