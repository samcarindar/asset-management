<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
include_once '../config/connect.php';
if (isset($_POST['insert'])) {
  $c_name = $_POST['name'];
  $c_number = $_POST['number'];

  $strSQL = "INSERT INTO category (c_name,c_number) VALUES ('$c_name','$c_number')";

  if ($conn->query($strSQL) == TRUE) {
    echo "<script>
    $(document).ready(function() {
    Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'เพิ่มหมวดหมู่ไม่สำเร็จ',
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
            title: 'เพิ่มหมวดหมู่สำเร็จ',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location = './categorysList.php';
          });
        });
        </script>";
  }

  mysqli_close($conn);
}
?>