<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
include_once '../config/connect.php';
if (isset($_POST['update'])) {

  $id = $_POST['id'];
  $name = $_POST['name'];
  $card_id = $_POST['card_id'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $username = $_POST['username'];

  $strSQL = " UPDATE member SET m_card_id='$card_id', m_name='$name', username='$username', address='$address', phone='$phone' WHERE m_id='$id'";

  if ($conn->query($strSQL) == TRUE) {
    echo "<script>
    $(document).ready(function() {
    Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'แก้ไขข้อมูลสมาชิกสำเร็จ',
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
        title: 'แก้ไขข้อมูลสมาชิกไม่สำเร็จ',
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