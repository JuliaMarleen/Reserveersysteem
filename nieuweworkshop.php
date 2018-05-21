<?php
session_start();

if(!$_SESSION['username']){ //als niet ingelogd is, ! = niet
    //redirect to login page
    header('Location: index.php');
    exit;
}

require_once 'includes/Database/database.php'; // zelfde staat daarin als wat hierboven staat

//GET ID om juiste informatie op te halen
//$id = $_GET['index'];  //is nu index omdat die andere pagina alleen maar index doorgeeft.
//query schrijven om daadwerkelijke informatie op te halen
$persoon = $_SESSION['id'];
$query = "SELECT reserveringen.id AS res_id, reserveringen.workshop, workshops.datum, workshops.naam
FROM reserveringen
INNER JOIN workshops ON reserveringen.workshop = workshops.id
WHERE reserveringen.persoon = '$persoon'"; //  = " .$id kan ook, . is omdat we 2 strings aan elkaar plakken
//uitvoeren van query    // dubbele aanhalingstekens want dan gaat hij de variabele wel verwerken en anders zet hij letterlijk op scherm.
$result = mysqli_query($db, $query);
//    print_r($result);  //  ziet er lelijk uit op je scherm
//album ophalen uit de resultatenset
$infoReserveringen = mysqli_fetch_all($result, MYSQLI_ASSOC);
//   print_r($album);
mysqli_close($db); // database afsluiten? werkte ook zonder dit
?>

<html>
<head>
   <title>Informatie workshop</title> 
    <meta charset="utf-8"/>
    
    </head>
<body>
    
<style>
    html{
        background-color: #fcc9fc;
        font-family: "Verdana";
    }
    header{
        float: right;
    }
    h1{
        color: #870a82;
        font-size: 70px;
        margin-left: 200px;
        width: 75%;
        font-family: "Verdana";
        margin-bottom: 20px;
        text-shadow: 1px 1px 6px #000000;
        float: left;
    }
    h2{
        width: 700px;;
        margin-left: 200px;
        color: #a8a501;
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
    .info{
        width: 200px;
        margin-top: 50px;
        margin-left: 50px;
        margin-right: 50px;
        padding: 50px;
        background-color: aliceblue;
        box-shadow: 0px 0px 20px grey;
        font-size: 23px;
        float: left;
    }
    .blok{
        width: 1200px;
        margin: auto;
        padding-top: 75px;
    }
</style>
    
<header>
    Welkom <?= $_SESSION['username'] ?>
        <a href="logout.php"> Uitloggen </a>
    </header>    
    <a href="index2.php"> Hoofdpagina </a>
    <h1>Mijn Workshops</h1>
<div class="blok">

 <?php foreach($infoReserveringen as $key => $reserveringen){ ?>
    <div id="index=<?= $reserveringen['res_id'] ?>" class="info">
        <h3> <?= $reserveringen['naam']; ?> </h3>
        <h3> <?= $reserveringen['datum']; ?> </h3>
        <a id="button" href="deletesignup.php?index=<?= $reserveringen['res_id'] ?>">Verwijder inschrijving</a> <br>
    </div>
  <?php } ?>
    </div>
    
</body>
</html>