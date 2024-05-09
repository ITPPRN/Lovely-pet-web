<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><?php echo $hotelName; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link " href="../dashboard.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../service.php">บริการเสริม</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../oderbyclinic.php">จัดการจองหน้าร้าน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../room.php">จัดการห้อง</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../editclinic.php">แก้ไขข้อมูลคลินิก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../ownerbooking.php">จองบริการโดยคลินิก</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../reset_password.php">แก้ไขรหัสผ่าน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">ออกจากระบบ</a>
                    </li>

                </ul>

            </div>
        </div>