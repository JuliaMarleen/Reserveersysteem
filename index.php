<!doctype html>
<html>
<head>
    <title>Workshops</title>
    <meta charset="utf-8"/>
    
</head>
<body>
<style>
    html{
        background-color: #fcc9fc;
        font-family: "Verdana";
        font-size: 20px;
    }
    h1{
        color: #870a82;
        font-size: 70px;
        margin-left: 100px;
        width: 55%;
        font-family: "Verdana";
        margin-bottom: 10px;
        text-shadow: 1px 1px 6px #000000;
        float: left;
        width: 400px;
    }
    p{
        width: 600px;
        margin-left: 180px;
        margin-top: 30px;
        color: darkgoldenrod;
        float: left;
        background-color: #fcfac2;
        padding: 20px;
        box-shadow: 0px 0px 20px grey;
    }
    .logo{
        margin-left: 50px;
        margin-top: 50px;
        float: left;
        margin-bottom: 50px;
    }
    .foto{
        margin-left: 60px;
        margin-top: 70px;
        float: left;
        margin-bottom: 50px;
    }
    .button{
        background-color: #ba37b4;
        border: none;
        color: #ffffff;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
        box-shadow: 0px 0px 20px grey;
        float: left;
        margin-left: 250px;
        margin-top: 20px;
    }
    #map {
        height: 400px;
        width: 400px;
        position: fixed;
        z-index: 10;
        float: left;
    }
    .adress{
        height: 500px;
        width: 1000px;
        margin-top: 0px;
        margin-left: 180px;
        margin-bottom: 100px;
        float: left;
    }
    .adresstext{
        color: darkgoldenrod;
        float: left;
        margin-right: 50px;
        margin-top: 10px;
        background-color: #fcfac2;
        padding: 20px;
        box-shadow: 0px 0px 20px grey;
    }
    .contacthead{
        margin-left: 210px;
    }
    .facebook{
        color: darkgoldenrod;
    }
</style>
    <header>
        <img class="logo" src="includes/image/logo.png"  alt="logo" style="height:70px;width:500px" />
        <h1>Workshops</h1><br>
    </header>
                 
<div class="text">
    <p>
        <b>Atelier Bij de hand</b> is een gezellige, huiselijke knutselwinkel. We verkopen alles van papier tot wol en van stempels tot decoraties. Ook voor advies kunt u bij ons terecht. Sinds de opening van de winkel, geven wij ook elke week workshops! Als u hieronder op de workshop-knop klikt, kunt u een account aanmaken en met dat account kunt u zich inschrijven voor de verschillende workshops die bij ons gegeven worden. 
        <br>
        <a class="button" href="inlog.php">Inschrijven workshops</a>
    </p>
    <img class="foto" src="includes/image/hartkaart.jpg"  alt="kaart" style="height:200px;width:200px" />
</div> 
    
    <div class="adress">
        <div class="contacthead">
        <h1>Contact</h1></div>
    <div class="adresstext">
        Adres:<br>
        Harkulo 5,  3085 MH Rotterdam<br>
        <br>
        Telefoon:<br>
        010 75 11 903<br>
        <br>
        Facebook:<br>
        <a class="facebook" href="https://www.facebook.com/Atelier-Bij-de-hand-Hobby-materialen-1604529789829263/">Atelier Bij De Hand Facebookpagina</a><br>
        <br>
        E-mail:<br>
        Voor informatie: info@atelierbijdehand.nl<br>
        <br>
        Bankrekeningnummer:<br>
        IBAN NL96RABO0301897247<br>
    </div>
    <div id="map" width="400" height="400"></div>
    </div>

<script>
function initMap() {
  var uluru = {lat: 51.8747724, lng: 4.4832684};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 17,
    center: uluru
  });
  var marker = new google.maps.Marker({
    position: uluru,
    map: map
  });
}    
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKtOhySXcXFATtOSge7Wgd6_lsXMtqvbI&callback=initMap">
</script>
    
</body>
</html>