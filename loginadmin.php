<?php
require_once 'includes/Database/database.php'; 
session_start();
//is het formulie verzonden?


if (isset($_POST['submit'])){
    
    $adminname = mysqli_escape_string($db, $_POST['adminname']);
    $password = mysqli_escape_string($db, $_POST['password']);
    
    $errors = [];
    //dat username niet ingevuld
    if($adminname == ''){
        $errors ['adminname'] = 'Username mag niet leeg zijn';
    }
    //password niet ingevuld
    if($password == ''){
        $errors ['password'] = 'Password mag niet leeg zijn';
    }
    
    $query = "SELECT * FROM adminlogin WHERE adminname = '$adminname' AND password = '$password'";
    $result = mysqli_query($db, $query);
    
    $user = mysqli_fetch_assoc($result); // maakt van een rij een array --> assoc
    //ALS combinatie username en password bestaat niet
    if ($user){
        //inloggen
        $_SESSION['adminname'] = $user['adminname'];   // is het nu user of username
        $_SESSION['id'] = $user['id']; 
        
        header('Location: indexadmin.php'); // geen spatie tussen loc en : 
        exit;
    }
    //ANDERS
    else{
        $errors['general'] = 'Combinatie username en wachtwoord komt niet voor.';
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
            margin-left: 480px;
        }
        footer{
            float: right;
            margin-top: 160px;
            margin-right: 40px;
    }
    </style>

    <form action="" method="post">
         <h1>Admin</h1><br>
    <div class="data-field">
        <label for="adminname">Username</label>
        <input id="adminname" type="text" name="adminname" value=""/> 
        <span><?= isset($errors['adminname']) ? $errors['adminname']: ''?></span> <!-- achter vraagteken wordt uitgevoerd als isset true is, isset geeft true or false.. soort if else statement..     conditie ? true : false na vraagteken voer hij true uit -->
        </div><br>
        
        <div class="data-field">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" value=""/> 
        <span><?= isset($errors['password']) ? $errors['password']: ''?></span>
        </div>
        
    <div class="data-submit">
        <input class="submit" type="submit" name="submit" value="login"/> <!--name moet submit zijn anders weet dat stukje in de php niet dat er gesubmit is.-->
        </div>
    </form>
    </body>
</html>