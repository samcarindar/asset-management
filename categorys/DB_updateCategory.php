<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
include_once '../config/connect.php';

$id = $_POST['id'];
$number = $_POST['number'];
$name = $_POST['name'];

$strSQL = " UPDATE category SET c_name='$name', c_number='$number' WHERE c_id='$id'";

if ($conn->query($strSQL) == TRUE) {
    echo "<script>
    $(document).ready(function() {
    Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'แก้ไขหมวดหมู่สำเร็จ',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location = './categorysList.php';
          });
        });
    </script>";
} else {
    echo "<script>
    $(document).ready(function() {
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'แก้ไขหมวดหมู่ไม่สำเร็จ',
        showConfirmButton: false,
        timer: 1500
      }).then((result) => {
        window.location = './categorysList.php';
      });
    });
    </script>";
}

mysqli_close($conn);
?>