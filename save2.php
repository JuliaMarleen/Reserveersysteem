<?php
session_start();

if(!$_SESSION['adminname']){ //als niet ingelogd is, ! = niet
    //redirect to login page
    header('Location: index.php');
    exit;
}

//connectie met database maken
require_once 'includes/Database/database.php';

print_r($_POST);
//var_dump($_FILES);

//check of data verstuurd is
if (isset($_POST['submit'])) {
    
/*$target_dir = "includes/image/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
    
$image = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    var_dump($image);*/

//data uit formulier halen
        $naam = $_POST['naam'];
        $datum = $_POST['datum'];
        $info = $_POST['info'];
        $image = $_POST['image'];
    
//data naar database versturen
    $query = "INSERT INTO workshops (naam, datum, info, image) 
          VALUES ('$naam', '$datum', '$info', '$image')";

//echo $query;
    
    mysqli_query($db, $query);
//database afsluiten
    mysqli_close($db);

//    echo 'hallo';
//terugsturen naar index.php
 header('location: indexadmin.php');
exit;
}
//bevestiging gelukt
else
{
  header('location: create2.php');
}
?>