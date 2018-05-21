<?php
session_start();

if(!$_SESSION['username']){ //als niet ingelogd is, ! = niet
    //redirect to login page
    header('Location: index.php');
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
        width: 500px;
        margin-top: 150px;
        margin-left: 200px;
        color: #77753e;
    }  
    info{
        float: left;
        width: 700px;
    }
    img{
        float: left;
        margin-top: 100px;
        margin-left: 100; 
    }
    a:link{
        color: #870a82;
        font-size: 30px;
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
        margin-top: 150px;
        margin-left: 200px;
        float: left;
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
    hoofd{
        margin-right: 600px;
        margin-top: 0px;
    }
</style>
    
     <a href="index2.php"> Hoofdpagina </a>
<header>
    Welkom <?= $_SESSION['username'] ?>
    <a href="logout.php"> Uitloggen </a>  
</header> 
    
<info>
    <h1> <?= $workshops['naam']; ?> </h1><br>
    <h2> <?= $workshops['datum']; ?> <br><br>
    <?= $workshops['info']; ?> </h2>
</info>
    <form action= "savesignup.php" method="post"> 
            
        <div hidden="hidden" class="data-field">
        <label for="naam">datum</label>
        <input id="naam" type="text" name="wsnaam" value="<?= $workshops['id']; ?>"/>
        </div>
        
        <div hidden="hidden" class="data-field">
        <label for="persoon">Persoon</label>
        <input id="persoon" type="text" name="persoon" value="<?= $_SESSION['id']; ?>"/>
        </div>
        
        <input type="submit" class="submit" name="submit" value="Inschrijven"/>
    </form>
    <pic>
    <img src="<?= $workshops['image']; ?>"  alt="<?= $workshops['naam'];?>" style="height:300px;width:400px" />
    </pic>
    
</body>
</html>