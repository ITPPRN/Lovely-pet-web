<?php
ob_start();
session_start();

if (!isset($_SESSION['token'])) {
    ?>
        <script>
            window.location.href = "index.php";
        </script>
    <?php
    } else if (isset($_SESSION['token'])) {
        $token = $_SESSION['token'];
    }?>
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
  
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <header>
  <?php include('./plugin/navbardashboard.php');?>
  </header>

  <main>
    <section class="container">
    <?php include('./plugin/detailverify.php');
    ?>
    
    </section>
  </main>

</body>

</html>