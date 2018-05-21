<?php
require_once 'includes/Database/database.php'; 
session_start();
//is het formulie verzonden?
//$username = '';

if (isset($_POST['submit'])){
    
    $username = mysqli_escape_string($db, $_POST['username']);
    $password = mysqli_escape_string($db, $_POST['password']); // zodat geen injecties kunnen doen

    $password1 = password_hash($password, PASSWORD_BCRYPT); 

    $errors = [];
    //dat username niet ingevuld
    if($username == ''){
        $errors ['username'] = 'Verplicht veld';
    }
    //password niet ingevuld
    if($password == ''){
        $errors ['password'] = 'Verplicht veld';
    }
    
//    if(empty($errors)) {
//        $query = "SELECT * FROM customers WHERE username = '$username' AND password = '$password';";
//        $result = mysqli_query($db, $query);
//
//        $user = mysqli_fetch_assoc($result); // maakt van een rij een array --> assoc
//        //ALS combinatie username en password bestaat niet
        
        if(empty($errors)) {
        $query = "SELECT password FROM customers WHERE username = '$username';";
        $result = mysqli_query($db, $query);
        $laptop = mysqli_fetch_assoc($result); 
            console.log($result);
        
        if (password_verify($password1, $laptop)){
        
            $query = "SELECT * FROM customers WHERE username = '$username';";
            $result = mysqli_query($db, $query);

            $user = mysqli_fetch_assoc($result); // maakt van een rij een array --> assoc
            //ALS combinatie username en password bestaat niet
        }
        
        
        if ($user){
            //inloggen
            $_SESSION['username'] = $user['username'];   // is het nu user of username
            $_SESSION['id'] = $user['id']; 
            

            header('Location: index2.php'); // geen spatie tussen loc en : 
            exit;

        }
        //ANDERS
        else{
            $errors['general'] = 'Verkeerde gebruikersnaam of wachtwoord.';
        }
    }
}
?>

<html>
<head>
<title>Login</title>
<meta charset="utf-8"/>
    
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
        width: 85%;
        font-family: "Verdana";
        margin-bottom: 30px;
        margin-top: 0px;
        text-shadow: 1px 1px 6px #000000;
    }
    form{
        margin-top: 100px;
        margin-left: 400px;
        margin-right: 400px;
        height: 200px;
        width: 400px;
        background-color: #faffa3;
        padding: 50px;
        padding-bottom: 80px;
        border-color: #f9f984;
        border-width: 2px;
        border-style: solid;
        padding-top: 20px;
        box-shadow: 0px 0px 20px grey;
    }
    a:link{
        color: #870a82;
        font-size: 27px;
        text-decoration: none;
        display: inline-block;
    }
    a:visited{
        color: #870a82;
    }
    a:hover{
        color: darkgoldenrod;
    }
    label{
        float: left;
        width: 100px;
    }
    .submit{
        background-color: #ba37b4;
        float: right;
        border: none;
        color: #ffffff;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 16px;
        cursor: pointer;
        box-shadow: 0px 0px 20px grey;
    }
        line{
            float: left;
            margin-top: 50px;
            margin-left: 400px;
        }
        footer{
            float: right;
            margin-top: 160px;
            margin-right: 40px;
    }
    </style>

    <form action="" method="post">
         <h1>Inloggen</h1><br>
    <div class="data-field">
        <label for="username">Username</label>
        <input id="username" type="text" name="username" value="<?= isset($username) ? $username : '' ?>"/> 
        <span><?= isset($errors['username']) ? $errors['username']: ''?></span> <!-- achter vraagteken wordt uitgevoerd als isset true is, isset geeft true or false.. soort if else statement..     conditie ? true : false na vraagteken voer hij true uit -->
    </div>
    <br>
        
    <div class="data-field">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" value=""/> 
        <span><?= isset($errors['password']) ? $errors['password']: ''?></span>
    </div>
    <div class="data-submit">
        <input class="submit" type="submit" name="submit" value="login"/> <!--name moet submit zijn anders weet dat stukje in de php niet dat er gesubmit is.-->
        </div>
        
    <div>
        <p><?= isset($errors['general'])? $errors['general'] : '' ?></p>
    </div>
    </form>
    
            <line>
        Als je nog geen account hebt kun je je
        <a href="createuser.php"> Aanmelden </a></line>
    
<footer>
<a href="loginadmin.php"> Admin </a>
</footer>
    
    </body>
</html>