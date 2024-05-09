<main style="max-width: 800px; margin: auto;">
    <section class="container" style="max-width: 800px; margin-left: auto; margin-left: auto;">
        <div class="row">
            <div class="center-card">
                <div class="col-md-6 mx-auto">
                <div class="container" style="display:flex">
      
      <img src="./image/change-password-5.png" alt="รูปภาพใบสั่ง" style="width: 30px; height: 33px;">
      <center>
          <p>Edit Password</p>
      </center>
      </div>
                    <div class="card ">
                        <div class="col-md-3 align-self-start w-100">
                            <div class="card ">
                                <div class="card-body text-center top yellow-bg2">
                                    <h3 id="logoFont">
                                        แก้ไขรหัสผ่าน
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body margin-left: auto; margin-left: auto; yellow-bg">

                            <form action="./api/apiRegister.php" method="post">
                                <label for="inputUsername" class="form-label" style=" text-align: left; margin-left: 30px;">รหัสผ่านเก่า</label>
                                <center>
                                    <input type="text" id="inputUsername" class="form-control" minlength="8" maxlength="24" style="width: 300px;" placeholder="username">
                                </center>
                                <label for="inputPassword" class="form-label" style=" text-align: left; margin-left: 30px; margin-top: 20px;">รหัสผ่านใหม่</label>
                                <center>
                                    <input type="password" id="inputPassword" class="form-control" aria-describedby="passwordHelpBlock" minlength="8" maxlength="24" style="width: 300px;" placeholder="Password">
                                </center>
                                <label for="confirmPassword" class="form-label" style=" text-align: left; margin-left: 30px; margin-top: 20px;">ยืนยันรหัสผ่านใหม่</label>
                                <center>
                                    <input type="password" id="confirmPassword" class="form-control" minlength="8" maxlength="24" style="width: 300px;" placeholder="Confirm Password" oninput="checkPasswordMatch()">
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
    </section>
</main>