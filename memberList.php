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

            <div class="col-md-10 px-4 my-4">
                <div class="card shadow p-2">
                    <div class="card-body">
                        <h3 class="float-start me-2">ข้อมูลสมาชิก</h3>
                        <a href="./insertmember.php" class="btn btn-sm btn-primary mb-3">เพิ่มสมาชิก</a>

                        <table class="table table-striped text-nowrap" id="myTable">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">เลขบัตรประชาชน</th>
                                    <th scope="col">ชื่อ - นามสกุล</th>
                                    <th scope="col">เบอร์โทรศัพท์</th>
                                    <th scope="col">Username</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1234567891235</td>
                                    <td>นายปัญญา นามสมมติ</td>
                                    <td>0812345678</td>
                                    <td>admin</td>
                                    <td class="col-2 text-end">
                                        <a href="./resetpassmember.php" class="btn btn-sm btn-info text-white">รีเซ็ต Password</a>
                                        <a href="./updatemember.php" class="btn btn-sm btn-warning text-white">แก้ไข</a>
                                        <button type="button" class="btn btn-sm btn-danger">ลบ</button>
                                    </td>
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