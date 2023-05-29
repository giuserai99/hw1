<?php
require_once 'dbconfig.php';
session_start();

if(isset($_SESSION['username'])){
    header("Location: home_auth.php");
    exit;
}

  if(!empty($_POST['nome']) && !empty($_POST['cognome']) && !empty($_POST['username'])
     && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['conferma_password'])
     && !empty($_POST['citta']) && !empty($_POST['cap']) && !empty($_POST['indirizzo'])
     && !empty($_POST['cellulare']))
    {
      $errori = array();
      $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

      if(!preg_match('/^[a-zA-Z0-9_]{1,8}$/', $_POST['username'])) {
        $errori[] = "Username inserito non valido!";
      } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $query = "SELECT username FROM users WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        if(mysqli_num_rows($res) > 0) {
          $errori[] = "Username già usato, inserisci un altro username!";
        }
      }

      if(strlen($_POST['password']) < 8) {
        $errori[] = "Password troppo corta! (min 8 caratteri)";
      }

      if(strcmp($_POST['password'], $_POST['conferma_password']) != 0) {
        $errori[] = "Le password non sono uguali, riprova!";
      }

      if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errori[] = "Email non corretta!";
      } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $query = "SELECT email FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $query);
        if(mysqli_num_rows($res) > 0) {
          $errori[] = "Email già usata";
        }
      }
      
      if(count($errori) == 0) {
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $citta = mysqli_real_escape_string($conn, $_POST['citta']);
        $cap = mysqli_real_escape_string($conn, $_POST['cap']);
        $indirizzo = mysqli_real_escape_string($conn, $_POST['indirizzo']);
        $cellulare = mysqli_real_escape_string($conn, $_POST['cellulare']);
        $query = "INSERT INTO users(nome, cognome, username, email, password, citta, cap, indirizzo, cellulare) VALUES('$nome', '$cognome', '$username', '$email', '$password', '$citta', '$cap', '$indirizzo', '$cellulare')";
        if(mysqli_query($conn, $query)) {
          $_SESSION['username'] = $_POST['username'];
          $_SESSION['user_id'] = mysqli_insert_id($conn);
          mysqli_close($conn);
          header("Location: home_auth.php");
          exit;
        } else {
          $errori[] = "Errore nella connessione al database!";
        }
      } 
      mysqli_close($conn);
    }
?>

<html>
  <head>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='./css/login.css'>
    <script src='./js/signup.js' defer="true"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup - Iscriviti</title>
  </head>
  <body>
    <section class="signup_form">
      <h1>Signup</h1>
      <span id="error"></span>
      <form name="signup" method="post">
        <div class="nome">
           <div><label for='nome'>Nome</label></div>
          <div><input type='text' name='nome'></div>
          <span></span>
        </div>
        <div class="cognome">
           <div><label for='cognome'>Cognome</label></div>
           <div><input type='text' name='cognome'></div>
           <span></span>
        </div>
        <div class="username">
          <div><label for='username'>Username</label></div>
          <div><input type='text' name='username'></div>
          <span></span>
        </div>
        <div class="email">
            <div><label for='email'>Email</label></div>
            <div><input type='text' name='email'></div>
            <span></span>
        </div>
        <div class="password">
          <div><label for='password'>Password</label></div>
          <div><input type='password' name='password'></div>
          <span></span>
        </div>
        <div class="conferma_password">
          <div><label for='conferma_password'>Conferma Password</label></div>
          <div><input type='password' name='conferma_password'></div>
          <span></span>
        </div>
        <div class="citta">
           <div><label for='citta'>Città</label></div>
           <div><input type='text' name='citta'></div>
           <span></span>
        </div>
        <div class="indirizzo">
           <div><label for='indirizzo'>Indirizzo</label></div>
           <div><input type='text' name='indirizzo'></div>
           <span></span>
        </div>
        <div class="cap">
           <div><label for='cap'>Cap</label></div>
           <div><input type='text' name='cap'></div>
           <span></span>
        </div>
        <div class="cellulare">
           <div><label for='cellulare'>Cellulare</label></div>
           <div><input type='text' name='cellulare'></div>
           <span></span>
        </div>
        <div class="register">
          <input type='submit' id="submit" value="Registrati">
        </div>
      </form>
      <div class="accesso">Hai già un account? <a href="login.php">Accedi</a>
    </section>
  </body>
</html>