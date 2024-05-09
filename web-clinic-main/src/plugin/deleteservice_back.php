<?php
session_start();
if (!isset($_SESSION['token'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: ../index.php');
} else {
    $token = $_SESSION['token'];
    //echo $token;
}


    $id = $_GET['id'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend-application.pcnone.com/additional-service/delete-service',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "id": ' . $id . '
    }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ),
    ));

    $response = curl_exec($curl);

    // Check if API call was successful
    if ($response !== false) {
        // Redirect to another page after successful API call
        echo "<script>window.location.href = '../service.php';</script>";
        exit;
    } else {
        // Handle error if API call failed
        echo "API call failed!";
    }

    curl_close($curl);
?>