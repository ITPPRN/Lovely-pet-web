<div class="row container center-card col-md-12 mx-auto card" style="background-color: transparent; border: none; margin-top: 150px;">
    <?php include('card_row2.php'); ?>
    <div class="container" style="display:flex">

        <img src="./image/place-order-1.png" alt="รูปภาพใบสั่ง" style="width: 30px; height: 33px;">
        <center>
            <p>&nbsp; &nbsp;รายการจองที่อนุมัติ</p>
        </center>
    </div>
    <div class="row mb-5">
        <div class="col">



            <?php
            // Convert JSON data to associative array
            $order_all_data = json_decode($order_all, true);
            if (!isset($order_all_data['status'])) {
                // Check if there is any data available
                if (!empty($order_all_data)) {
                    $has_wait_data = false; // เริ่มต้นตั้งค่าว่ายังไม่มีข้อมูล "approve"
                    // Loop through the data
                    foreach ($order_all_data as $order) {
                        if ($order['state'] === "approve") {
                            $has_wait_data = true;
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
                                    "id":'.$order['pet']['id'].'
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
                            <div class="center-card2"><a href="detail.php?id='.$order['id'].'" style="text-decoration: none;color: black;">
                            <div class="card">
                                <div class="card-body yellow-bg text-center">
                                            <div class="row mb-5">
                            <div class="col">
                                                            
            
                                    <div class="card">
                                        <div class="card-body yellow-bg text-center">
                                        <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                            <label class="form-label"><strong>ข้อมูลผู้ใช้บริการ</strong></label><br>
                                            <img class="rounded-circle mb-3 mt-4" src="' . $image_src . '" height="100" width="100" alt="" />
                                            <p style="text-align: center;">ผู้ใช้บริการ: ' . $order['user']['name'] . '</p>
                                            <p style="text-align: center;">อีเมล: ' . $order['user']['email'] . '</p>
                                            <p style="text-align: center;">โทร: ' . $order['user']['phoneNumber'] . '</p>
                                            
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="firstname"><strong>ข้อมูลการจอง</strong></label>
                                                <p style="text-align: left;">หมายเลขการจอง: ' . $order['id'] . '</p>
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
                                     
                                        <div class="mb-3 text-center">
                    <form action="" method="post">
    <input type="hidden" name="data1" value="' . $order['id'] . '">
    <input type="submit" name="submit1" class="btn btn-success btn-lg" style="width: 200px;" value="สำเร็จ"><br><br>
    <input type="submit" name="submit2" class="btn btn-danger btn-lg" style="width: 200px;" value="ยกเลิก">
</form>
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
        </div><br>';
                        }
                    }
                    if (!$has_wait_data) {

                        echo '<br><br><br><br><div class="row justify-content-center">
        <div class="col">
            <div class="center-card2">
                <div class="card ">
                    <div class="card-body yellow-bg text-center">
                    <center>

                        <label><h3>ไม่มีข้อมูลให้อนุมัติ</h3>
<br>
<img src="./image/mawnoon1.png" alt="verify_error" style="width: 150px; height: auto;">
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>';
                    }
                } else {
                    ?>
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <center>
                                <h3 class="card-title">ไม่พบข้อมูล</h3>
                            </center>
                        </div>
                    </div>
                <?php
                }
            }  else if ($order_all_data['status'] == 417) {
                ?>
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <center>
                                <h3 class="card-title">ไม่พบข้อมูล error 417</h3>
                            </center>
                        </div>
                    </div>
                <?php
                }
                
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
    "id":' . $data1 . ',"state":"complete"
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
    echo '<script>window.location.href = "approve.php";</script>';
} elseif (isset($_POST['submit2'])) {
    // ถ้าปุ่ม submit2 ถูกกด disapproval
    $data1 = $_POST['data1'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend-application.pcnone.com/booking/cancel',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "idBooking":' . $data1 . '
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
    echo '<script>window.location.href = "approve.php";</script>';
}
?>