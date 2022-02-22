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
            $rst_num = mysqli_query($conn, "SELECT * FROM book");
            $rst_num1 = mysqli_query($conn, "SELECT * FROM book WHERE status='ยืม/ใช้งาน'");
            $rst_num2 = mysqli_query($conn, "SELECT * FROM book WHERE status='ชำรุด' OR status='สูญหาย'");
            $rst_num3 = mysqli_query($conn, "SELECT * FROM member");

            $result = mysqli_query($conn, "
            SELECT book.b_id, book.book_id, book.b_name, category.c_id, category.c_name, book.price, book.status
            FROM book LEFT JOIN category ON book.c_id = category.c_id
            ORDER BY book.book_id;
            ");
            ?>

            <div class="col-md-10 px-4">
                <div class="row justify-content-center">
                    <div class="col-md-3 py-3">
                        <div class="card border-primary border-2 shadow mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="card-title">หนังสือรวม</h5>
                                    <p class="card-text h3 fw-nomel"><?php echo mysqli_num_rows($rst_num); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 py-3">
                        <div class="card border-danger border-2 shadow mb-3">
                            <div class="card-body">
                                <h5 class="card-title">ยืม/ใช้งาน</h5>
                                <p class="card-text h3 fw-nomel"><?php echo mysqli_num_rows($rst_num1); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 py-3">
                        <div class="card border-info border-2 shadow mb-3">
                            <div class="card-body">
                                <h5 class="card-title">ชำรุด/สูญหาย</h5>
                                <p class="card-text h3 fw-nomel"><?php echo mysqli_num_rows($rst_num2); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 py-3">
                        <div class="card border-success border-2 shadow mb-3">
                            <div class="card-body">
                                <h5 class="card-title">สมาชิก</h5>
                                <p class="card-text h3 fw-nomel"><?php echo mysqli_num_rows($rst_num3); ?></p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card shadow p-2">
                    <div class="card-body">
                        <h3 class="float-start me-2">รายการหนังสือทั้งหมด</h3>
                        <!-- <button type="button" class="btn btn-sm btn-primary mb-3">Export Excel</button> -->

                        <table class="table table-striped text-nowrap" id="myTable">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">เลขที่หนังสือ</th>
                                    <th scope="col">ชื่อหนังสือ</th>
                                    <th scope="col">ประเภทหนังสือ</th>
                                    <th scope="col">ราคา (บาท)</th>
                                    <th scope="col">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($result)) {

                                ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $row["book_id"] ?></td>
                                            <td><?php echo $row["b_name"] ?></td>
                                            <td><?php echo $row["c_name"] ?></td>
                                            <td><?php echo $row["price"] ?></td>
                                            <td><?php echo $row["status"] ?></td>
                                        </tr>
                                <?php }
                                } ?>
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