<?php
session_start();

if(!$_SESSION['adminname']){ //als niet ingelogd is, ! = niet
    //redirect to login page
    header('Location: indexadmin.php');
    exit;
}
require_once 'includes/Database/database.php'; // zelfde staat daarin als wat hierboven staat

//GET ID om juiste informatie op te halen
$id = $_GET['index'];  //is nu index omdat die andere pagina alleen maar index doorgeeft.
//query schrijven om daadwerkelijke informatie op te halen
$query = "SELECT * FROM workshops WHERE id = '$id'"; //  = " .$id kan ook, . is omdat we 2 strings aan elkaar plakken
//uitvoeren van query    // dubbele aanhalingstekens want dan gaat hij de variabele wel verwerken en anders zet hij letterlijk op scherm.
$result = mysqli_query($db, $query);
  //  print_r($result);    ziet er lelijk uit op je scherm
//album ophalen uit de resultatenset
$workshops = mysqli_fetch_assoc($result);

$query = "SELECT reserveringen.persoon, customers.username
FROM reserveringen
INNER JOIN customers ON reserveringen.persoon = customers.id
WHERE reserveringen.workshop = '$id'";
//uitvoeren van query    // dubbele aanhalingstekens want dan gaat hij de variabele wel verwerken en anders zet hij letterlijk op scherm.
$result = mysqli_query($db, $query);
//    print_r($result);  //  ziet er lelijk uit op je scherm
//album ophalen uit de resultatenset
$infoReserveringen = mysqli_fetch_all($result, MYSQLI_ASSOC);
//   print_r($album);
mysqli_close($db);
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
    }
    h2{
        margin-left: 200px;
        color: #a8a501;
    }  
    info{
        float: left;
        width: 700px;
    }
    img{
        float: left;
        margin-left: 60px;
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
    form{
        margin-top: 100px;
        margin-left: 900px;
    }
    .submit{
        background-color: #ba37b4;
        border: none;
        color: #ffffff;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        box-shadow: 0px 0px 20px grey;
    }
    info2{
        margin-top: 50px;
        margin-left: 150px;
        margin-bottom: 50px;
        color: purple;
        float: left;
        background-color: antiquewhite;
        padding: 50px;
        box-shadow: 0px 0px 20px grey;
    }
</style>
    
<header>
    Welkom <?= $_SESSION['adminname'] ?>
        <a href="logout.php"> uitloggen </a>
    </header>   
    <a href="indexadmin.php"> Hoofdpagina </a>
    
<info>
    <h1> <?= $workshops['naam']; ?> </h1><br>
    <h2> <?= $workshops['datum']; ?> </h2>
    <h2> <?= $workshops['info']; ?> </h2>
</info>
    

<info2>
    <h3>Deelnemers:</h3>
    <?php foreach($infoReserveringen as $key => $reserveringen){ ?>
    <h3> <?= $reserveringen['username']; ?> </h3>
  <?php } ?>
</info2>
    
    <pic>
        <img src="<?= $workshops['image']; ?>"  alt="<?= $workshops['naam'];?>" style="height:300px;width:400px" />
    </pic>
</body>
</html>