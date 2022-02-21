<?php
session_start();
if(isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = trim($_POST['password']);
    // extract($_POST);
    include 'connect.php';
    $sql = "SELECT * FROM member WHERE username = '" . mysqli_real_escape_string($conn, $username) . "' AND password ='" . mysqli_real_escape_string($conn, $password) . "' ";
    echo $sql;
      $rs = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($rs);


      if ($num > 0) {
        $row = mysqli_fetch_array($rs);
        $_SESSION["id"] = $row['m_id'];
        $_SESSION["username"]=$row['username'];
        $_SESSION["name"]=$row['m_name'];
        $_SESSION["address"]=$row['address']; 
        $_SESSION["phone"]=$row['phone']; 
        header("Location: dashboard.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}



?>