<?php
session_start();
if (!isset($_SESSION['token'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: ../index.php');
} else {
  $token = $_SESSION['token'];
  $response;
  //echo $token;
}




?>


<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lovely Pet</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./css/backgroud.css">
  <link rel="stylesheet" href="./css/images.css">
  <link rel="stylesheet" href="./css/spec.css">
  <link rel="stylesheet" href="./css/font.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="t1">
  <header>
    <nav class="navbar fixed-top">
      <div class="container-fluid d-flex align-items-center">
        <div class="col-md-4">
          <div class="logo-container d-flex align-items-center">
            <img src="./image/logo.png" alt="Lovely Pet" style="width: 70px; height: auto;">
            <a style="color: back; font-size: 24px; margin-left: 10px;"><strong>LOVELY PET</strong></a>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center">
          <div class="dashboard-container">
            <a style="color: black; font-size: 24px;"><strong>เปลี่ยนรหัสผ่าน</strong></a>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
          <div class="ml-auto">
            <!-- เพิ่มปุ่มออกจากระบบ -->
            <a href="../logout.php" class="btn btn-outline-light">ออกจากระบบ</a>
          </div>
        </div>
      </div>
    </nav>
  </header>




  <main>
    <section class="container">
      <br><br><br><br>
      <div class="row justify-content-center">
        <div class="col">
          <div class="center-card2">
            <div class="card ">
              <div class="card-body yellow-bg text-center">
                <form action="" method="post">
                  <center>
                    <label>แก้ไขรหัสผ่านของท่าน
                      <br>
                      <img src="./image/key.gif" alt="verify_error" style="width: 50px; height: auto;"><br><br>
                      <label class="form-label">รหัสผ่านเดิม</label>
                      <center>
                        <input type="password" name="oldPassword" class="form-control" maxlength="24" style="width: 300px;" placeholder="กรุณากรอกรหัสผ่านเดิม"><br>
                      </center>
                      <label for="inputPassword" class="form-label">รหัสผ่านใหม่</label>
                      <center>
                        <input type="password" name="newpassword1" class="form-control" maxlength="24" style="width: 300px;" placeholder="กรุณากรอกรหัสผ่านใหม่"><br>
                      </center>
                      <label for="inputPassword" class="form-label">ยืนยันรหัสผ่านใหม่</label>
                      <center>
                        <input type="password" name="newpassword2" class="form-control" maxlength="24" style="width: 300px;" placeholder="กรุณากรอกรหัสผ่านใหม่อีกครั้ง"><br><br>
                      </center>
                      <div class="btn-container">
                        <a href="./dashboard.php" style="width: 150px;" class="btn btn-danger">กลับสู่หน้าหลัก</a>&nbsp;
                        <button type="submit" name="submit" style="width: 150px;" class="btn btn-primary wider-btn1 t1">ตกลง</button>
                      </div>
                  </center>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>
<?php
// ตรวจสอบว่ามีการส่งค่าผ่านแบบ POST มาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // รับค่ารหัสผ่านเดิมที่ผู้ใช้ป้อน
  $oldPassword = $_POST['oldPassword'];

  // รับค่ารหัสผ่านใหม่ที่ผู้ใช้ป้อน
  $newPassword1 = $_POST['newpassword1'];

  // รับค่ารหัสผ่านใหม่ (ยืนยัน) ที่ผู้ใช้ป้อน
  $newPassword2 = $_POST['newpassword2'];



  // เปรียบเทียบรหัสผ่านใหม่และยืนยันรหัสผ่านใหม่
  if ($newPassword1 === $newPassword2) {
    // ทำสิ่งที่ต้องการเมื่อรหัสผ่านตรงกัน

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/reset-password',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{"oldPassword":"' . $oldPassword . '",
       "newPassword":"' . $newPassword2 . '"}',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    //echo $response;
    // ตรวจสอบว่ารหัสผ่านเดิมถูกต้องหรือไม่
    // โดยในที่นี้คุณสามารถเปรียบเทียบกับค่าของรหัสผ่านเดิมในฐานข้อมูลหรือตามที่คุณต้องการ
    // เช่นถ้ามีการใช้งานฐานข้อมูล คุณสามารถดึงรหัสผ่านเดิมของผู้ใช้จากฐานข้อมูลแล้วทำการเปรียบเทียบ


    if ($response === 'Successful password reset') {
      // ทำสิ่งที่ต้องการเมื่อรหัสผ่านเดิมถูกต้อง
      //echo "รหัสผ่านเดิมถูกต้อง และรหัสผ่านใหม่ตรงกัน";
?>
      <div>
        <script>
          swal({
            title: "รหัสผ่านถูกเปลี่ยนแล้ว",
            text: "!! ใช้งานต่อเลย !!",
            icon: "success"
          }).then((value) => {
            // ไปยังหน้า dashboard.php
            window.location.href = "dashboard.php";
          });
        </script>
      </div>
    <?php
    } else {
      // กรณีรหัสผ่านเดิมไม่ถูกต้อง
    ?>
      <div>
        <script>
          swal({
            title: "รหัสผ่านเดิมไม่ถูกต้อง",
            text: "!! โปรดลองใหม่อีกครั้ง !!",
            icon: "error"
          }).then((value) => {
            // ไปยังหน้า dashboard.php
            window.location.href = "reset_password.php";
          });
        </script>
      </div>
    <?php
    }
  } else {
    // กรณีรหัสผ่านใหม่ไม่ตรงกัน
    ?>
    <div>
      <script>
        swal({
          title: "รหัสผ่านใหม่ไม่ตรงกัน",
          text: "!! โปรดลองใหม่อีกครั้ง !!",
          icon: "error"
        }).then((value) => {
          // ไปยังหน้า dashboard.php
          window.location.href = "reset_password.php";
        });
      </script>
    </div>
<?php
  }
}
?>