<?php
date_default_timezone_set('Asia/Bangkok');
if (isset($_REQUEST['latitude'])) {
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];
} else {
?>
<div span style="color:white" id='location'></div>
    <div align="center">
        <br><br><br>
        <img src="../image/location.png" width="200px" height="200px">
    </div>
    <center>
        <h3 class="t1">คุณไม่ได้ระบุตำแหน่ง กรุณาเปิดสิทธิ์ระบุตำแหน่ง</h3><br>
        <h3 class="t1">และให้เจ้าของคลินิกอยู่ในคลินิกของท่านเพื่อบันทึกที่อยู่</h3>
    </center>
    <?php
}


?>
<!DOCTYPE html>
<html lang="en">

<body>

</body>
<script>
    var l = document.getElementById("location");
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLocation);
    } else {
        l.innerHTML = "โปรแกรมเล่นอินเทอร์เน็ตของคุณไม่รองรับ Geolocation API";
    }

    function showLocation(position) {
        var latitude = position.coords.latitude.toFixed(15);
        var longitude = position.coords.longitude.toFixed(15);
        l.innerHTML = "ละติจูด = " + latitude + " / ลองจิจูด = " + longitude;
        // ส่งค่า latitude และ longitude ไปยังไฟล์ PHP โดยใช้ AJAX
        var xmlhttp = new XMLHttpRequest();
        window.location.href = "register.php?data=1&latitude=" + latitude + "&longitude=" + longitude;
    }
</script>