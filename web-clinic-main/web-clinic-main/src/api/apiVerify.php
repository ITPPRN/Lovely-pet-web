<?php
// ตรวจสอบว่ามีการส่งค่ามาทาง GET หรือไม่
if (isset($_GET['email'])) {

  // ดึงค่า email จาก GET
  $email = $_GET['email'];

  // เชื่อมต่อกับ API
  $ch = curl_init('https://backend-application.pcnone.com/hotel/verify');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['email' => $email]));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  // ส่ง request ไปยัง API
  $response = curl_exec($ch);
  curl_close($ch);

  // แปลง response เป็น JSON
  $responseData = json_decode($response, true);

  // ตรวจสอบสถานะ
  if ($responseData['status'] === 'success') {

    // แสดงข้อความว่า "กำลังรอการ Verify"
    echo '<h1>กำลังรอการ Verify</h1>';
    echo '<p>อีเมลยืนยันถูกส่งไปยัง ' . $email . ' เรียบร้อยแล้ว</p>';
    echo '<p>กรุณาตรวจสอบอีเมลของคุณและคลิกลิงก์เพื่อยืนยันบัญชีของคุณ</p>';

  } else {

    // แสดงข้อความแจ้งเตือน
    echo '<h1>เกิดข้อผิดพลาด</h1>';
    echo '<p>' . $responseData['message'] . '</p>';

  }
} else {

  // แสดงข้อความแจ้งเตือน
  echo '<h1>เกิดข้อผิดพลาด</h1>';
  echo '<p>ไม่มีข้อมูล email</p>';

}
?>