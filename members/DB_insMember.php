<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
include_once '../config/connect.php';
if (isset($_POST['insert'])) {
  $name = $_POST['name'];
  $card_id = $_POST['card_id'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $strSQL = "INSERT INTO member (m_card_id, m_name, username, password, address, phone) 
                    VALUES ('$card_id','$name','$username','$password','$address', '$phone')";

  if ($conn->query($strSQL) == TRUE) {
    echo "<script>
    $(document).ready(function() {
    Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'เพิ่มสมาชิกสำเร็จ',
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
            title: 'เพิ่มสมาชิกไม่สำเร็จ',
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