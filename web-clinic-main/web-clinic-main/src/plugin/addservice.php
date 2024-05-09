<?php
if (isset($_POST['submit'])) {
    $serviceName = $_POST['serviceName']; // Get the service name from the form
    $price = $_POST['price'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend-application.pcnone.com/additional-service/add-service',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "name":"' . $serviceName . '",
        "price":'. $price .'
    }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '. $token
        ),
    ));

    $response = curl_exec($curl);

    // Check if API call was successful
    if ($response !== false) {
        // Redirect to another page after successful API call
        echo "<script>window.location.href = './service.php';</script>";
        exit;
    } else {
        // Handle error if API call failed
        echo "API call failed!";
    }

    curl_close($curl);
}
?>

<main style="max-width: 1600px; padding-top: 50px; margin: auto;">
    <section class="container">
        <div class="row">
            <div class="center-card">
                <div class="col-md-6 mx-auto">
                    <div class="container" style="display:flex">
                        <img src="./image/change-password-5.png" alt="รูปภาพใบสั่ง" style="width: 30px; height: 33px;">
                        <center>
                            <p>เพิ่มบริการเสริม</p>
                        </center>
                    </div>
                    <div class="card ">

                        <div class="card-body margin-left: auto;  yellow-bg">
                            <form action="" method="post" onsubmit="return validateForm()">
                                <!-- แก้ไขโค้ด JavaScript เพื่อให้แสดงรูปภาพ -->
                                <script>

                                </script>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="inputPassword" class="form-label" style="text-align: left;">ชื่อบริการเสริม</label>
                                        <input type="text" name="serviceName" id="inputPassword" class="form-control" style="width: 100%;" placeholder="ชื่อบริการ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputUsername" class="form-label" style="text-align: left;">ราคา</label>
                                        <input type="text" name="price" id="inputUsername" class="form-control" style="width: 100%;" placeholder="ราคา/หน่วย">
                                    </div>
                                </div>
                                <div class="btn-container center-text" style="margin-top: 30px; text-align: center;">
                                    <a href="./service.php" class="btn btn-secondary btn-danger" style="width: 100px;">ยกเลิก</a>
                                    &nbsp;
                                    <button type="submit" name="submit" class="btn btn-success wider-btn1 t1" style="width: 100px;">ยืนยัน</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    function validateForm() {
        var serviceName = document.getElementById('inputPassword').value;
        var price = document.getElementById('inputUsername').value;

        if (serviceName.trim() == '' || price.trim() == '') {
            alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');
            return false;
        }
        return true;
    }
</script>