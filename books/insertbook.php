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
                        <h3 class="mb-3">ข้อมูลหนังสือ</h3>

                        <form action="./booksList.php" method="POST">
                            <div class="col-md-2 mb-3">
                                <label class="form-label">สถานะ</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1" selected>ปกติ/ว่าง</option>
                                    <option value="2">ยืม/ใช้งาน</option>
                                    <option value="3">ชำรุด</option>
                                    <option value="3">สุญหาย</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">เลขที่หนังสือ</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">ชื่อหนังสือ</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">ประเภทหนังสือ</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1" selected>นิยาย</option>
                                    <option value="2">คอมพิวเตอร์</option>
                                    <option value="3">ภาษาไทย</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">ราคาหนังสือ</label>
                                <input type="text" class="form-control">
                            </div>
                            <a href="./booksList.php" class="btn btn-secondary">ยกลิก</a>
                            <button type="submit" class="btn btn-primary">บันทึก</button>
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