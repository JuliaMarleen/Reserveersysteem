<?php
require_once 'includes/Database/database.php'; 

$id = $_GET['index'];

$query = "DELETE FROM reserveringen WHERE id = '$id'";

mysqli_query($db, $query);
mysqli_close($db);

 header('location: nieuweworkshop.php');
exit;

?>