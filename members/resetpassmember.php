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
            ?>

            <div class="col-md-10 px-4 my-4">
                <div class="card shadow p-2">
                    <div class="card-body">
                        <h3 class="mb-3">ข้อมูลสมาชิก</h3>

                        <form action="./DB_resetPassword.php" method="POST">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">

                            <div class="col-md-4 mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" name="new_pass" required>
                            </div>
                            <!-- <div class="col-md-4 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control">
                            </div> -->
                            <a href="./memberList.php" class="btn btn-secondary">ยกลิก</a>
                            <button type="submit" name="reset" class="btn btn-primary">บันทึก</button>
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