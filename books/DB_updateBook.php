<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
include_once '../config/connect.php';
if (isset($_POST['update'])) {

  $id = $_POST['id'];
  $name = $_POST['name'];
  $c_id = $_POST['category_id'];
  $status = $_POST['status'];
  $price = $_POST['price'];
  $number = $_POST['number'];

  $strSQL = " UPDATE book SET b_name='$name', c_id='$c_id', status='$status', price='$price', book_id='$number' WHERE b_id='$id'";

  if ($conn->query($strSQL) == TRUE) {
    echo "<script>
    $(document).ready(function() {
    Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'แก้ไขข้อมูลหนังสือสำเร็จ',
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
        title: 'แก้ไขข้อมูลหนังสือไม่สำเร็จ',
        showConfirmButton: false,
        timer: 1500
      }).then((result) => {
        window.location = './booksList.php';
      });
    });
    </script>";
  }

  mysqli_close($conn);
}
?>