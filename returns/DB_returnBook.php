<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
include_once '../config/connect.php';

if (isset($_POST["save"])) {

  $book_id = $_POST['book_id'];
  $b_status = $_POST['status'];


  $result = "UPDATE book SET status='$b_status' WHERE book_id='$book_id'";
  if ($conn->query($result) == TRUE) {
    echo "<script>
    $(document).ready(function() {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'ส่งคืนสำเร็จ',
        showConfirmButton: false,
        timer: 1500
      }).then((result) => {
        window.location = './returnsList.php';
      });
    });
    </script>";
  } else {
    echo "<script>
    $(document).ready(function() {
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'ส่งคืนไม่สำเร็จ',
        showConfirmButton: false,
        timer: 1500
      }).then((result) => {
        window.location = './returnsList.php';
      });
    });
    </script>";
  }

  $sql = "UPDATE booking SET status=1 WHERE book_id='$book_id'";

  if ($conn->query($sql) == TRUE) {
    echo "<script>
    $(document).ready(function() {
    Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'ส่งคืนสำเร็จ',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location = './returnsList.php';
          });
        });
    </script>";
  } else {
    echo "<script>
    $(document).ready(function() {
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'ส่งคืนไม่สำเร็จ',
        showConfirmButton: false,
        timer: 1500
      }).then((result) => {
        window.location = './returnsList.php';
      });
    });
    </script>";
  }
}

mysqli_close($conn);

?>