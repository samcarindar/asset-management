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
                        <h3 class="float-start me-2">ข้อมูลหนังสือ</h3>
                        <a href="./insertbook.php" class="btn btn-sm btn-primary mb-3">เพิ่มหนังสือ</a>

                        <table class="table table-striped text-nowrap" id="myTable">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">เลขที่หนังสือ</th>
                                    <th scope="col">ชื่อหนังสือ</th>
                                    <th scope="col">ประเภทหนังสือ</th>
                                    <th scope="col">ราคา (บาท)</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>495568</td>
                                    <td>หนังสือภาษาไทย</td>
                                    <td>ภาษาไทย</td>
                                    <td>250.00</td>
                                    <td>ปกติ/ว่าง</td>
                                    <td class="col-2 text-end">
                                        <a href="./updatebook.php" class="btn btn-sm btn-warning text-white">แก้ไข</a>
                                        <button type="button" class="btn btn-sm btn-danger">ลบ</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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