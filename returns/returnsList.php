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
            $result = mysqli_query($conn, "
            SELECT booking.id,member.m_name, book.book_id, book.b_name, booking.start_date, booking.end_date, book.price, booking.status
            FROM booking LEFT JOIN member ON booking.m_id = member.m_id
                         LEFT JOIN book ON booking.book_id = book.book_id;
            ");
            ?>

            <div class="col-md-10 px-4 my-4">
                <div class="card shadow p-2">
                    <div class="card-body">
                        <h3 class="float-start me-2">ส่งคืนหนังสือ</h3>

                        <table class="table table-striped text-nowrap" id="myTable">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ผู้ยืม</th>
                                    <th scope="col">เลขที่หนังสือ</th>
                                    <th scope="col">ชื่อหนังสือ</th>
                                    <th scope="col">วันที่ยืม</th>
                                    <th scope="col">กำหนดส่ง</th>
                                    <th scope="col">สถานะ</th>
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
                                            <td><?php echo $row["m_name"] ?></td>
                                            <td><?php echo $row["book_id"] ?></td>
                                            <td><?php echo $row["b_name"] ?></td>
                                            <td><?php echo date_format(date_create($row["start_date"]), "d-m-Y") ?></td>
                                            <td><?php echo date_format(date_create($row["end_date"]), "d-m-Y") ?></td>
                                            <td>
                                                <?php
                                                if ($row["status"] == 0) {
                                                    echo '<p class="mb-0 text-danger">ยังไม่ส่งคืน</p>';
                                                } else {
                                                    echo '<p class="mb-0 text-success">ส่งคืนแล้ว</p>';
                                                }
                                                ?>
                                            </td>
                                            <td class="col-2 text-end">
                                                <?php
                                                if ($row["status"] == 0) { ?>
                                                    <a href="./returnBooks.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary text-white px-4">ส่งคืน</a>
                                                <?php } ?>
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