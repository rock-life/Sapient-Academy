
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flit</title>
    <script>
        function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
    </script>
    <link rel="stylesheet" href="css/st.css?"<?php echo date('l jS \of F Y h:i:s A'); ?>>
</head>
<script src="js/scripts.js"></script>
<body >
    <header >
        <nav class="topnav" id="myTopnav">
                <a id='lin' href='index.php?action=main'>Головна</a>
                <a id='lin' href='index.php?action=news'>Новини</a>
                <a id='lin' href='index.php?action=song'>Музика</a>
                <a id='lin' href='index.php?action=about'>Про сайт</a>
                <?php
                if(isset($_SESSION["login"]))
                echo" <a id='lin' href='index.php?action=signout'>Вихід</a>";
                else {
                   echo" <a id='lin' href='index.php?action=registration'>Реєстрація</a>";
                   echo" <a id='lin' href='index.php?action=login'>Вхід</a>";
                }
                ?>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <img style="width: 60px; height: 60px;" src="img/more_icon.png" alt="">
  </a>

        </nav>
        <div class="box"><img id="logo" src="img/logo.jpg" alt=""></div>
    </header>
