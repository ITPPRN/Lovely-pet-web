<div class="row">
    <div class="center-card">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="col-md-3 align-self-start w-100">
                    <div class="card">
                        <div class="card-body text-center top yellow-bg2">
                        <h3><strong>
                                สมัครสมาชิก</strong>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body margin-left: auto; margin-left: auto;">
                    <form action="./api/apiRegister.php" method="post" enctype="multipart/form-data">
                        <strong><label for="inputUsername" class="form-label" style="text-align: left; margin-left: 30px;">ชื่อสถานบริการรับฝากสัตว์เลี้ยง</label></strong>
                        <center>
                            <input type="text" required name="data0" class="form-control" style="width: 300px;" placeholder="กรอกชื่อสถานบริการ"><br>
                        </center>
                        <strong><label for="inputUsername" class="form-label" style="text-align: left; margin-left: 30px;">ชื่อผู้ใช้</label></strong>
                        <center>
                            <input type="text" required name="data1" class="form-control" style="width: 300px;" placeholder="ชื่อผู้ใช้">
                        </center>
                        <strong><label for="inputPassword" class="form-label" style="text-align: left; margin-left: 30px; margin-top: 20px;">รหัสผ่าน</label></strong>
                        <center>
                            <input type="password" required name="data2" id="inputPassword" class="form-control" aria-describedby="passwordHelpBlock" minlength="8" maxlength="24" style="width: 300px;" placeholder="รหัสผ่าน">
                        </center>
                        <strong><label for="confirmPassword" class="form-label" style="text-align: left; margin-left: 30px; margin-top: 20px;">ยืนยันรหัสผ่าน</label></strong>
                        <center>
                            <input type="password" required id="confirmPassword" class="form-control" minlength="8" maxlength="24" style="width: 300px;" placeholder="ยืนยันรหัสผ่าน" oninput="checkPasswordMatch()">
                            <span id="passwordMatchError" style="color: red; display: none; font-size: 14px;">
                                รหัสผ่านไม่ตรงกัน กรุณาใส่รหัสผ่านอีกครั้ง
                            </span>
                        </center>
                        <script>
                            function checkPasswordMatch() {
                                var password = document.getElementById("inputPassword").value;
                                var confirmPassword = document.getElementById("confirmPassword").value;
                                var errorText = document.getElementById("passwordMatchError");

                                if (password !== confirmPassword) {
                                    errorText.style.display = "inline";
                                } else {
                                    errorText.style.display = "none";
                                }
                            }
                        </script>
                        <strong><label for="inputPassword" class="form-label" style="text-align: left; margin-left: 30px; margin-top: 20px;">อีเมล</label></strong>
                        <center>
                            <input type="email" required id="email" name="data3" class="form-control" style="width: 300px;" placeholder="อีเมล">
                        </center>
                        <strong><label for="inputPassword" class="form-label" style="text-align: left; margin-left: 30px; margin-top: 20px;">ข้อมูลที่อยู่สถานบริการ</label></strong>
                        <center>
                            <input type="text" required name="data7" class="form-control" style="width: 300px;" placeholder="บ้านเลขที่/หมู่">
                        </center>
                        <strong><label for="inputphoneclinic" class="form-label" style="text-align: left; margin-left: 30px; margin-top: 20px;">หมายเลขโทรศัพท์</label></strong>
                        <center>
                            <input type="text" required id="inputPassword" name="data4" class="form-control" aria-describedby="passwordHelpBlock" minlength="8" maxlength="10" style="width: 300px;" placeholder="012-345-6789">
                        </center>
                        <strong><label for="inputvarious" class="form-label" style="text-align: left; margin-left: 30px; margin-top: 20px;">หมายเลขใบอนุญาติให้เปิดบริการ</label></strong>
                        <center>
                            <input class="form-control" required name="data5" id="exampleFormControlTextarea1" style="width: 300px;" placeholder="กรุณากรอกหมายเลขใบอนุญาติให้เปิดบริการ">
                        </center>
                        <strong><label for="form-control" class="form-label" style="text-align: left; margin-left: 30px; margin-top: 20px;">รูปภาพคลินิก</label></strong>
                        <center>
                            <input class="form-control" required type="file" name="upload[]" multiple="multiple">
                        </center>
                        <div class="btn-container center-text" style="margin-top: 30px; text-align: center;">
                            <a href="./index.php" class="btn btn-secondary btn-danger" style="width: 100px;">ยกเลิก</a>
                            &nbsp;
                            <button type="submit" name="submit" class="btn btn-success wider-btn1 t1" style="width: 100px;">ยืนยัน</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>