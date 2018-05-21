<?php
session_start();

if(!$_SESSION['adminname']){ //als niet ingelogd is, ! = niet
    //redirect to login page
    header('Location: index.php'); // where to go back to if not in a session
    exit;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel=stylesheet type="text/css" href="css/stylecreate.css"><!-- refers to stylesheet -->
    <title>Create new workshop</title>   <!-- not on the page but the tab --> 
</head>
<body>
    
    <h1>Create workshop</h1><br>
    <form action= "save2.php" method="post"> 
        <label>Plaatje:</label> <input type="text" name="image"/> <br>
        <label>Datum:</label> <input type="tekst" name="datum"/> <br> <!-- name is for GET, so you can get it back somewhere else -->
        <label>Naam:</label> 
        <input type="tekst" name="naam"/> <br>
        <label>Informatie:</label> 
        <textarea id="textarea" style="width:400px; height:300px;" type="tekst" name="info"></textarea> <br>
        <input class="submit" type="submit" name="submit" value="Opslaan"/>
    </form>
    
</body>
</html>