<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
include_once '../config/connect.php';
if (isset($_POST['reset'])) {

    $id = $_POST['id'];
    $new_pass = $_POST['new_pass'];

    $strSQL = " UPDATE member SET password='$new_pass' WHERE m_id='$id'";

    if ($conn->query($strSQL) == TRUE) {
        echo "<script>
    $(document).ready(function() {
    Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'รีเซ็ต Password สำเร็จ',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location = './memberList.php';
          });
        });
    </script>";
    } else {
        echo "<script>
    $(document).ready(function() {
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'รีเซ็ต Password ไม่สำเร็จ',
        showConfirmButton: false,
        timer: 1500
      }).then((result) => {
        window.location = './memberList.php';
      });
    });
    </script>";
    }

    mysqli_close($conn);
}
?>