<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
if(isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = trim($_POST['password']);
    // extract($_POST);
    include_once 'connect.php';
    $sql = "SELECT * FROM member WHERE username = '" . mysqli_real_escape_string($conn, $username) . "' AND password ='" . mysqli_real_escape_string($conn, $password) . "' ";
      $rs = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($rs);


      if ($num > 0) {
        $row = mysqli_fetch_array($rs);
        $_SESSION["id"] = $row['m_id'];
        $_SESSION["username"]=$row['username'];
        $_SESSION["name"]=$row['m_name'];
        $_SESSION["address"]=$row['address']; 
        $_SESSION["phone"]=$row['phone']; 
        $_SESSION["status"]=$row['status']; 
        if ($row["status"] == 0) {
            $_SESSION["status"] = 'User';
          } else if ($row["status"] == 1) {
            $_SESSION["status"] = 'Admin';
          } else {
            session_destroy();
          }
        echo "<script>Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'เข้าสู่ระบบสำเร็จ !!',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location = 'dashboard.php';
          });
          </script>";
    }
    else
    {
        echo "<script>Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Username หรือ Password ผิด !!',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location = 'index.php';
          });
          </script>";
    }
}



?>