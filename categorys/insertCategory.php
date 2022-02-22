<?php
include("../config/connect.php");
session_start();

if (!isset($_SESSION['status'])) {
    echo "<script type='text/javascript'>";
    echo "alert('ยังไม่ได้เข้าสู่ระบบ');";
    echo "window.location = '../index.php'; ";
    echo "</script>";
}
?>

<!doctype html>
<html lang="en">

<head>
    <?php
    include("../layout/header.php");
    ?>
</head>

<body>

    <div class="container-fluid" style="background-color: #f2f2f2;">
        <div class="row">
            <?php
            include("../layout/sidebar.php");
            ?>

            <div class="col-md-10 px-4 my-4">
                <div class="card shadow p-2">
                    <div class="card-body">
                        <h3 class="mb-3">ข้อมูลหมวดหมู่</h3>

                        <form action="./DB_insCategory.php" method="POST">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">เลขที่หมวดหมู่</label>
                                <input type="text" class="form-control" name="number">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">ชื่อหมวดหมู่</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <a href="./categorysList.php" class="btn btn-secondary">ยกลิก</a>
                            <button type="submit" name="insert" class="btn btn-primary">บันทึก</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <?php
    include("../layout/script.php");
    ?>
</body>

</html>