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
            $result = mysqli_query($conn, "SELECT *, (SELECT COUNT(id) FROM booking WHERE m_id = mb.m_id) as c FROM member as mb WHERE status='0' ORDER BY m_name");
            ?>

            <div class="col-md-10 px-4 my-4">
                <div class="card shadow p-2">
                    <div class="card-body">
                        <h3 class="float-start me-2">ยืมหนังสือ</h3>

                        <table class="table table-striped text-nowrap" id="myTable">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">เลขบัตรประชาชน</th>
                                    <th scope="col">ชื่อ - นามสกุล</th>
                                    <th scope="col">เบอร์โทรศัพท์</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">จำนวนที่ยืม</th>
                                    <th scope="col"></th>
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
                                            <td><?php echo $row["m_card_id"] ?></td>
                                            <td><?php echo $row["m_name"] ?></td>
                                            <td><?php echo $row["phone"] ?></td>
                                            <td><?php echo $row["username"] ?></td>
                                            <td>
                                                <?php
                                                if ($row["status"] == 0) {
                                                    echo "User";
                                                } else {
                                                    echo "Admin";
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $row["c"] ?></td>
                                            <td class="col-2 text-end">
                                                <a href="./selectBooks.php?id=<?php echo $row['m_id']; ?>" class="btn btn-sm btn-success text-white">เลือก</a>
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