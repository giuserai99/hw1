<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
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
        <link rel="stylesheet" href="./css/home_auth.css" />
        <script src="./js/home_auth.js" defer="true"></script>
        <meta data="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <nav>
            <a href="home_auth.php" >
                <img id="logo" src="./images/logo.png"> 
            </a>
                <ul id="links">
                    <li><a><?php echo 'Benvenuto, '.$_SESSION['username'].''; ?></a></li>
                    <li><a href ="ricerca.php">Cerca</a></li>
                    <li><a href ="prodotti.php">Prodotti</a><li>
                    <li><a href ="carrello.php">Carrello</a></li>
                    <li><a href ="logout.php">Logout</a></li>
                </ul>
            <div id="menu" onclick="mobileMenu(this)">
            <div></div>
            <div></div>
            <div></div>
                <ul class="links_mobile">
                    <li><a><?php echo 'Benvenuto, '.$_SESSION['username'].''; ?></a></li>
                    <li><a href ="ricerca.php">Cerca</a></li>
                    <li><a href ="prodotti.php">Prodotti</a></li>
                    <li><a href ="carrello.php">Carrello</a></li>
                    <li><a href ="logout.php">Logout</a></li>
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
            <div id="in_evidenza">
                <h1>Sneakers in evidenza questa settimana</h1>
                <div id="in_evidenza-view"></div>
            </div>
            <div id="vetrina">
                <h1>Scopri le nostre categorie</h1>
            </div>
        </section>

        <footer>
            <p> Giuseppe Raineri O46002011</p>
        </footer>

    </body>
</html>