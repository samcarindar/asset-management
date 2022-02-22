<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
include_once '../config/connect.php';

$id = $_GET['id'];
$strSQL = "DELETE FROM book WHERE b_id='$id' ";

if ($conn->query($strSQL) == TRUE) {
  echo "<script>
    $(document).ready(function() {
    Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'ลบข้อมูลหนังสือสำเร็จ',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location = './booksList.php';
          });
        });
    </script>";
} else {
  echo "<script>
    $(document).ready(function() {
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'เพิ่มข้อมูลหนังสือไม่สำเร็จ',
        showConfirmButton: false,
        timer: 1500
      }).then((result) => {
        window.location = './booksList.php';
      });
    });
    </script>";
}

mysqli_close($conn);
?>