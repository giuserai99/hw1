<?php
require_once 'dbconfig.php';
session_start();

if(isset($_SESSION['username'])){
    header("Location: home_auth.php");
    exit;
}

if(!empty($_POST['username']) && !empty($_POST['password'])){
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT id, username, password FROM users WHERE username = '$username'";
    $res = mysqli_query($conn, $query) or die (mysqli_error($conn));

    if(mysqli_num_rows($res) >0){
        $credenziali = mysqli_fetch_assoc($res);

        if(password_verify($_POST['password'], $credenziali['password'])){
            $_SESSION['username'] = $credenziali['username'];
            $_SESSION['user_id'] = $credenziali['id'];
            header("Location: home_auth.php");
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
        }
    }
    $errore = "Username/password errati, riprova!";
}
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
        <link rel = 'stylesheet' href='./css/login.css'>
        <script src = './js/login.js' defer="true"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
    </head>
    <body>
        <section class="login">
            <h1>Login</h1>
            <?php
                if(isset($errore)){
                    echo "<span class='log_error'>$errore</span>";
                }    
            ?>
            <span id="error"></span>
            <form name="login" method="post">
                <div class="username">
                    <div><label for='username'>Username</label></div>
                    <div><input type='text' name='username'></div>
                </div>
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password'></div>
                </div>
                <div class="accesso">
                    <input type='submit' id='submit' value='Accedi'>
                </div>
            </form>
            <div class="registrazione">Non hai un account? <a href="signup.php">Iscriviti</a>
        </section>
    </body>
</html>
