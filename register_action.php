
<?php

define ('SITE_ROOT', realpath(dirname(__FILE__)));

    //1.collect form data from post method in php
        $name=$_POST["name"];
        $address=$_POST["address"];
        $email=$_POST["email"];
        $mobile=$_POST["mobile"];
        $password=$_POST["password"];
        $confirm=$_POST["confirm"];
        $photo='/images/default.jpg';

//         $photo = $_FILES['photo']['name'];
// $image_temp =$_FILES['photo']['tmp_name'];
// $target='C:/xampp/htdocs/jer/images/'.basename($_FILES['photo']['name']);
// move_uploaded_file($image_temp, "$target");
// insert into images (images) values ('$target');

    $destFile="uploadsuser/".basename($_FILES["photo"]["name"]);
    $sourceFile=$_FILES["photo"]["tmp_name"];
// echo realpath($sTempFileName);
    if(move_uploaded_file($sourceFile,$destFile)){
            $photo="uploadsuser/".basename($_FILES["photo"]["name"]);
    }else{
        echo "Error uploading....";
    }

//     $target_dir = "var/www/uploadsuser/";
// $target_file = $target_dir . basename($_FILES["photo"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["photo"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }
            // $uploaddir = '../uploadsuser/';
            // $uploadfile = $uploaddir . basename($_FILES['photo']['name']);

            // echo '<pre>';
            // if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
            //     echo "File is valid, and was successfully uploaded.\n";
            // } else {
            //     echo "Possible file upload attack!\n";
            // }
    //2.Process data
    //2.1 Validations
    $errors="";
    if (strlen($name)<5) {
        $errors .= "characters should be 5 min...";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors .= "Invalid email format...";
      }

    if($password!= $confirm){
        $errors .= "password and  confirm does not match...";
    }

    //2.2 Non-fillables
    $join_date=date('Y-m-d');
    $active=1;
    $role='m';


    //2.3 Business logic should implement here
    $user = "94766222181";
    $pwd = "7555";
    $text = urlencode("Thank you for registering LibraryManagementSystem!!!");
    $to =$mobile;
    
    $baseurl ="http://www.textit.biz/sendmsg";
    $url = "$baseurl/?id=$user&pw=$pwd&to=$to&text=$text";
    $ret = file($url);
    
    $res= explode(":",$ret[0]);
    
    if (trim($res[0])=="OK")
    {
    echo "Message Sent - ID : ".$res[1];
    }
    else
    {
    echo "Sent Failed - Error : ".$res[1];
    }

//

    if(!$errors){
        //3.Insert records to the database
        include_once("includes/db.php");

        //3.3 create sql and execute
        $sql="INSERT INTO user (name,address,email,mobile,password,photo,join_date,active,role) "
                . "VALUES ('$name','$address','$email','$mobile','$password','$photo','$join_date','$active','$role')";
        
        if(mysqli_query($conn,$sql)){
            echo "<h1>Registration Successfully</h1>";
        }else{
            echo "error: ".mysqli_error($conn);
        }
    }else{
        header ("Location: register.php?msg=".$errors);
    }
    

?>