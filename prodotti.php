<!-- categorie oppure prodotti -->

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
            <title>Prodotti</title>
            <link rel="stylesheet" href="./css/prodotti.css" />
            <script src="./js/prodotti.js" defer="true"></script>
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

                <div id="products">
  <!--                  <span id="id"></span>
                    <<div id="snkrs"></div> 
                    <img id="immagine"></img>
                    <span class="nome"></span>
                    <span class="prezzo"></span>
                    <label id="taglia"></label>
-->
                </div>
                

</section>
            <footer>
                <p> Giuseppe Raineri O46002011</p>
            </footer>
        </body>
        
</html>