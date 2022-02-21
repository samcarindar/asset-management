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
        <div class="row justify-content-center align-items-center" style="height: 80vh;">

            <div class="col-md-6">
                <div class="card p-4 my-5">
                    <div class="card-body">
                        <form action="check_login.php" method="POST">
                            <div class="text-center">
                                <h1 class="h2 mb-4 fw-bold">Sign In</h1>
                                <img class="mb-4" src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                                <h1 class="h3 mb-3 fw-normal">ระบบจัดการหนังสือห้องสมุด</h1>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="text-center mt-4">
                                <button class="btn btn-primary px-5" name="login" type="submit">Sign in</button>
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