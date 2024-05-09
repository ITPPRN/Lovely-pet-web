<?php
session_start();
$_SESSION['latitude'] = $_GET['latitude'];
$_SESSION['longitude'] = $_GET['longitude'];
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lovely Pet</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
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

<body>
  <header>
    <?php include('./plugin/navbar_register.php'); ?>
  </header>

  <?php ob_start(); ?>
  <main style="max-width: 800px; margin: 150px auto; margin-top: 250px;">
    <section class="container t1" style="max-width: 800px; margin-left: auto; margin-left: auto;">
      <?php include('./plugin/register.php'); ?>
    </section>
    <br><br><br><br><br><br>
</main>
  <?php
  $content = ob_get_clean();
  echo str_replace('<section class="container">', '<section class="container" style="margin-top: 50px;">', $content);
  ?>

</body>

</html>