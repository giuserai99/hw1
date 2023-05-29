<?php
  require_once 'dbconfig.php';
  session_start();

  header('Content-Type: application/json');

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $id = mysqli_real_escape_string($conn, $_POST["id_prodotto"]);

    $query = "SELECT * FROM prodotti WHERE id = '$id'";
    $res = mysqli_query($conn, $query);

    $array = array();
    while($risultato = mysqli_fetch_assoc($res)) {
      array_push($array, $risultato);
    }
    echo json_encode($array);
?>