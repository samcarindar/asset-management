<?php
include("./connect.php");
session_start();

if (!isset($_SESSION['status'])) {
    echo "<script type='text/javascript'>";
    echo "alert('ยังไม่ได้เข้าสู่ระบบ');";
    echo "window.location = './index.php'; ";
    echo "</script>";
}
?>

<!doctype html>
<html lang="en">

<head>
    <?php
    include("./layout/header.php");
    ?>

    <style>
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            margin: 13px auto;
            padding: 0;
        }

        .card .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-size: 14px;
            font-weight: 400;
            padding: 4px 10px !important;
            border: 1px solid #7b7b7b !important;
            border-radius: 3px;
            color: #fff !important;
            cursor: pointer !important;
            margin: auto 2px !important;
            background: #7b7b7b !important;
        }

        .card .dataTables_wrapper .dataTables_paginate span .paginate_button {
            border: 1px solid #2b2b2b !important;
            color: #2b2b2b !important;
            background: #fff !important;
        }

        .card .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            opacity: 0.8 !important;
            color: #fff !important;
        }

        .card .dataTables_wrapper .dataTables_paginate span .paginate_button:hover {
            opacity: 1 !important;
            color: #2b2b2b !important;
        }
    </style>
</head>

<body>

    <div class="container-fluid" style="background-color: #f2f2f2;">
        <div class="row">
            <?php
            include("./layout/sidebar.php");
            ?>

            <div class="col-md-10 px-4">
                <div class="row justify-content-center">
                    <div class="col-md-3 py-3">
                        <div class="card border-primary border-2 shadow mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="card-title">หนังสือรวม</h5>
                                    <p class="card-text h3 fw-nomel">12345</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 py-3">
                        <div class="card border-danger border-2 shadow mb-3">
                            <div class="card-body">
                                <h5 class="card-title">ถูกยืม</h5>
                                <p class="card-text h3 fw-nomel">13</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 py-3">
                        <div class="card border-info border-2 shadow mb-3">
                            <div class="card-body">
                                <h5 class="card-title">ชำรุด/สูญหาย</h5>
                                <p class="card-text h3 fw-nomel">10</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 py-3">
                        <div class="card border-success border-2 shadow mb-3">
                            <div class="card-body">
                                <h5 class="card-title">สมาชิก</h5>
                                <p class="card-text h3 fw-nomel">3</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card shadow p-2">
                    <div class="card-body">
                        <h3 class="float-start me-2">รายการหนังสือทั้งหมด</h3>
                        <button type="button" class="btn btn-sm btn-primary mb-3">Export Excel</button>

                        <table class="table table-striped text-nowrap" id="myTable">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">ชื่อข้อมูลหนังสือ</th>
                                    <th scope="col">ปีที่ซื้อ</th>
                                    <th scope="col">ราคา (บาท)</th>
                                    <th scope="col">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>หนังสือภาษาไทย</td>
                                    <td>2563</td>
                                    <td>250.00</td>
                                    <td>ปกติ/ว่าง</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <?php
    include("./layout/script.php");
    ?>
</body>

</html>