<?php
    require_once 'dbconfig.php';
    session_start();

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $username = mysqli_real_escape_string($conn, $_GET['query']);
    $query = "SELECT username FROM users WHERE username = '$username'";

    $res = mysqli_query($conn, $query);
    if(mysqli_num_rows($res)>0){
        $response = array('esiste' => true);
    } else{
        $response = array('esiste' => false);
    }

    echo json_encode($response);
    mysqli_close($conn);
?>