<?php
session_start();

if(!$_SESSION['username']){ //als niet ingelogd is, ! = niet
    //redirect to login page
    header('Location: index.php');
    exit;
}

require_once 'includes/Database/database.php';

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
    <link rel=stylesheet type="text/css" href="css/styleindex2.css"><!-- refers to stylesheet -->
</head>
<body>
    
    <header>
    <h1>Workshops</h1><br>
        <div class=person1>  <!-- text upper right corner -->
        <div class= "person"> <!-- name person signed in -->
        Welkom <?= $_SESSION['username'] ?> <!-- name of person logged in -->
        </div>
        <a href="logout.php"> Uitloggen </a>
        <a href="nieuweworkshop.php"> Mijn Workshops </a>
        <div class="uitlegtitel">Uitleg</div>
        </div>
    </header>
        <div class="uitleg" id="uitleg"> <!-- explanation slide -->
            Als u wilt inschrijven voor een workshop, klikt u op deze workshop. Dan krijgt u een pagina met informatie over de workshop. Wanneer u zeker weet dat u wilt inschrijven klikt u daar op het knopje inschrijven. Dan komt u op de pagina met al uw inschrijvingen. U kunt daar ook inschrijvingen verwijderen. Als u ook voor andere workshops wil inschrijven, gaat u terug naar de hoofdpagina en herhaalt u de zelfde stappen die we net besproken hebben. Als u deze tekst begrijpt, kunt u hem wegklikken door op het woord 'uitleg' rechtsboven te klikken. Als u de uitleg weer wilt lezen, klikt u opnieuw op het woord 'uitleg'.
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script> 
$(document).ready(uitlegslide(){   // the explanation slide function 
    $(".uitlegtitel").on("click", uitlegslide(){
        $("#uitleg").slideToggle("slow");
    });
});
</script>
    
<div class="blok"> <!-- all the workshops in a loop -->
    <?php foreach($infoWorkshops as $key => $workshops): ?>
        <workshops>
            <a href="detail.php?index=<?= $workshops['id'] ?>"><br>   
                <?= $workshops ['datum'] ?> <br> 
                <st><?= $workshops ['naam'] ?></st></a> <br>
    </workshops>
    <?php endforeach; ?>
</div>
</body>
</html>