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
            $result = mysqli_query($conn, "SELECT * FROM category");
            ?>

            <div class="col-md-10 px-4 my-4">
                <div class="card shadow p-2">
                    <div class="card-body">
                        <h3 class="float-start me-2">ข้อมูลหมวดหมู่หนังสือ</h3>
                        <a href="./insertcategory.php" class="btn btn-sm btn-primary mb-3">เพิ่ม</a>

                        <div class="col-md-6">
                            <table class="table table-striped text-nowrap" id="myTable">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">เลขที่หมวดหมู่</th>
                                        <th scope="col">ชื่อหมวดหมู่</th>
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
                                                <td><?php echo $row["c_number"] ?></td>
                                                <td><?php echo $row["c_name"] ?></td>
                                                <td class="col-2 text-end">
                                                    <a href="./updateCategory.php?id=<?php echo $row["c_id"]; ?>" class="btn btn-sm btn-warning text-white">แก้ไข</a>
                                                    <a href="./DB_delCategory.php?id=<?php echo $row["c_id"]; ?>" class="btn btn-sm btn-danger">ลบ</a>
                                                </td>
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