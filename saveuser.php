<?php
//connectie met database maken
require_once 'includes/Database/database.php';

//print_r($_POST);
//var_dump($_FILES);

//check of data verstuurd is
if (isset($_POST['submit'])) {

//data uit formulier halen
        $username = mysqli_escape_string($db, $_POST['username']);
        $password1 = mysqli_escape_string($db, $_POST['password']); //password_hash -- password_verify
    
    $password = password_hash($password1, PASSWORD_BCRYPT);
    
//data naar database versturen
    $query = "INSERT INTO customers (username, password) 
          VALUES ('$username', '$password')";
    
    mysqli_query($db, $query);
//database afsluiten
    mysqli_close($db);

//terugsturen naar index.php
 header('location: inlog.php');
exit;
}

else
{
  header('location: createuser.php');
}
?>