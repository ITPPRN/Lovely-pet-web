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
  <h1>ลงทะเบียน</h1>
  <form action="/register" method="post">
    <label for="service_type">ระบุประเภทบริการ</label>
    <select name="service_type" id="service_type">
      <option value="">-- เลือกประเภทบริการ --</option>
      <option value="dog_boarding">รับฝากสุนัข</option>
      <option value="cat_boarding">รับฝากแมว</option>
      <option value="pet_sitting">ดูแลสัตว์เลี้ยงที่บ้าน</option>
    </select>
    <br>
    <label for="max_pets">ระบุจำนวนที่สามารถรับสัตว์เลี้ยงได้</label>
    <input type="number" name="max_pets" id="max_pets">
    <br>
    <label for="num_rooms">ระบุจำนวนห้อง</label>
    <input type="number" name="num_rooms" id="num_rooms">
    <br>
    <br>
    <button type="submit">เพิ่มประเภทบริการ</button>
  </form>
</body>
<script src="./js/test.js"></script>
</html>
