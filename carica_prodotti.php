<?php
  require_once 'dbconfig.php';
  session_start();

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $query = "SELECT * FROM prodotti";
    $res = mysqli_query($conn, $query);

    $array = array();
    while($risultato = mysqli_fetch_assoc($res)) {
      array_push($array, $risultato);
    }
    echo json_encode($array);
?>