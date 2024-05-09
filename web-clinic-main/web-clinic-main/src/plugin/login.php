<div class="row">
  <div class="center-card">
    <div class="col-md-6 mx-auto">
    <div class="card" style="max-width: 1000px; margin: 0 auto; background-color: rgb(255, 221, 127);">
        <div class="card-body text-center">
          <form action="./api/apiLogin.php" method="post">

          <strong><label for="inputUsername" class="form-label">ชื่อผู้ใช้</label></strong>
            <center>
              <input type="text" name="userName" id="inputUsername" class="form-control" maxlength="24">
            </center>
            <strong><label for="inputPassword" class="form-label">รหัสผ่าน</label></strong>
            <center>
              <input type="password" name="passWord" id="inputPassword" class="form-control" aria-describedby="passwordHelpBlock" maxlength="24" placeholder="รหัสผ่านต้องมีความยาว 8-24 ตัว">
            </center>
            <div class="btn-container"><br>
              <button type="submit" name="submit" class="btn btn-primary" style="width: 150px;">เข้าสู่ระบบ</button>
              &nbsp;
              <a href="./location.php" class="btn btn-primary" style="width: 150px;">สมัครสมาชิก</a>
            </div><br>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>