<?php 
    require_once 'auth.php';
    if ($userid = checkAuth()) {
        header("Location: home_auth.php");
        exit;
    }
?>


<html>
    <?php

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    ?>
    <head>
        <meta charset="utf-8" />
        <title>Snkrs_InLove</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alkatra|Lato|Calistoga|Pridi|Open Sans">
        <link rel="stylesheet" href="./css/home.css" />
        <script src="./js/home.js" defer="true"></script>
        <meta data="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <nav>
            <a href="home.php" >
                <img id="logo" src="./images/logo.png"> 
            </a>
                <ul id="links">
                    <li><a href ="login.php">Accedi</a></li>
                    <li><a href ="" onclick="notifica()">Prodotti</a></li>
                    <li><a href ="" onclick="notifica()">Carrello</a></li>
                    <li><a href ="" onclick="notifica()">Cerca</a></li>
                </ul>
            <div id="menu" onclick="mobileMenu(this)">
            <div></div>
            <div></div>
            <div></div>
                <ul class="links_mobile">
                    <li><a href ="login.php">Accedi</a></li>
                    <li><a href ="" onclick="notifica()">Prodotti</a></li>
                    <li><a href ="" onclick="notifica()">Carrello</a></li>
                    <li><a href ="" onclick=notifica()>Cerca</a></li>
                </ul>
            </div>    
        </nav>
        
        <header>
            <div id="overlay"></div>
            <h1>
                <strong>Buy Limited Sneakers</strong></br>
            </h1>
        </header>

        <section>
            <div id="intro">
                <h1>Lo store</h1>
                <p>Il nostro store propone diverse tipologie di sneakers!<br>Fai la tua scelta!</p>
            </div>

            <div id="vetrina">
            </div>
        </section>

        <footer>
            <p> Giuseppe Raineri O46002011</p>
        </footer>

    </body>
</html>