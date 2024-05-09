<?php
session_start();
$data0 = $_POST['data0']; //ชื่อคลินิก
$data1 = $_POST['data1']; //ชื่อผู้ใช้งาน
$data2 = $_POST['data2']; //password
$data3 = $_POST['data3'];  //email
$data4 = $_POST['data4'];   //เบอร์
$data5 = $_POST['data5'];   //รายละเอียดคลินิก

$data7 = $_POST['data7'];      //ที่อยู่
$latitude = $_SESSION['latitude'];
$longitude = $_SESSION['longitude'];
$location = $latitude . $longitude;
/*
echo $data0;
echo $data1;
echo $data2;
echo $data3;
echo $data4;
echo $data5;

echo $data7;
*/

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/register',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{
     "hotelName":"' . $data0 . '",
    "location":"' . $data7 . '", 
     "hotelTel":"' . $data4 . '", 
     "hotelUsername":"' . $data1 . '",
     "password":"' . $data2 . '", 
     "email":"' . $data3 . '", 
     "additionalNotes":"' . $data5 . '",
     "latitude":' . $latitude . ',
     "longitude":' . $longitude . '
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response1 = curl_exec($curl);
$response_array = json_decode($response1, true);

// Check if registration was successful
if(isset($response_array['id'])) {
    // Registration successful, proceed with file upload
    $id = $response_array['id'];
    
    // Set API endpoint
    $apiEndpoint = 'https://backend-application.pcnone.com/hotel/upload-image';
    
    // Initialize cURL session
    $curl = curl_init();
    
    // Iterate through each uploaded file
    foreach ($_FILES['upload']['tmp_name'] as $index => $tmpName) {
        $fileName = $_FILES['upload']['name'][$index];
        $fileType = $_FILES['upload']['type'][$index];
        
        // Build the POST data for each file
        $postData = array(
            'file' => new CURLFILE($tmpName, $fileType, $fileName),
            'id' => $id, // ID parameter
        );
        
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $apiEndpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postData,
        ));
        
        // Execute cURL session and store the response
        $response = curl_exec($curl);
        
        // Check for errors
        if (curl_errno($curl)) {
            echo 'Curl error: ' . curl_error($curl);
        }
    }
    
    // Close cURL session
    curl_close($curl);
    
    // Registration and file upload successful, display success message
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div>
        <script>
            swal({
                title: "สมัครใช้งานสำเร็จ!",
                text: "ย้อนกลับไปหน้า Login",
                icon: "success"
            }).then((value) => {
                // ไปยังหน้า index.php
                window.location.href = "../index.php";
            });
        </script>
    </div>
    <?php
} else {
    // Registration failed, display error message
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div>
        <script>
            swal({
                title: "สมัครไม่สำเร็จ!",
                text: "ชื่อผู้ใช้งานนี้มีสมาชิกอยู่แล้ว",
                icon: "error"
            }).then((value) => {
                // ไปยังหน้า index.php
                window.location.href = "../index.php";
            });
        </script>
    </div>
    <?php
}

// Close cURL session
curl_close($curl);
?>
