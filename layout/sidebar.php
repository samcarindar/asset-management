<div class="col-md-2 text-white bg-dark" style="height: 100vh;">
    <a href="../dashboards/dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="../dashboards/dashboard.php" class="nav-link text-white" aria-current="page">
                <i class="fa fa-home me-1" style="font-size:18px"></i>
                หน้าหลัก
            </a>
        </li>
        <li>
            <a href="../books/booksList.php" class="nav-link text-white">
                <i class="fa fa-th-list me-1" style="font-size:18px"></i>
                จัดการข้อมูลหนังสือ
            </a>
        </li>
        <li>
            <a href="../members/memberList.php" class="nav-link text-white">
                <i class="fa fa-users me-1" style="font-size:18px"></i>
                จัดการข้อมูลสมาชิก
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong><?php echo $_SESSION["name"]; ?> <?php echo '(' . $_SESSION["status"] . ')' ?></strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="../logout.php">Sign out</a></li>
        </ul>
    </div>
</div>