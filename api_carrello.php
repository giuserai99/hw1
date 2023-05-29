<?php
    require_once 'dbconfig.php';
    session_start();
  
    header('Content-Type: application/json');

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $userid = $_SESSION['user_id'];


    //generazione pagina
    $clientId = 'AcMVMbSNFChJH0-MRDnMKJTOHXg9F3uJAGbBE6OWnmtBWPV0jxXOsRaVkU1Rn8dmot93F9AQqrM5sELN';
    $clientSecret = 'EKziERWRn0a-huX7FMbZHZYgImBFxrPWVdoFlKsD0sC0CzFXeucODlcEWd0owYs6IJvf5C_G9uebP3u5';
    $accessToken = 'https://api-m.sandbox.paypal.com/v1/oauth2/token';
    
    // Ottieni il token di accesso come descritto negli esempi precedenti
    
    // Crea un ordine di pagamento
    $orderUrl = 'https://api.sandbox.paypal.com/v1/payments/payment';
    
    $price = '10.00'; // Prezzo dell'articolo
    
    $orderData = array(
        'intent' => 'CAPTURE',
        'purchase_units' => array(
            array(
                'amount' => array(
                    'currency_code' => 'EUR',
                    'value' => $price
                )
            )
        )
    );
    
    $orderHeaders = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $accessToken
    );
    
    $orderCurl = curl_init();
    curl_setopt($orderCurl, CURLOPT_URL, $orderUrl);
    curl_setopt($orderCurl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($orderCurl, CURLOPT_POST, true);
    curl_setopt($orderCurl, CURLOPT_POSTFIELDS, json_encode($orderData));
    curl_setopt($orderCurl, CURLOPT_HTTPHEADER, $orderHeaders);
    
    $orderResponse = curl_exec($orderCurl);
    if ($orderResponse === false) {
        die('Errore nella creazione dell\'ordine PayPal: ' . curl_error($orderCurl));
    }
    
    $orderData = json_decode($orderResponse, true);
    
    // Esegui il redirect l'utente alla pagina di approvazione del pagamento
    $approvalUrl = '';
    foreach ($orderData['links'] as $link) {
        if ($link['rel'] === 'approve') {
            $approvalUrl = $link['href'];
            break;
        }
    }
    
    if (!empty($approvalUrl)) {
        header('Location: ' . $approvalUrl);
        exit;
    } else {
        die('Errore nella creazione dell\'URL di approvazione PayPal');
    }
?>    