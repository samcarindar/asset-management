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
            $strSQL = "SELECT * FROM category WHERE c_id = $id";
            $result = mysqli_query($conn, $strSQL);

            if ($row = mysqli_fetch_array($result)) {
            ?>

                <div class="col-md-10 px-4 my-4">
                    <div class="card shadow p-2">
                        <div class="card-body">
                            <h3 class="mb-3">ข้อมูลหมวดหมู่</h3>

                            <form action="./DB_updateCategory.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['c_id'] ?>">

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">เลขที่หมวดหมู่</label>
                                    <input type="text" class="form-control" name="number" value="<?php echo $row['c_number'] ?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">ชื่อหมวดหมู่</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['c_name'] ?>">
                                </div>
                                <a href=" ./categorysList.php" class="btn btn-secondary">ยกลิก</a>
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