<main style="max-width: 1600px; padding-top: 50px; margin: auto;">
    <section class="container">
        <div class="row">
            <div class="center-card">
                <div class="col-md-6 mx-auto">
                    <div class="container" style="display:flex">
                        <img src="./image/change-password-5.png" alt="รูปภาพใบสั่ง" style="width: 30px; height: 33px;">
                        <center>
                            <p>เพิ่มห้อง</p>
                        </center>
                    </div>
                    <div class="card ">

                        <div class="card-body margin-left: auto; yellow-bg">
                            <form action="" method="post">
                                <div class="row mb-3">
                                    <label for="Details" class="form-label" style="text-align: left;">รายละเอียด</label>
                                    <input type="text" class="form-control" name="Details">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="price" class="form-label" style="text-align: left;">ราคา</label>
                                        <input type="number" id="price" name="price" class="form-control" style="width: 100%;" placeholder="ราคา/ห้อง">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="type" class="form-label" style="text-align: left;">ประเภทห้อง</label>
                                        <input type="text" id="type" name="type" class="form-control" style="width: 100%;" placeholder="ประเภทห้อง">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="total" class="form-label" style="text-align: left;">จำนวนห้อง</label>
                                        <input type="number" id="total" name="total" class="form-control" style="width: 100%;" placeholder="จำนวนห้อง">
                                    </div>
                                </div>
                                <div class="btn-container center-text" style="margin-top: 30px; text-align: center;">
                                    <a href="../room.php" class="btn btn-secondary btn-danger" style="width: 100px;">ยกเลิก</a>
                                    &nbsp;
                                    <button type="submit" name="submit" class="btn btn-success wider-btn1 t1" style="width: 100px;" onclick="getValue()">ยืนยัน</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>