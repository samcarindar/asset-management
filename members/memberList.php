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
            $result = mysqli_query($conn, "SELECT * FROM member");
            ?>

            <div class="col-md-10 px-4 my-4">
                <div class="card shadow p-2">
                    <div class="card-body">
                        <h3 class="float-start me-2">ข้อมูลสมาชิก</h3>
                        <a href="./insertmember.php" class="btn btn-sm btn-primary mb-3">เพิ่มสมาชิก</a>

                        <table class="table table-striped text-nowrap" id="myTable">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">เลขบัตรประชาชน</th>
                                    <th scope="col">ชื่อ - นามสกุล</th>
                                    <th scope="col">เบอร์โทรศัพท์</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                        <tr>
                                            <td><?php echo $row["m_id"] ?></td>
                                            <td><?php echo $row["m_card_id"] ?></td>
                                            <td><?php echo $row["m_name"] ?></td>
                                            <td><?php echo $row["phone"] ?></td>
                                            <td><?php echo $row["username"] ?></td>
                                            <td><?php echo $row["status"] === 0 ? 'Admin' : 'User'; ?></td>
                                            <td class="col-2 text-end">
                                                <a href="./resetpassmember.php" class="btn btn-sm btn-info text-white">รีเซ็ต Password</a>
                                                <a href="./updatemember.php" class="btn btn-sm btn-warning text-white">แก้ไข</a>
                                                <button type="button" class="btn btn-sm btn-danger">ลบ</button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
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