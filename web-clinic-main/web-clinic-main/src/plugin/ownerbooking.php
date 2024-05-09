<?php

function getId($token){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/get-by-token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ),
    ));


    $data = curl_exec($curl);

    $tokendata = json_decode($data, true);
return $tokendata['id'];

}

function getservice(){
    $token = $_SESSION['token'];
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend-application.pcnone.com/additional-service/list-service-for-user',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
                        "id":'.getId($token).'
                    }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ),
    ));
    $data = curl_exec($curl);
    $httpInfo = curl_getinfo($curl);
    $httpResponseCode = $httpInfo['http_code']; // รหัสสถานะ HTTP


    if ($httpResponseCode != 200) {
        return  $dataservice='';
    }else{
        $dataservice = json_decode($data, true);
        return $dataservice;
    }

}


function getroom(){
    $token = $_SESSION['token'];   
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend-application.pcnone.com/room/list-state-room',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
                        "hotelId":'.getId($token).',
                        "status":"empty"
                    }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ),
    ));
 

    $data = curl_exec($curl);
    $httpInfo = curl_getinfo($curl);
    $httpResponseCode = $httpInfo['http_code']; // รหัสสถานะ HTTP


    if ($httpResponseCode != 200) {
        return  $dataRoom='';
    }else{
        $dataRoom = json_decode($data, true);
        return  $dataRoom;
    }
}




?>

<div class="row a">
    <div class="col-md-6 mx-auto">
        <form action="./api/apiBooking.php" method="post">
            <div class="card" style="margin-top:15%;">
                <div class="card-body yellow-bg">
                    <h5 class="card-title text-center"><strong>จองบริการโดยคลินิก</strong></h5>

                    <div class="form-group">
                        <label for="customerName">ชื่อลูกค้า:</label>
                        <input type="text" class="form-control" id="customerName" name="customerName" required>
                    </div><br>

                    <div class="form-group">
                        <label for="room">ห้องเลขที่:</label>
                        <select required name="room" id="room" class="form-control">
                            <option value="" disabled selected>--- โปรดเลือกห้อง ---</option>
                            <?php $dataRoom = getroom(); ?>
                            <?php if ($dataRoom): ?>
                            <?php foreach ($dataRoom as $room): ?>
                            <option name="room" value="<?php echo $room['id']. ' - ' . $room['roomPrice'] ; ?>">
                                <?php echo "ห้อง " . $room['roomNumber']. ' - ' . number_format($room['roomPrice'], 2); ?>
                            </option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option value="" disabled>ไม่มีข้อมูลห้อง</option>
                            <?php endif; ?>
                        </select>
                    </div><br>

                    <div class="form-group">
                        <label for="petName">ชื่อสัตว์เลี้ยง:</label>
                        <input required type="text" class="form-control" id="petName" name="petName">
                    </div><br>

                    <div class="form-group">
                        <label for="start">วันที่เข้าพัก:</label>
                        <input type="date" class="form-control" id="start" name="start" required>
                    </div><br>

                    <div class="form-group">
                        <label for="end">วันที่ออก:</label>
                        <input type="date" class="form-control" id="end" name="end" required>
                    </div><br>

                    <div class="form-group">
                        <label for="additionService">บริการเสริม:</label>
                        <select required name="additionService" class="form-control" id="additionService">
                            <option value="" disabled selected>--- โปรดเลือก ---</option>
                            <?php  $dataservice = getservice();?>
                            <?php if ($dataservice): ?>
                            <?php foreach ($dataservice as $data): ?>
                            <option value="<?php echo $data['name']. ' - ' . number_format($data['price'], 2); ?>">
                                <?php echo $data['name'] . ' - ' .number_format($data['price'], 2) . ' บาท'; ?></option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option value="" disabled>ไม่มีข้อมูลห้อง</option>
                            <?php endif; ?>
                        </select>

                    </div><br>

                    <div class="form-group">
                        <label for="total">ราคารวม:</label>
                        <input type="number" class="form-control" id="total" name="total" step="0.01">
                    </div><br>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">จอง</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
// หากมีการเปลี่ยนแปลงในการเลือกห้องหรือบริการเสริม
document.getElementById("room").addEventListener("change", calculateTotal);
document.getElementById("additionService").addEventListener("change", calculateTotal);
document.getElementById("start").addEventListener("change", calculateTotal);
document.getElementById("end").addEventListener("change", calculateTotal);

// ฟังก์ชันสำหรับคำนวณราคารวม
function calculateTotal() {
    var roomPriceInput = document.querySelector("#room");
    var splitRoomValues = roomPriceInput.value.split(' -');
    var roomPrice = splitRoomValues.length > 1 ? parseFloat(splitRoomValues[1]) : 0;

    var servicePriceInput = document.querySelector("#additionService");
    var splitServiceValues = servicePriceInput.value.split(' -');
    var servicePrice = splitServiceValues.length > 1 ? parseFloat(splitServiceValues[1]) : 0;

    var startDate = new Date(document.querySelector("#start").value);
    var endDate = new Date(document.querySelector("#end").value);

    var daysDifference = 1; // Default value in case of invalid dates

    if (startDate instanceof Date && !isNaN(startDate.getTime()) && endDate instanceof Date && !isNaN(endDate.getTime())) {
        var timeDifference = Math.abs(endDate.getTime() - startDate.getTime());
        daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24)) + 1;
    }

    var total = (roomPrice + servicePrice) * daysDifference;

    document.getElementById("total").value = total.toFixed(2);
}

// Call the calculateTotal function when the page is loaded
document.addEventListener("DOMContentLoaded", function () {
    calculateTotal();
});

</script>