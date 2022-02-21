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
                        <h3 class="mb-4">ข้อมูลหนังสือ</h3>

                        <form action="./booksList.php" method="POST">
                            <div class="col-md-2 mb-3">
                                <label class="form-label">สถานะ</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1" selected>ปกติ/ว่าง</option>
                                    <option value="2">ยืม/ใช้งาน</option>
                                    <option value="3">ชำรุด</option>
                                    <option value="3">สุญหาย</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">เลขที่หนังสือ</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">ชื่อหนังสือ</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">ประเภทหนังสือ</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1" selected>นิยาย</option>
                                    <option value="2">คอมพิวเตอร์</option>
                                    <option value="3">ภาษาไทย</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">ราคาหนังสือ</label>
                                <input type="text" class="form-control">
                            </div>
                            <a href="./booksList.php" class="btn btn-secondary">ยกลิก</a>
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </form>
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