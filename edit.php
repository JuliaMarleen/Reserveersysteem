<?php
session_start();

if(!$_SESSION['adminname']){ //als niet ingelogd is, ! = niet
    //redirect to login page
    header('Location: index.php');
    exit;
}

//Require database in this file & image helpers
require_once "includes/Database/database.php";
// require_once "includes/image-helpers.php";

$workshopId = $_GET['index'];

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $naam = mysqli_real_escape_string($db, $_POST['naam']);
    $datum = mysqli_real_escape_string($db, $_POST['datum']);
    $info = mysqli_real_escape_string($db, $_POST['info']);
    $image = mysqli_real_escape_string($db, $_POST['image']);

    //Save variables to array so the form won't break
    $workshops = [
        'naam' => $naam,
        'datum' => $datum,
        'info' => $info,
        'image' => $image,
    ];

    if (empty($errors)) {

        //Update the record in the database
        $query = "UPDATE workshops
                  SET naam = '$naam',
                  datum = '$datum',
                  info = '$info',
                  image = '$image'
                  WHERE id = '$workshopId' ";
        $result = mysqli_query($db, $query);

        if ($result) {
            //Set success message
            $success = true;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }
    }
} else {
    //Retrieve the GET parameter from the 'Super global'

    //Get the record from the database result
    $query = "SELECT * FROM workshops WHERE id = " . mysqli_escape_string($db, $workshopId);
    $result = mysqli_query($db, $query);
    $workshops = mysqli_fetch_assoc($result);
}
//Close connection
mysqli_close($db);
?>

<html>
<head>
    <title>Bewerken</title>
    <meta charset="utf-8"/>
    <link rel=stylesheet type="text/css" href="css/styleedit.css"><!-- refers to stylesheet -->
</head>
<body>
<h1><?= $workshops['naam'] .' '. $workshops['datum']; ?></h1>
<?php if (isset($errors) && !empty($errors)) { ?>
    <ul class="errors">
        <?php for ($i = 0; $i < count($errors); $i++) { ?>
            <li><?= $errors[$i]; ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
    
    <?php if (isset($success)) { ?>
    <p class="success">Je workshop is bijgewerkt!</p>
<?php } ?>
    
    <div class="data-field">
        <label for="naam">Naam</label>
        <input id="naam" type="text" name="naam" value="<?= $workshops['naam']; ?>"/>
    </div>
    <div class="data-field">
        <label for="datum">Datum</label>
        <input id="datum" type="text" name="datum" value="<?= $workshops['datum']; ?>"/>
    </div>
    <div class="data-field">
        <label for="info">Informatie</label>
        <textarea id="textarea" name="info" style="width:400px; height:300px;" type="tekst">
            <?= $workshops['info']; ?>
        </textarea>

    </div>
    <div class="data-field">
        <label for="image">Foto</label>
        <input id="image" type="text" name="image" value="<?= $workshops['image']; ?>"/>
    </div>

    <div class="data-submit">
        <input type="hidden" name="id" value="<?= $workshopId; ?>"/>   <!--om te kunnen meenemen welk id het is-->
        <input class= "submit" type="submit" name="submit" value="Opslaan"/>
    </div>
    <a href="indexadmin.php">Go back to the list</a>
</form>
<div>
</div>
    
</body>
</html>