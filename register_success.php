<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
include_once './config/connect.php';
if (isset($_POST['save'])) {
  $name = $_POST['m_name'];
  $cardId = $_POST['m_card_id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  $sql = "INSERT INTO member (m_card_id,m_name,username,password,address,phone,status)
	 VALUES ('$cardId','$name','$username','$password','$address','$phone',0)";

  if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully !";
    echo "<script>
          $(document).ready(function() {
          Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'สมัครสมาชิกสำเร็จ !!',
                  showConfirmButton: false,
                  timer: 1500
                }).then((result) => {
                  window.location = './index.php';
                });
              });
          </script>";
  } else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
?>