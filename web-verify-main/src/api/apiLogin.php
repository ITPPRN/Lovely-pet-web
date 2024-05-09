<?php
ob_start();
session_start();
$user = $_POST['userName'];
$pass = $_POST['passWord'];

$curl = curl_init();

// สร้าง JSON string โดยใช้ค่าของ $user และ $pass
$post_fields = json_encode(array(
    "userName" => $user,
    "passWord" => $pass
));

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://backend-application.pcnone.com/verify/login',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post_fields, // ใช้ค่า $post_fields ที่เราสร้างขึ้น
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Get HTTP status code
curl_close($curl);



if ($http_status == 200) {
    $_SESSION['token'] = $response;
    header('Location: ../dashboard.php'); // Redirect to dashboard if login successful
} elseif ($http_status == 417) {
    header('Location: ../index.php');
     // Unable to access
} else {
    echo "เกิดข้อผิดพลาด: " . $http_status; // Error
}
?>