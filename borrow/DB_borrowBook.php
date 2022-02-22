<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
include_once '../config/connect.php';

$m_id = $_GET['m_id'];
$b_id = $_GET['book_id'];

$date = date('Y-m-d', strtotime("+4 day"));

$result = mysqli_query($conn, "SELECT * FROM book WHERE b_id='$b_id'");
while ($row = mysqli_fetch_array($result)) {
    $strSQL = "INSERT INTO booking (book_id, c_id, end_date, price, m_id) 
                    VALUES ('" . $row['book_id'] . "','" . $row['c_id'] . "','$date','" . $row['price'] . "','$m_id')";

    if ($conn->query($strSQL) == TRUE) {
    } else {
        echo "<script>
        $(document).ready(function() {
          Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'ยืมไม่สำเร็จ',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location = './selectBooks.php?id=$m_id';
          });
        });
        </script>";
    }
}

$sql = " UPDATE book SET status='ยืม/ใช้งาน' WHERE b_id='$b_id'";

if ($conn->query($sql) == TRUE) {
    echo "<script>
    $(document).ready(function() {
    Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'ยืมสำเร็จ',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location = './selectBooks.php?id=$m_id';
          });
        });
    </script>";
} else {
    echo "<script>
    $(document).ready(function() {
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'ยืมไม่สำเร็จ',
        showConfirmButton: false,
        timer: 1500
      }).then((result) => {
        window.location = './selectBooks.php?id=$m_id';
      });
    });
    </script>";
}

mysqli_close($conn);

?>