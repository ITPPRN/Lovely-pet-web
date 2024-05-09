<div class="row container center-card col-md-9 mx-auto card" style="background-color: transparent; border: none; margin-top: 150px;">

  <div class="container d-flex justify-content-between align-items-center mb-3">
    <div style="display:flex">
      <img src="./image/donation_903608.png" alt="รูปภาพใบสั่ง" style="width: 30px; height: 33px;">
      <center>
        <p>บริการเสริม</p>
      </center>
    </div>
    <div class="d-flex justify-content-center align-items-center">
      <button id="addServiceBtn" class="btn btn-success" onclick="redirectToOtherPage()">
        <i class="material-icons" style="color: white; font-size: 16px;">เพิ่มบริการ</i>
      </button>

      <script>
        function redirectToOtherPage() {
          // ใส่ URL ของหน้าที่คุณต้องการเปิดแทนที่ URL ด้านล่าง
          window.location.href = './addservice.php';
        }

        function editService({
          id,
          name,
          price
        }) {
          // Redirect to edit service page with serviceId
          window.location.href = './editservice.php?id=' + id + '&name=' + name + '&price=' + price;
        }

        function deleteService(id) {
          // Redirect to edit service page with serviceId
          window.location.href = './plugin/deleteservice_back.php?id=' + id;
        }
      </script>

    </div>
    <style>
      #addServiceBtn {
        background-color: #FFD159;
        color: black;
      }
    </style>
  </div>
  <div class="row mb-5">
    <div class="col">
      <div class="center-card2">
        <?php

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://backend-application.pcnone.com/additional-service/list-service',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $token,
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // Decode the JSON response
        $data = json_decode($response, true);

        // Check if data is not empty
        if (!isset($data['status'])) {
          // Iterate over each item and display as a separate card
        ?>
          <div class="card rounded shadow mb-3">
            <div class="card-header bg-warning text-white text-center">
              ชื่อบริการเสริม 
            </div>
            <div class="card-body yellow-bg">
              <table class="table table-striped table-bordered text-center table-warning">
                <thead>
                  <tr>
                    <th scope="col">บริการเสริม</th>
                    <th scope="col">ราคา (บาท/หน่วย)</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($data as $item) {
                  ?>
                    <tr>
                      <td><?php echo $item['name']; ?></td>
                      <td><?php echo $item['price']; ?> </td>
                      <td>
                        <button class="btn btn-primary btn-sm" onclick="editService({ id: <?php echo $item['id']; ?>, name: '<?php echo $item['name']; ?>', price: <?php echo $item['price']; ?> })">
                          <i class="fas fa-edit"></i> แก้ไข (Edit)
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="deleteService(<?php echo $item['id']; ?>)">
                          <i class="fas fa-trash-alt"></i> ลบ (Delete)
                        </button>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php
        } else {

          // Handle case where no data is returned
          echo "<div class='alert alert-warning' role='alert'>ยังไม่มีบริการเสริม กรุณาเพิ่มบริการ</div>";
        }
        ?>