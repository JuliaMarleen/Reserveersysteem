<?php

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aanmelden</title>   
</head>
<body>
    
<style>
    html{
        background-color: #fcc9fc;
        font-family: "Verdana";
    }
    h1{
        color: #870a82;
        font-size: 70px;
        margin-left: 200px;
        width: 85%;
        font-family: "Verdana";
        margin-bottom: 30px;
        text-shadow: 1px 1px 6px #000000;
        float: left;
    }
    form{
        margin-left: 220px;
    }
    label{
        float: left;
        width: 150px;
    }
    .submit{
        background-color: #ba37b4;
        float: left;
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
</style>
    
    <h1>Aanmelden</h1><br>
    <form action= "saveuser.php" method="post"> 
        <label>Naam:</label> <input type="text" name="username"/> <br><br>
        <label>Wachtwoord:</label> <input type="password" name="password"/> <br> <!-- name is voor GET zodat je het terug kan halen-->
        <br> 
        <input class= "submit" type="submit" name="submit" value="Opslaan"/>
    </form>
</body>
</html>