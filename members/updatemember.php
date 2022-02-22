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
            $strSQL = "SELECT * FROM member WHERE m_id = $id";
            $result = mysqli_query($conn, $strSQL);

            if ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-md-10 px-4 my-4">
                    <div class="card shadow p-2">
                        <div class="card-body">
                            <h3 class="mb-3">ข้อมูลสมาชิก</h3>

                            <form action="./DB_updateMember.php" method="POST">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">ชื่อ - นามสกุล</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['m_name'] ?>" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">เลขบัตรประจำตัวประชาชน</label>
                                    <input type="text" class="form-control" name="card_id" value="<?php echo $row['m_card_id'] ?>" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">ที่อยู่</label>
                                    <textarea class="form-control" name="address" rows="4"><?php echo $row['address'] ?></textarea>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'] ?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" required>
                                </div>

                                <a href="./memberList.php" class="btn btn-secondary">ยกลิก</a>
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