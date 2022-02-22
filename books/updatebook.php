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
            SELECT book.b_id, book.book_id, book.b_name, category.c_id, category.c_name, book.price, book.status
            FROM book LEFT JOIN category ON book.c_id = category.c_id
            WHERE b_id = $id
            ORDER BY book.book_id;
            ";
            $result = mysqli_query($conn, $strSQL);

            if ($row = mysqli_fetch_array($result)) {
            ?>

                <div class="col-md-10 px-4 my-4">
                    <div class="card shadow p-2">
                        <div class="card-body">
                            <h3 class="mb-3">ข้อมูลหนังสือ</h3>

                            <form action="./DB_updateBook.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['b_id'] ?>">

                                <div class="col-md-2 mb-3">
                                    <label class="form-label">สถานะ</label>
                                    <select class="form-select" name="status">
                                        <option value="<?php echo $row['status'] ?>" selected><?php echo $row['status'] ?></option>
                                        <option value="ปกติ/ว่าง">ปกติ/ว่าง</option>
                                        <option value="ยืม/ใช้งาน">ยืม/ใช้งาน</option>
                                        <option value="ชำรุด">ชำรุด</option>
                                        <option value="สูญหาย">สูญหาย</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">เลขที่หนังสือ</label>
                                    <input type="text" class="form-control" name="number" value="<?php echo $row['book_id'] ?>" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">ชื่อหนังสือ</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['b_name'] ?>" required>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">ประเภทหนังสือ</label>
                                    <select class="form-select" name="category_id">
                                        <option value="<?php echo $row['c_id'] ?>" selected><?php echo $row['c_name'] ?></option>
                                        <?php
                                        if (mysqli_num_rows($sql_category) > 0) {
                                            while ($c_row = mysqli_fetch_array($sql_category)) {
                                        ?>
                                                <option value="<?php echo $c_row['c_id'] ?>"><?php echo $c_row['c_name'] ?></option>
                                        <?php }
                                        } else {
                                            echo "<option>ไม่มีข้อมูล</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">ราคาหนังสือ</label>
                                    <input type="text" class="form-control" name="price" value="<?php echo $row['price'] ?>" required>
                                </div>
                                <a href="./booksList.php" class="btn btn-secondary">ยกลิก</a>
                                <button type="submit" name="update" class="btn btn-primary">บันทึก</button>
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