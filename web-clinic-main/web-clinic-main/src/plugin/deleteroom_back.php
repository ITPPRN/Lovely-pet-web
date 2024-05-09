<?php
session_start();
if (!isset($_SESSION['token'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: ../index.php');
} else {
  $token = $_SESSION['token'];
  //echo $token;
}

$dataid = $_GET['data'];

// ข้อมูลที่จะส่ง
$data = array(
    'id' => $dataid
);

// แปลงข้อมูลเป็นรูปแบบ JSON
$postData = json_encode($data);

// ตั้งค่าคำขอ
$ch = curl_init('https://backend-application.pcnone.com/room/delete-room');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token,
    'Content-Length: ' . strlen($postData))
);

// ส่งคำขอและรับผลลัพธ์
$result = curl_exec($ch);

// ตรวจสอบว่ามีข้อผิดพลาดหรือไม่
if(curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo "<script>window.location.href = '../room.php';</script>";
}

// ปิดการเชื่อมต่อ
curl_close($ch);


?>
