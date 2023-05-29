<?php
  require_once 'dbconfig.php';
  session_start();

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $userid = mysqli_real_escape_string($conn, $_SESSION['user_id']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    $query = "DELETE FROM carrello WHERE userid = $userid AND id_prodotto = '$id'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if($res) {
        $response = array('esito' => true);
    }else {
        $response = array('esito' => false);
    }

    echo json_encode($response);
    mysqli_close($conn);

?>