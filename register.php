<!doctype html>
<html lang="en">

<head>
    <?php
    include("./layout/header.php");
    ?>
</head>

<body>
    <?php
    include("./layout/navbar.php");
    ?>


    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">

            <div class="col-md-6">
                <div class="card p-4 my-5">
                    <div class="card-body">
                        <form action="register_success.php" method="POST">
                            <div class="text-center">
                                <h1 class="h2 mb-4 fw-bold">Sign Up</h1>
                                <img class="mb-4" src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                                <h1 class="h3 mb-3 fw-normal">ระบบจัดการหนังสือห้องสมุด</h1>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="m_name" placeholder="ชื่อ - นามสกุล">
                                <label for="floatingInput">ชื่อ - นามสกุล</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="m_card_id" placeholder="เลขบัตรประจำตัวประชาชน">
                                <label for="floatingInput">เลขบัตรประจำตัวประชาชน</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="address" placeholder="ที่อยู่">
                                <label for="floatingInput">ที่อยู่</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="phone" maxlength="10" placeholder="เบอร์โทรศัพท์">
                                <label for="floatingInput">เบอร์โทรศัพท์</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="text-center mt-4">
                                <button class="btn btn-primary px-5" name="save" type="submit">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <?php
    include("./layout/script.php");
    ?>
</body>

</html>