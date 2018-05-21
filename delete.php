<?php
session_start();

if(!$_SESSION['adminname']){ //als niet ingelogd is, ! = niet
    //redirect to login page
    header('Location: index.php');
    exit;
}

require_once 'includes/Database/database.php'; 

$id = $_GET['index'];

$query = "DELETE FROM workshops WHERE id = $id";

mysqli_query($db, $query);
mysqli_close($db);

 header('location: indexadmin.php');
exit;

?>