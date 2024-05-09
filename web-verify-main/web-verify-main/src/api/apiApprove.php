<?php 
$api_url = "https://backend-application.pcnone.com/hotel/update-verify";
$token = $_POST['token'];
$id = $_POST['id'];
$status = $_POST['status'];

// ข้อมูลที่จะส่ง
$data = json_encode(array(
    "id" => $id,
    "status" => "$status"
));

$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
);

// Initialize cURL session
$ch = curl_init($api_url);

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // ส่งข้อมูล JSON ไปยัง API

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

$response = array();
$response['success'] = true; // หรือ false ตามการดำเนินการ
echo json_encode($response);

        ?>