<?php

    //3.1DB Connection
    $conn=mysqli_connect("localhost","root","1234","library");

    //3.2 connection eror debugging
    if(mysqli_errno($conn)){
        die ("error :" .mysqli_error($conn));
    }
?>