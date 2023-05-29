<?php
  require_once 'dbconfig.php';
  session_start();

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $userid = mysqli_real_escape_string($conn, $_SESSION['user_id']);
    $id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $img = mysqli_real_escape_string($conn, $_POST['img']);
    $nome = mysqli_real_escape_string($conn, $_POST['name']);
    $prezzo = mysqli_real_escape_string($conn, $_POST['price']);
    $taglia = mysqli_real_escape_string($conn, $_POST['size']);
    
    $query = "INSERT INTO carrello(userid, id_prodotto, img, nome, prezzo, taglia) VALUES ($userid, '$id', '$img', '$nome', '$prezzo', '$taglia')";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if($res) {
        $response = array('esito' => true);
    }else {
        $response = array('esito' => false);
    }

    echo json_encode($response);
    mysqli_close($conn);

?>