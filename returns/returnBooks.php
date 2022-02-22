<?php
include("../config/connect.php");
session_start();
$id = $_GET['id'];

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
            $sql_category = mysqli_query($conn, "SELECT * FROM category");

            $strSQL = "
            SELECT booking.m_id,booking.book_id,booking.id,member.m_card_id,member.m_name,member.address,member.phone,
                    book.status AS b_status,book.price,book.b_name
            FROM booking LEFT JOIN member ON booking.m_id = member.m_id
                        LEFT JOIN book ON booking.book_id = book.book_id
            WHERE id = $id;
            ";
            $result = mysqli_query($conn, $strSQL);

            if ($row = mysqli_fetch_array($result)) {
            ?>

                <div class="col-md-10 px-4 my-4">
                    <div class="card shadow p-2">
                        <div class="card-body py-4">
                            <h3 class="mb-3">ข้อมูลผู้ยืม</h3>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">เลขบัตรประจำตัวประชาชน</label>
                                    <p class="mb-0 ms-3"><?php echo $row['m_card_id'] ?></p>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">ชื่อ - นามสกุล</label>
                                    <p class="mb-0 ms-3"><?php echo $row['m_name'] ?></p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">ที่อยู่</label>
                                    <p class="mb-0 ms-3"><?php echo $row['address'] ?></p>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">เบอร์โทรศัพท์</label>
                                    <p class="mb-0 ms-3"><?php echo $row['phone'] ?></p>
                                </div>
                            </div>

                            <h3 class="mb-3">ข้อมูลหนังสือ</h3>

                            <form action="./DB_returnBook.php" method="POST">
                                <input type="hidden" name="book_id" value="<?php echo $row['book_id'] ?>">

                                <div class="col-md-2 mb-3">
                                    <label class="form-label">สถานะ</label>
                                    <select class="form-select" name="status">
                                        <option value="<?php echo $row['b_status'] ?>" selected><?php echo $row['b_status'] ?></option>
                                        <option value="ปกติ/ว่าง">ปกติ/ว่าง</option>
                                        <option value="ยืม/ใช้งาน">ยืม/ใช้งาน</option>
                                        <option value="ชำรุด">ชำรุด</option>
                                        <option value="สูญหาย">สูญหาย</option>
                                    </select>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">เลขที่หนังสือ</label>
                                        <p class="mb-0 ms-3"><?php echo $row['book_id'] ?></p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">ชื่อหนังสือ</label>
                                        <p class="mb-0 ms-3"><?php echo $row['b_name'] ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="./returnsList.php" class="btn btn-secondary">ยกลิก</a>
                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php } ?>
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