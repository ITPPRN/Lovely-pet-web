<?php

include "./api/apiGetHotel.php";
$hotelData = $_SESSION['hotelData'];

if (isset($hotelData['status'])) {
    $countData = 0;
} else {
    $countData = count($hotelData);
}



include "./api/apiGetHotelApprove.php";
$hotelDataApprove = $_SESSION['hotelDataApprove'];

if (isset($hotelDataApprove['status'])) {
    $countDataApprove = 0;
} else {
    $countDataApprove = count($hotelDataApprove);
}


function getNameimage($id1)
{
    $id = $id1;
    $token = $_SESSION['token'];

    // URL ของ API
    $api_url = "https://backend-application.pcnone.com/hotel/get-images-url";

    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token
    );

    $data = json_encode(array(
        "idHotel" => $id
    ));

    // Initialize cURL session
    $ch = curl_init($api_url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // ส่งข้อมูล JSON ไปยัง API

    // Execute cURL session and get the response
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Decode the API response
    $responseArray = json_decode($response, true);
    if (isset($responseArray)) {
        // ถ้ามีให้ return ค่าดัชนีที่ 0
        return end($responseArray);
    } else {
        // ถ้าไม่มีให้ return ค่าว่าง
        return '';
    }
}


?>
<div class="row container center-card col-md-9 mx-auto card" style="background-color: transparent; border: none; margin-top: 150px;">
    <div class="row mb-5">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-body yellow-bg text-center">
                    คลินิกรออนุมัติ ( <?php echo $countData; ?> )
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card ">
                <div class="card-body yellow-bg text-center">
                    คลินิกที่อนุมัติแล้ว ( <?php echo $countDataApprove; ?> )
                </div>
            </div>
        </div>

    </div>
    <div class="container" style="display:flex">

        <img src="./image/place-order-1.png" alt="รูปภาพใบสั่ง" style="width: 30px; height: 33px;">
        <center>
            <p>Clinic</p>
        </center>
    </div>
    <div class="row mb-5">
        <div class="col">
            <div class="center-card2">
                <div class="card ">
                    <div class="card-body yellow-bg text-center">
                        <?php

                        if (!isset($hotelData['status'])) {
                            foreach ($hotelData as $hotel) {
                                if (is_array($hotel) && isset($hotel['verify']) && $hotel['verify'] == 'waite') {
                                    $image = getNameimage($hotel['id']);
                                    $curl = curl_init();
                                    curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/get-images',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => '{"name": "' . $image . '"}', // ส่งชื่อไฟล์รูปภาพในรูปแบบ JSON
                                        CURLOPT_HTTPHEADER => array(
                                            'Content-Type: application/json',
                                            'Authorization: Bearer ' . $token
                                        ),
                                    ));

                                    $img_pet_data = curl_exec($curl);

                                    if (curl_errno($curl)) {
                                        echo 'Curl error: ' . curl_error($curl);
                                    }

                                    // แปลงข้อมูลไบนารีเป็น base64
                                    $base64_image = base64_encode($img_pet_data);

                                    // สร้าง URL ของรูปภาพ
                                    $image_src = 'data:image/jpeg;base64,' . $base64_image;

                                    curl_close($curl);


                        ?>
                                    <a href="detailverify.php?id=<?php echo $hotel['id']; ?>" style="text-decoration: none;color: black;">
                                        <div class="row " style="margin: 20px 10px;  border-radius: 1%; background-color: rgba(255, 242, 207, 0.836); box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                                            <div class="yellow-bg2" style="border-top:5px solid white;">
                                                <h5 style="margin: 5px 0px; "><?php echo $hotel['hotelName']; ?></h5>
                                            </div>

                                            <div class="col-md-6" style="width:30% ">

                                                <img src="<?php echo $image_src; ?>" alt="Hotel Image" width="100%">

                                            </div>
                                            <div class="col-md-6" style="text-align: left;">
                                                <p style="font-weight: bold;">รายละเอียดคลินิก</p>
                                                <p>ที่ตั้ง : <?php echo $hotel['location']; ?></p>
                                                <p>Email : <?php echo $hotel['email']; ?></p>
                                                <p>โทร : <?php echo $hotel['hotelTel']; ?></p>
                                                <p>เลขที่ใบอนุญาต : <?php echo $hotel['additionalNotes']; ?></p>
                                            </div>
                                        </div>
                                    </a>
                        <?php }
                            }
                        } else {
                            echo "No hotel data found.";
                        }



                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>