<div class="row container center-card col-md-9 mx-auto card" style="background-color: transparent; border: none; margin-top: 150px;">

    <div class="container d-flex justify-content-between align-items-center mb-3">
        <div style="display:flex">
            <img src="./image/donation_903608.png" alt="รูปภาพใบสั่ง" style="width: 30px; height: 33px;">
            <center>
                <p>ห้อง</p>
            </center>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <a class="btn btn-success wider-btn1" href="addroom.php">เพิ่มห้อง</a>

        </div>
    </div>
    <div class="row mb-5">
        <div class="col">
            <div class="center-card2">
                <div class="card">
                    <div class="card-body yellow-bg text-center">
                        <?php
                        // Your PHP code to fetch data from database
                        // Assuming you have $data variable containing fetched data
                        // Check if there is any data available
                        if ($data) {
                            // Loop through the data
                            foreach ($data as $row) {
                                
                                $id_room_img = $row['id'];
                                //เอาชื่อภาพ
                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => 'https://backend-application.pcnone.com/room/get-images-url',
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => '',
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 0,
                                    CURLOPT_FOLLOWLOCATION => true,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => 'POST',
                                    CURLOPT_POSTFIELDS => '{
  "id":' . $id_room_img . '
}',
                                    CURLOPT_HTTPHEADER => array(
                                        'Content-Type: application/json',
                                        'Authorization: Bearer ' . $token
                                    ),
                                ));
                                $response1 = curl_exec($curl);
                                curl_close($curl);
                                $response_array1 = json_decode($response1, true);

                                if (isset($response_array1[0]) && !is_null($response_array1[0])) {
                                    // $response_array1[0] เป็น null
                                    
                                    $img1 = $response_array1[0];
                                    //เอาภาพมาแสดงถอดรหัส ภาพ1
                                    $curl = curl_init();
                                    curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://backend-application.pcnone.com/room/get-images',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => '{"namePhoto":"' . $img1 . '"}',
                                        CURLOPT_HTTPHEADER => array(
                                            'Content-Type: application/json',
                                            'Authorization: Bearer ' . $token
                                        ),
                                    ));
                                    $img_slp1 = curl_exec($curl);
                                    // แปลงข้อมูลไบนารีเป็น base64
                                    curl_close($curl);
                                    $base64_image1 = base64_encode($img_slp1);
                                    // สร้าง URL ของรูปภาพ
                                    $image_slp_src1 = 'data:image/jpeg;base64,' . $base64_image1;
                                }

                                // Display the data inside the card body
                        ?>
                                <div class="col md-4">
                                    
                                    <div class="card">
                                        <div class="card-body">
                                        <img src="<?php echo $image_slp_src1 ?>" width="250px">
                                            <div class="row">
                                                <h5 class="card-title">ห้องหมายเลข <?php echo $row['roomNumber']; ?></h5>
                                                <p class="card-text">รายละเอียด: <?php echo $row['roomDetails']; ?></p>
                                                <p class="card-text">ประเภทห้อง: <?php echo $row['type']; ?></p>
                                                <p class="card-text">ราคา: <?php echo $row['roomPrice']; ?></p>
                                                <p class="card-text">สถานะ: <?php echo $row['status']; ?></p>
                                                <!-- Add more details as needed -->
                                                <div class="col-md-6">
                                                    <a href="./updateroom.php?id=<?php echo $row['id'] ?>&roomNumber=<?php echo $row['roomNumber']; ?>&roomDetails=<?php echo $row['roomDetails']; ?>&type=<?php echo $row['type']; ?>&roomPrice=<?php echo $row['roomPrice']; ?>&status=<?php echo $row['status']; ?>">
                                                        <button class="btn btn-primary btn-block edit-btn" data-toggle="modal">แก้ไข</button>
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="./plugin/deleteroom_back.php?data=<?php echo $row['id'] ?>">
                                                        <button class="btn btn-danger btn-block">ลบ</button>
                                                    </a>

                                                </div>
                                                
                                        
                                            </div>
                                        </div>
                                    </div><br>


                            <?php
                                $img1 = "";
                                $image_slp_src1 = "";
                            }
                        } else {
                            // If there is no data available
                            echo "<p class='col-12 text-center'>No data available</p>";
                        }
                            ?>

                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>