<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<html>
    <?php
        require_once 'dbconfig.php';

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    ?>
        <head>
            <meta charset="utf-8" />
            <title>Cerca</title>
            <link rel="stylesheet" href="./css/ricerca.css" />
            <script src="./js/ricerca.js" defer="true"></script>
            <meta data="viewport" content="width=device-width, initial-scale=1" />
        </head>
        <body>
            <nav>
                <a href="home.php">
                    <img id="logo" src="./images/logo.png">
                </a>
                <ul id="links">
                    <li><a href ="home_auth.php">Home</a></li>
                    <li><a href ="ricerca.php">Cerca</a></li>
                    <li><a href ="prodotti.php">Prodotti</a></li>
                    <li><a href ="carrello.php">Carrello</a></li>
                    <li><a href ="logout.php">Logout</a></li>
                </ul>
                <div id="menu" onclick="mobileMenu(this)">
                    <div></div>
                    <div></div>
                    <div></div>
                    <ul class="links_mobile">
                        <li><a href ="home_auth.php">Home</a></li>
                        <li><a href ="ricerca.php">Cerca</a></li>
                        <li><a href ="prodotti.php">Prodotti</a></li>
                        <li><a href ="carrello.php">Carrello</a></li>
                        <li><a href ="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>

       
    <section>
      <div id="ricerca">
        <h1>Ricerca le tue sneakers</h1>
        <div id="ricerca-view"></div>
      </div>
    </section>
            



            <footer>
                <p> Giuseppe Raineri O46002011</p>
            </footer>
        </body>
        
</html>