<?php
session_start();
if (isset($_SESSION['error_message'])) {
?>
  <div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      swal({
        title: "ไม่สามารถเข้าสู่ระบบได้",
        text: "!! โปรดตรวจสอบ Username password !!",
        icon: "error"
      }).then((value) => {
        // ไปยังหน้า dashboard.php
        window.location.href = "index.php";
      });
    </script>
  </div>
<?php
  unset($_SESSION['error_message']); // เมื่อแสดงข้อความแล้วให้ลบข้อความทิ้ง
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
  <script>
    // จัดการเหตุการณ์การกดปุ่มย้อนหลัง
    window.onload = function() {
      if (window.history && window.history.pushState) {
        window.history.pushState('forward', null, null);
        window.onpopstate = function() {
          window.history.pushState('forward', null, null);
          // ทำอย่างอื่น ๆ ที่คุณต้องการทำเมื่อผู้ใช้กดปุ่มย้อนหลัง
        };
      }
    }
  </script>

</head>

<body>
  <header>
    <?php include('./plugin/navbar.php'); ?>
  </header>

  <main>
    <section class="container t1">
      <?php include('./plugin/login.php'); ?>
    </section>
  </main>

</body>

</html>