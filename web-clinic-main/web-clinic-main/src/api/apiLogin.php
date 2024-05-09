<?php
session_start();
$user = $_POST['userName'];
$pass = $_POST['passWord'];

// URL ของ API
$api_url = "https://backend-application.pcnone.com/hotel/login";

// ข้อมูลที่จะส่งใน body

$data = array(
    'userName' => $user,
    'passWord' => $pass
);

// แปลงข้อมูลใน body เป็น JSON format
$json_data = json_encode($data);

// กำหนด header ในการส่ง JSON data
$headers = array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json_data)
);

// สร้าง curl handle
$ch = curl_init();

// กำหนดตัวเลือกในการส่ง request
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); // หรือ "PUT", "GET", หรือว่า "DELETE" ตามที่ต้องการ
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// ทำการ execute และรับ response
$response = curl_exec($ch);

// ตรวจสอบว่ามี error หรือไม่
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}



// ปิด curl handle
curl_close($ch);

// แสดงผลลัพธ์
// echo $response;
// if ($response != null) {
//     // Redirect to another page if login successful
//     header('Location: ./withverify.php');
//     exit; // Make sure no more code is executed after redirection
// } else {
//     // If login unsuccessful, stay on the same page
//     header('Location: ../index.php');
//     exit; // Make sure no more code is executed after redirection
// }

$response_data = json_decode($response, true);

// Check if $response_data is not null and if login was successful
if (!is_null($response_data) && isset($response_data['status'])) {
    $_SESSION['error_message'] = "ไม่สามารถเข้าสู่ระบบได้";
    header('Location: ../index.php');
} else {
    // Handle the case where response data is null or does not have the expected structure
    $_SESSION['token'] = $response;
    header('Location: ../withverifyid.php');
}