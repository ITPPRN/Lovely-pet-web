<div class="row container center-card col-md-12 mx-auto card" style="background-color: transparent; border: none; margin-top: 150px;">
    <div class="container" style="display:flex">

        <img src="./image/place-order-1.png" alt="รูปภาพใบสั่ง" style="width: 30px; height: 33px;">
        <center>
            <p> &nbsp; &nbsp;รายละเอียดการจอง</p>
        </center>
    </div>
    <div class="row mb-5">
        <div class="col">
            <?php
            // Convert JSON data to associative array
            $order = json_decode($order_all, true);


                            $date_without_time = substr($order['date'], 0, 10);


                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://backend-application.pcnone.com/pet/get-images',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => '{
                                        "id":' . $order['pet']['id'] . '
                                    }',
                                CURLOPT_HTTPHEADER => array(
                                    'Content-Type: application/json',
                                    'Authorization: Bearer ' . $token
                                ),
                            ));


                            $img_pet_data = curl_exec($curl);


                            // แปลงข้อมูลไบนารีเป็น base64
                            $base64_image = base64_encode($img_pet_data);

                            // สร้าง URL ของรูปภาพ
                            $image_src = 'data:image/jpeg;base64,' . $base64_image;





                            // Display the data inside the card body
                            echo '
                            <div class="center-card2">
                <div class="card">
                    <div class="card-body yellow-bg text-center">
                                
                                
                                
                                <div class="row mb-5">
                <div class="col">
                    <div class="center-card2">
                        <div class="card">
                            <div class="card-body yellow-bg text-center">
                            <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                <label class="form-label"><strong>ข้อมูลผู้ใช้บริการ</strong></label>
                                <p style="text-align: left;">ผู้ใช้บริการ: ' . $order['user']['name'] . '</p>
                                <p style="text-align: left;">อีเมล: ' . $order['user']['email'] . '</p>
                                <p style="text-align: left;">โทร: ' . $order['user']['phoneNumber'] . '</p>
                                
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="firstname"><strong>ข้อมูลการจอง</strong></label>
                                    <p style="text-align: left;">วันที่เข้าพัก: ' . $order['bookingStartDate'] . ' ถึง ' . $order['bookingEndDate'] . '</p>
                                    <p style="text-align: left;">วันที่ทำการจอง: ' . $date_without_time . '</p>
                                    <p style="text-align: left;">หมายเลขห้อง: ' . $order['roomNumber'] . '</p>';
                            // ตรวจสอบว่าอาร์เรย์ไม่ใช่ null ก่อนที่จะเข้าถึงตัวชี้ของอาร์เรย์
                            if (!is_null($order) && isset($order['addSer']['name'])) {
                                // ทำสิ่งที่คุณต้องการกับ $order['addSer']['name']
                                echo '<p style="text-align: left;">บริการเสริม: ' . $order['addSer']['name'] . '</p>';
                            } else {
                                // จัดการกับกรณีที่ข้อมูลไม่พร้อมใช้งาน
                                echo '<p style="text-align: left;">บริการเสริม: ไม่มีบริการเสริม</p>';
                            }

                            echo '</div>

                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="lastname"><strong>ข้อมูลสัตว์เลี้ยง</strong></label><br>
                                 
                                                
                                                    <img class="rounded-circle mb-3 mt-4" src="' . $image_src . '" height="160" width="160" alt="" />

                                    <p style="text-align: center;">ชื่อ: ' . $order['pet']['petName'] . '</p>
                                    <p style="text-align: center;">วันเกิด: ' . $order['pet']['birthday'] . '</p>
                                    <p style="text-align: center;">ประเภท: ' . $order['pet']['petTyName'] . '</p>
                                    
                                </div>
                            </div>
                            <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="lastname"><strong>สรุปยอดเงิน</strong></label>
                                <p style="text-align: left;">ค่าบริการหลัก: ' . $order['price'] . ' บาท' . '</p>';
                            // ตรวจสอบว่าอาร์เรย์ไม่ใช่ null ก่อนที่จะเข้าถึงตัวชี้ของอาร์เรย์
                            if (!is_null($order) && isset($order['addSer']['price'])) {
                                // ทำสิ่งที่คุณต้องการกับ $order['addSer']['name']
                                echo '<p style="text-align: left;">ค่าบริการเสริม: ' . $order['addSer']['price'] . ' บาท' . '</p>';
                            } else {
                                // จัดการกับกรณีที่ข้อมูลไม่พร้อมใช้งาน
                                echo '<p style="text-align: left;">ค่าบริการเสริม: ไม่มีค่าบริการ</p>';
                            }


                            // ตรวจสอบว่าอาร์เรย์ไม่ใช่ null ก่อนที่จะเข้าถึงตัวชี้ของอาร์เรย์
                            if (!is_null($order) && isset($order['price'])) {
                                // คำนวณยอดรวมโดยรวมค่าบริการหลักและค่าบริการเสริม
                                $total_price = $order['price'];
                                if (isset($order['addSer']['price'])) {
                                    $total_price += $order['addSer']['price'];
                                }

                                // แสดง tag <p> สำหรับยอดรวมทั้งหมด
                                echo '<p style="text-align: left;">ยอดรวมทั้งหมด: ' . $total_price . ' บาท' . '</p>';
                            } else {
                                // จัดการกรณีที่ไม่มีข้อมูลหรือไม่พร้อมใช้งาน
                                echo '<p style="text-align: left;">ยอดรวมทั้งหมด: ไม่สามารถคำนวณได้</p>';
                            }
                            if ($order['paymentMethod'] == 'Pay with mobile banking') {
                                // ถ้า paymentMethod มีค่าเป็น 'Pay with mobile banking' ให้แสดงข้อความตามที่ต้องการ
                                echo '<p style="text-align: left;">มีการชำระเงินด้วยมือถือแบงก์กิ้ง</p>';


                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => 'https://backend-application.pcnone.com/booking/get-images',
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => '',
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 0,
                                    CURLOPT_FOLLOWLOCATION => true,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => 'POST',
                                    CURLOPT_POSTFIELDS => '{"idBooking":'.$order['id'].'}',
                                    CURLOPT_HTTPHEADER => array(
                                        'Content-Type: application/json',
                                        'Authorization: Bearer ' . $token
                                    ),
                                ));

                                $img_slp = curl_exec($curl);


                                // แปลงข้อมูลไบนารีเป็น base64
                                $base64_image1 = base64_encode($img_slp);

                                // สร้าง URL ของรูปภาพ
                                $image_slp_src = 'data:image/jpeg;base64,' . $base64_image1;

                                echo '<img class="mb-3 mt-4" src="' . $image_slp_src . '" height="auto" width="160" alt="" />';
                            } else {
                                // ถ้า paymentMethod ไม่ใช่ 'Pay with mobile banking' สามารถจัดการตามเงื่อนไขเพิ่มเติมได้
                                echo '<p style="text-align: left;">ไม่มีการชำระเงินด้วยมือถือแบงก์กิ้ง</p>';
                            }
                            echo '
                            </div>
                        
                        </div>
                        
                        ';

                            echo '</div><br><br><br>
                   
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div><br>
';

                            echo '</div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div><br>';
                                

            ?>

        </div>
    </div>



</div>

<?php
if (isset($_POST['submit1'])) {
    // ถ้าปุ่ม submit1 ถูกกด approve
    $data1 = $_POST['data1'];
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend-application.pcnone.com/booking/consider-booking',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
    "id":' . $data1 . ',"state":"approve"
}',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    //echo $response;
    // เรียกหน้าเองอีกครั้ง
    echo '<script>window.location.href = "dashboard.php";</script>';
} elseif (isset($_POST['submit2'])) {
    // ถ้าปุ่ม submit2 ถูกกด disapproval
    $data1 = $_POST['data1'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend-application.pcnone.com/booking/consider-booking',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "id":' . $data1 . ',"state":"disapproval"
    }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    //echo $response;
    // เรียกหน้าเองอีกครั้ง
    echo '<script>window.location.href = "dashboard.php";</script>';
}
?>