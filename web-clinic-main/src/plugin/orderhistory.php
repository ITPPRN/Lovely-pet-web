<div class="row container center-card col-md-12 mx-auto card" style="background-color: transparent; border: none; margin-top: 150px;">
    <?php include('card_rowfororder2.php'); ?>
    <div class="container" style="display:flex">
        <img src="./image/place-order-1.png" alt="รูปภาพใบสั่ง" style="width: 30px; height: 33px;">
        <center>
            <p>ประวัตการจองโดยหน้าร้าน</p>
        </center>
    </div>
    <div class="row mb-5">
        <div class="col">
            <?php
            // Convert JSON data to associative array
            $order_all_data = json_decode($order_all, true);
            // Check if there is any data available
            if (!empty($order_all_data)) {
                if (isset($order_all_data['status']) && $order_all_data['status'] === 417) {
                    echo '<div class="row justify-content-center">
                            <div class="col">
                                <div class="center-card2">
                                    <div class="card ">
                                        <div class="card-body yellow-bg text-center">
                                            <center>
                                                <label><h3>ไม่พบข้อมูล</h3></label>
                                                <br>
                                                <img src="./image/mawnoon1.png" alt="verify_error" style="width: 150px; height: auto;">
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                } else 
                foreach ($order_all_data as $order) {
                    
                        $date_without_time = substr($order['date'], 0, 10);
                        $additional_service = isset($order['addSer']) ? $order['addSer'] : "ไม่มีบริการเสริม";
            
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
                        echo '<p style="text-align: left;">' . $order['paymentMethod'] . '</p>';
                        echo '
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 text-center">
                                                                
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
            } else {
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

