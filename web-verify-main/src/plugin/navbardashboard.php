<nav class="navbar fixed-top">
    <div class="container-fluid d-flex align-items-center">
        <div class="logo-container d-flex align-items-center">
            <img src="./image/logo.png" alt="Lovely Pet" style="width: 70px; height: auto;">
            <a style="color: white; font-size: 24px; margin-left: 10px;">LOVELY PET</a>
        </div>
        <div class="dashboard-container">
            <h1 class="text-white" style="margin-right: 140px;">Dashboard</h1>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ผู้ดูแลระบบ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./dashboard.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./allclinic.php">คลินิกที่ได้รับการอนุมัติแล้ว</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="logout()">ออกจากระบบ</a>
                    </li>

                    <script>
                        function logout() {
                            // ทำการลบข้อมูลการเข้าสู่ระบบ (หากมี)
                            // สามารถเรียกใช้ API หรือทำการเคลียร์ข้อมูลใน Local Storage, Session Storage ได้ตามที่ต้องการ

                            // ลบประวัติการเรียกหน้าเว็บ (history)
                            window.history.pushState({}, document.title, "./index.php");

                            // Redirect ไปยังหน้าหลักหรือหน้าอื่นๆ ตามที่คุณต้องการ
                            window.location.href = "./logout.php";
                        }
                    </script>



                </ul>

            </div>
        </div>
    </div>

</nav>