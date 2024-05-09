<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customerName = $_POST['customerName'];
    $roomId = intval(explode(' - ', $_POST['room'])[0]);  
    $petName = $_POST['petName'];
    $start = $_POST['start'];
    $new_date_format_start = date("d/m/Y", strtotime($start));
    $end = $_POST['end'];
    $new_date_format_end = date("d/m/Y", strtotime($end));
    $additionService = explode(' - ', $_POST['additionService'])[0];
    $total = $_POST['total'];

    $token = $_SESSION['token'];   
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend-application.pcnone.com/booking/booking-for-user',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "customerName": "'.$customerName.'",
            "roomId": '.$roomId.',
            "petName": "'.$petName.'",
            "start": "'.$new_date_format_start.'",
            "end": "'. $new_date_format_end.'",
            "paymentMethod": "cash payment",
            "additionService": "'.$additionService.'",
            "totalPrice": '.$total.'
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ),
    ));
 
    
    
    $data = curl_exec($curl);
 $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $responseArray = json_decode($data, true);

    // ตรวจสอบ HTTP status code
    if ($http_status == 200) {
        echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
        echo "<div><script>
        swal({
            title: 'Success!',
            text: 'successful.',
            icon: 'success'
        }).then((value) => {
            // ไปยังหน้า dashboard.php
            window.location.href = '../ownerbooking.php';
        });
    </script></div>"; 
    } else {
        echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
        echo "<div><script>
        swal({
            title: 'Error!',
            text: 'An error occurred.',
            icon: 'error'
        }).then((value) => {
            // ไปยังหน้า ownerbooking.php
            window.location.href = '../ownerbooking.php';
        });
    </script></div>";
    }

}
?>