<?php
$id = $_GET['id'];
$serviceName = $_GET['name'];
$price = $_GET['price'];
?>


<script>
    console.log(" <?php echo $serviceName  ?>")
</script>

<main style="max-width: 1600px; padding-top: 50px; margin: auto;">
    <section class="container">
        <div class="row">
            <div class="center-card">
                <div class="col-md-6 mx-auto">
                    <div class="container" style="display:flex">
                        <img src="./image/change-password-5.png" alt="รูปภาพใบสั่ง" style="width: 30px; height: 33px;">
                        <center>
                            <p>Edit Servises</p>
                        </center>
                    </div>
                    <div class="card ">

                        <div class="card-body margin-left: auto;  yellow-bg">
                            <form action="./plugin/editservice_back.php" method="post">
                                <!-- แก้ไขโค้ด JavaScript เพื่อให้แสดงรูปภาพ -->
                                <script>

                                </script>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="inputPassword" class="form-label" style="text-align: left;">ชื่อบริการเสริม</label>
                                        <input type="text" name="serviceName" id="inputPassword" class="form-control" style="width: 100%;" placeholder="ชื่อบริการ" value="<?php echo $serviceName ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputUsername" class="form-label" style="text-align: left;">ราคา</label>
                                        <input type="text" name="price" id="inputUsername" class="form-control" style="width: 100%;" placeholder="ราคา/หน่วย" value="<?php echo $price ?>">
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
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
