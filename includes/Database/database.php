<?php

// General settings
$host       = "localhost";
$database   = "datainfo";
$user       = "root";
$password   = "";

$db = mysqli_connect($host, $user, $password, $database)
    or die("Error: " . mysqli_connect_error());
?>



<?php
//    if(empty($errors)) {
//        $query = "SELECT password FROM customers WHERE username = '$username';";
//        $result = mysqli_query($db, $query);
//        $laptop = mysqli_fetch_assoc($result); 
//        
//        if (password_verify($password1, $laptop)){
//        
//            $query = "SELECT * FROM customers WHERE username = '$username';";
//            $result = mysqli_query($db, $query);
//
//            $user = mysqli_fetch_assoc($result); // maakt van een rij een array --> assoc
//            //ALS combinatie username en password bestaat niet
//        }
?> 