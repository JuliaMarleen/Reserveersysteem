<?php
session_start();

if(!$_SESSION['username']){ //als niet ingelogd is, ! = niet
    //redirect to login page
    header('Location: index.php');
    exit;
}
//connectie met database maken
require_once 'includes/Database/database.php';

//check of data verstuurd is
if (isset($_POST['submit'])) {
    
    //Data uit formulier halen
    $naam = mysqli_real_escape_string($db, $_POST['wsnaam']);
    $persoon = mysqli_real_escape_string($db, $_POST['persoon']);
    
    //Data naar database versturen
    $query = "INSERT INTO `reserveringen` (`workshop`, `persoon`) 
    VALUES ('$naam', '$persoon')";
    
    //Run query
    mysqli_query($db, $query);
    
    print mysqli_error($db);
    
    //database afsluiten
    mysqli_close($db);

    //terugsturen naar index.php
    header('location: nieuweworkshop.php');
    
        exit;
}

else
{
  header('location: detail2.php');
}
?>