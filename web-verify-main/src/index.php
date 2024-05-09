<?php 
ob_start();
session_start();

// Check if there is an error message in the URL query string
$error = isset($_GET['error']) ? $_GET['error'] : '';

// Function to display error message
function displayErrorMessage($error)
{
  switch ($error) {
    case 'invalid_response':
      echo "<p style='color: red;'>Error: Invalid response from server</p>";
      break;
    case 'empty_response':
      echo "<p style='color: red;'>ไม่พบ token</p>";
      break;
    case 'invalid_credentials':
      echo "<p style='color: red;'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</p>";
      break;
      // Add more cases for other error messages if needed
  }
} ?>
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
  <link rel="stylesheet" href="./css/btn.css">
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
    <section class="container">
      <?php include('./plugin/login.php');
      ?>

    </section>
  </main>

</body>

</html>