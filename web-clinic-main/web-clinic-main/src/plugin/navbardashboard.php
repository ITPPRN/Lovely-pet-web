<nav class="navbar fixed-top">
  <div class="container-fluid d-flex align-items-center">
    <div class="col-md-4 ">
      <div class="logo-container d-flex align-items-center">
        <img src="./image/logo.png" alt="Lovely Pet" style="width: 70px; height: auto;">
        <a style="color: back; font-size: 24px; margin-left: 10px;"><strong>LOVELY PET</strong></a>
      </div>
    </div>
    <div class="col-md-4 d-flex justify-content-center">
      <div class="dashboard-container">
        <a style="color: back; font-size: 24px; margin-left: 10x;"><strong>หน้าหลัก</strong></a>
      </div>
    </div>
    <div class="col-md-2 d-flex justify-content-end">
      <?php
      // ตรวจสอบว่ามีการส่งค่า selectedValue มาหรือไม่
      if (isset($_POST['selectedValue'])) {
        // รับค่า selectedValue จากการ POST
        $selectedValue = $_POST['selectedValue'];

        // บันทึกค่า selectedValue ลงใน session
        $_SESSION['openState'] = $selectedValue;
      }

      // ดึงค่า openState จาก session ออกมาใช้งาน
      $openState = isset($_SESSION['openState']) ? $_SESSION['openState'] : 'CLOSE'; // ถ้าไม่มีค่าใน session ให้กำหนดเป็น CLOSE
      ?>

      <!-- HTML -->

      <label class="switch">
        <input type="checkbox" id="exampleSwitch" onchange="handleChange(this)" <?php echo $openState == 'OPEN' ? 'checked' : ''; ?>>
        <span class="slider round"></span>
      </label>

      <!-- JavaScript -->
      <script>
        function handleChange(checkbox) {
          var selectedValue = checkbox.checked ? 'OPEN' : 'CLOSE';
          console.log('Selected Value:', selectedValue);

          // เรียกใช้งาน PHP script เพื่อส่งค่าไปยัง API
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              console.log(xhr.responseText);
            }
          };
          xhr.send("selectedValue=" + selectedValue);

          swal({
            title: "เปลี่ยนสถานะแล้ว",
            text: selectedValue,
            icon: "success"
          }).then((value) => {
            // ไปยังหน้า index.php
            window.location.href = window.location.href;
          });
        }
      </script>

      <!-- CSS -->
      <style>
        /* The switch - https://www.w3schools.com/howto/howto_css_switch.asp */
        .switch {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }

        .switch input {
          opacity: 0;
          width: 0;
          height: 0;
        }

        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }

        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }

        input:checked+.slider {
          background-color: #2196F3;
        }

        input:focus+.slider {
          box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }

        .slider.round:before {
          border-radius: 50%;
        }
      </style>
    </div>
    <div class="col-md-2 d-flex justify-content-end">
      <?php include('menu.php'); ?>
    </div>
  </div>

</nav>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedValue'])) {
  // รับค่าที่เลือกจากแบบฟอร์ม
  $selectedValue = $_POST['selectedValue'];
  $_SESSION['openState'] = $selectedValue;
  // สร้างข้อมูลที่จะส่งไปยัง API
  $postData = json_encode(array(
    'idHotel' => 2,
    'openState' => $selectedValue
  ));

  // เรียกใช้งาน cURL
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/update-normal',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $postData,
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Authorization: Bearer ' . $token
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);

  //echo $response;

  exit; // ออกจากสคริปต์เพื่อหยุดการทำงานของสคริปต์หลังจากทำงานเสร็จสิ้น

}
?>