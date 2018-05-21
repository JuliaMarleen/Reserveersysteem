<?php
session_start();

if(!$_SESSION['adminname']){ //als niet ingelogd is, ! = niet
    //redirect to login page
    header('Location: indexadmin.php');
    exit;
}

require_once 'includes/Database/database.php';

//GET ID om juiste informatie op te halen
//$id = $_GET['id']; 
//query schrijven om daadwerkelijke informatie op te halen
$query = "SELECT * FROM workshops"; // . omdat we 2 strings aan elkaar plakken
//uitvoren van query
$result = mysqli_query($db, $query);
    //print_r($result);   // ziet er lelijk uit op je scherm
//album ophalen uit de resultatenset
$infoWorkshops = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($db);
?>
<!doctype html>
<html>
<head>
    <title>Workshops</title>
    <meta charset="utf-8"/>
    
</head>
<body>
    
    <header>
    <h1>Workshops</h1>
        Welkom <?= $_SESSION['adminname'] ?>
        <a href="logout.php"> uitloggen </a>
    <a href="create.php">Nieuwe workshop</a><br>
        </header>
                 
<style>
        html{
        background-color: #fcc9fc;
    }
    h1{
        color: #870a82;
        font-size: 70px;
        margin-left: 200px;
        width: 60%;
        font-family: "Verdana";
        margin-bottom: 20px;
        text-shadow: 1px 1px 6px #000000;
        float: left;
    }
    a:link{
        color: #870a82;
        font-size: 27px;
        text-decoration: none;
        display: inline-block;
        padding-left: 50px;
        padding-right: 50px;
    }
    a:visited{
        color: #870a82;
    }
    a:hover{
        color: darkgoldenrod;
    }
    workshops{
        float: left;
        width: 250px;
        height: 200px;
        margin: 10px 20px;
        font-family: "Verdana";
        font-size: 27;
        background-color: #fcfac2;
        border-color: #f9f984;
        border-width: 2px;
        border-style: solid;
        padding-top: 30px;
        padding-bottom: 30px;
        box-shadow: 0px 0px 20px grey;
    }
    .blok{
        width: 1200px;
        margin: 0 auto;
    }
    st{
        color: #838412;
    }
</style>
    
<div class="blok">
    <?php foreach($infoWorkshops as $key => $workshops): ?>
        <workshops>
            <a href="infoadmin.php?index=<?= $workshops['id']; ?>"><br>   
                <?= $workshops ['datum'] ?> <br>
                <st><?= $workshops ['naam'] ?></st></a> <br>
                <a href="edit.php?index=<?= $workshops['id'] ?>">Edit</a> <br>
                <a href="delete.php?index=<?= $workshops['id'] ?>">Delete</a> <br>
    </workshops>
    <?php endforeach; ?>
</div>
</body>
</html>