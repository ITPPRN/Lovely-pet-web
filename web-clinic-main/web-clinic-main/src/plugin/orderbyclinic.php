<div class="row container center-card col-md-12 mx-auto card" style="background-color: transparent; border: none; margin-top: 150px;">
<?php include('card_rowfororder1.php'); ?>
    <div class="container" style="display:flex">
        <img src="./image/place-order-1.png" alt="รูปภาพใบสั่ง" style="width: 30px; height: 33px;">
        <center>
            <p>การจองโดยหน้าร้าน</p>
        </center>
    </div>
    <div class="row mb-5">
        <div class="col">
            <?php
            // Convert JSON data to associative array
            $order_all_data = json_decode($order_all, true);
            // Check if there is any data available
            if (!empty($order_all_data)) {
                // Check if status is 417
                if (isset($order_all_data['status']) && $order_all_data['status'] === 417) {
                    echo '<div class="row justify-content-center">
                            <div class="col">
                                <div class="center-card2">
                                    <div class="card ">
                                        <div class="card-body yellow-bg text-center">
                                            <center>
                                                <label><h3>ยังไม่มีการจอง</h3></label>
                                                <br>
                                                <img src="./image/mawnoon1.png" alt="verify_error" style="width: 150px; height: auto;">
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                } else {
                    // Loop through the data
                    foreach ($order_all_data as $order) {
                        // Check if the order is approved
                        if ($order['state'] === "approve") {
                            // Process only approved orders
                            $date_without_time = substr($order['date'], 0, 10);
                            // Check if additional service is set
                            $additional_service = isset($order['addSer']) ? $order['addSer'] : "ไม่มีบริการเสริม";
                            // Check if there is an image for the pet
                            $image_src = ''; // Default empty image source

                            // Display the data inside the card body
                            echo '<div class="center-card2">
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
                                                                            <p style="text-align: left;">ผู้ใช้บริการ: ' . $order['user'] . '</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="firstname"><strong>ข้อมูลการจอง</strong></label>
                                                                            <p style="text-align: left;">วันที่เข้าพัก: ' . $order['bookingStartDate'] . ' ถึง ' . $order['bookingEndDate'] . '</p>
                                                                            <p style="text-align: left;">วันที่ทำการจอง: ' . $date_without_time . '</p>
                                                                            <p style="text-align: left;">หมายเลขห้อง: ' . $order['roomNumber'] . '</p>
                                                                            <p style="text-align: left;">บริการเสริม: ' . $additional_service . '</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="lastname"><strong>ข้อมูลสัตว์เลี้ยง</strong></label><br>';

                            echo '<p style="text-align: center;">ชื่อ: ' . $order['pet'] . '</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="lastname"><strong>สรุปยอดเงิน</strong></label>
                                                                            <p style="text-align: left;">ค่าบริการหลัก: ' . $order['price'] . ' บาท' . '</p>';
                           
                            echo '<p style="text-align: left;">ยอดรวมทั้งหมด: ' . $order['price'] . ' บาท' . '</p>';
                            // Check payment method
                            echo '<p style="text-align: left;">' . $order['paymentMethod'] . '</p>';
                            echo '
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 text-center">
                                                                    <form action="" method="post">
                                                                        <input type="hidden" name="data1" value="' . $order['id'] . '">
                                                                        <input type="submit" name="submit1" class="btn btn-success btn-lg" style="width: 200px;" value="สำเร็จ">
                                                                        <input type="submit" name="submit2" class="btn btn-danger btn-lg" style="width: 200px;" value="ยกเลิก">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                    }
                }
            } else {
                // If there is no data available
                echo '<div class="row justify-content-center">
                        <div class="col">
                            <div class="center-card2">
                                <div class="card ">
                                    <div class="card-body yellow-bg text-center">
                                        <center>
                                            <label><h3>ไม่มีการจองจากลูกค้า</h3></label>
                                            <br>
                                            <img src="./image/mawnoon1.png" alt="verify_error" style="width: 150px; height: auto;">
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit1'])) {
    // If submit1 button is clicked (approve)
    $data1 = $_POST['data1'];
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend-application.pcnone.com/booking/update-booking-by-clinic',
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
    echo '<script>window.location.href = "oderbyclinic.php";</script>';
} elseif (isset($_POST['submit2'])) {
    // If submit2 button is clicked (disapprove)
    $data1 = $_POST['data1'];
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend-application.pcnone.com/booking/update-booking-by-clinic',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "id":' . $data1 . ',"state":"cancel"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    echo '<script>window.location.href = "oderbyclinic.php";</script>';
}
?>
