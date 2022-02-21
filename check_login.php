<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
session_start();
if (isset($_POST['login'])) {
  $username = $_POST["username"];
  $password = trim($_POST['password']);
  // extract($_POST);
  include_once 'connect.php';
  $sql = "SELECT * FROM member WHERE username = '" . mysqli_real_escape_string($conn, $username) . "' AND password ='" . mysqli_real_escape_string($conn, $password) . "' ";
  $objQuery = mysqli_query($conn, $sql);
  $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

  if (!$objResult) {

    echo "<script>
      $(document).ready(function() {
        Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'Username หรือ Password ผิด !!',
          showConfirmButton: false,
          timer: 1500
        }).then((result) => {
          window.location = 'index.php';
        });
      });
    </script>";
  } else {
    $_SESSION["id"] = $objResult['m_id'];
    $_SESSION["username"] = $objResult['username'];
    $_SESSION["name"] = $objResult['m_name'];
    $_SESSION["address"] = $objResult['address'];
    $_SESSION["phone"] = $objResult['phone'];
    $_SESSION["status"] = $objResult['status'];
    if ($objResult["status"] == 0) {
      $_SESSION["status"] = 'User';
    } else if ($objResult["status"] == 1) {
      $_SESSION["status"] = 'Admin';
    } else {
      session_destroy();
    }

    session_write_close();

    // echo "<script>
    //   $(document).ready(function() {
    //     Swal.fire({
    //       position: 'center',
    //       icon: 'success',
    //       title: 'เข้าสู่ระบบสำเร็จ !!',
    //       showConfirmButton: false,
    //       timer: 1500
    //     }).then((result) => {
    //       window.location = 'dashboard.php';
    //     });
    //   });
    // </script>";

    header("location:./dashboard.php");
  }
  mysqli_close($conn);
}



?>