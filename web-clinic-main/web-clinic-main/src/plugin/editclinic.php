<main style="max-width: 1600px; padding-top: 50px; margin: auto;">
    <section class="container">
        <div class="row">
            <div class="center-card">
                <div class="col-md-9 mx-auto">
                    <div class="container" style="display:flex">
                        <img src="./image/change-password-5.png" alt="รูปภาพใบสั่ง" style="width: 30px; height: 33px;">
                        <center>
                            <p>แก้ไขข้อมูลสถานบริการรับฝากสัตว์เลี้ยง</p>
                        </center>
                    </div>
                    <div class="card col-md-12">
                        <div class="card-body margin-left: auto;  yellow-bg">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row justify-content-center">
                                    <div class="mb-3 col d-flex justify-content-center">
                                        <label for="image1" class="file-upload">
                                            <?php if (isset($image_slp_src1) && !empty($image_slp_src1)) : ?>
                                                <img src="<?php echo $image_slp_src1 ?>">
                                            <?php else : ?>
                                                <img id="imagePreview1">
                                                <span>เพิ่มรูป</span>
                                                <input type="file" id="image1" name="image1" onchange="previewImage(event, 'imagePreview1')">
                                            <?php endif; ?>
                                        </label>
                                    </div>
                                    <div class="mb-3 col d-flex justify-content-center">
                                        <label for="image2" class="file-upload">
                                            <?php if (isset($image_slp_src2) && !empty($image_slp_src2)) : ?>
                                                <img src="<?php echo $image_slp_src2 ?>">
                                            <?php else : ?>
                                                <img id="imagePreview2">
                                                <span>เพิ่มรูป</span>
                                                <input type="file" id="image2" name="image2" onchange="previewImage(event, 'imagePreview2')">
                                            <?php endif; ?>
                                        </label>
                                    </div>
                                    <div class="mb-3 col d-flex justify-content-center">
                                        <label for="image3" class="file-upload">
                                            <?php if (isset($image_slp_src3) && !empty($image_slp_src3)) : ?>
                                                <img src="<?php echo $image_slp_src3 ?>">
                                            <?php else : ?>
                                                <img id="imagePreview3">
                                                <span>เพิ่มรูป</span>
                                                <input type="file" id="image3" name="image3" onchange="previewImage(event, 'imagePreview3')">
                                            <?php endif; ?>
                                        </label>
                                    </div>
                                </div>
                                <!-- แก้ไขโค้ด JavaScript เพื่อให้แสดงรูปภาพ -->
                                <script>
                                    function previewImage(event, imageId) {
                                        var input = event.target;
                                        var reader = new FileReader();

                                        reader.onload = function() {
                                            var imagePreview = document.getElementById(imageId);
                                            imagePreview.src = reader.result;
                                            imagePreview.style.display = 'block';
                                            // ซ่อน <span>เพิ่มรูป</span>
                                            input.parentElement.querySelector('span').style.display = 'none';
                                        };

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                </script>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="inputUsername" class="form-label" style="text-align: left;">ชื่อคลินิก</label>
                                        <input type="text" class="form-control" name="hotelName" style="width: 100%;" placeholder="ชื่อคลินิก" value="<?php echo $hotelName ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword" class="form-label" style="text-align: left;">ที่อยู่</label>
                                        <input type="text" class="form-control" name="location" style="width: 100%;" placeholder="ที่อยู่" value="<?php echo $location ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="inputUsername" class="form-label" style="text-align: left;">หมายเลขโทรศัพท์</label>
                                        <input type="text" class="form-control" name="hotelTel" style="width: 100%;" placeholder="กรอกหมายเลขโทรศัพท์" value="<?php echo $hotelTel ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword" class="form-label" style="text-align: left;">รายละเอียดคลินิก</label>
                                        <input type="text" class="form-control" name="additionalNotes" style="width: 100%;" placeholder="กรุณากรอกหมายเลขใบอนุญาติเปิดคลินิกสัตว์" value="<?php echo $additionalNotes ?>">
                                    </div>
                                </div>
                                <div class="btn-container center-text" style="margin-top: 30px; text-align: center;">
                                    <a href="dashboard.php" class="btn btn-secondary btn-danger" style="width: 100px;">ยกเลิก</a>
                                    &nbsp;
                                    <button type="submit" name="submit" class="btn btn-success wider-btn1 t1" style="width: 100px;">ยืนยัน</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>