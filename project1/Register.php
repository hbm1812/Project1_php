<?php
include './User.php';

$err = [];
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rPassword = $_POST['rPassword'];

    if (empty($username)) {
        $err['username'] = 'Bạn chưa nhập tên';
    }
    if (empty($email)) {
        $err['email'] = 'Bạn chưa nhập email';
    }
    if (empty($password)) {
        $err['password'] = 'Bạn chưa nhập mật khẩu';
    }
    if ($password != $rPassword) {
        $err['rPassword'] = 'Mật khẩu không khớp';
    }

    if (!isset($_POST['cb'])) {
        $err['cb'] = 'Ơ kìa, bạn không thấy Minh dep trai à, buồn quá, vậy thì mình không cho đăng ký đâu :(((';
    }


    if (empty($err)) {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $dataRegister = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $pass
            // 'password'=>$_POST['password']
        ];

        Auth::register($dataRegister);
        $_SESSION['message_Register'] = "Create success";
        header('location:./Login.php');
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
         background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg'); 
        height: 300px;
        "></div>
        <!-- Background image -->

        <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        background-image: url(./img/514134.jpg);
        backdrop-filter: blur(30px);
        ">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Sign up now</h2>
                        <form action="" method="post">
                            <!-- 2 column grid layout with text inputs for the first and last names -->


                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input type="email" id="form3Example3" class="form-control" name="email" placeholder="email" />
                                <div id="emailHelp" class="text-danger">
                                    <span><?php echo (isset($err['email'])) ? $err['email'] : "" ?></span>
                                </div>
                            </div>

                            <!-- username -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input type="text" id="form3Example3" class="form-control" name="username" placeholder="username" />
                                <div id="usernamelHelp" class="text-danger">
                                    <span><?php echo (isset($err['username'])) ? $err['username'] : "" ?></span>
                                </div>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input type="password" id="form3Example4" class="form-control" name="password" placeholder="password" />
                                <div class="text-danger">
                                    <span><?php echo (isset($err['password'])) ? $err['password'] : "" ?></span>
                                </div>
                            </div>

                            <!-- Password confirm -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Confirm Password</label>
                                <input type="password" id="form3Example4" class="form-control" name="rPassword" placeholder="confirm password" />
                                <div class="text-danger">
                                    <span><?php echo (isset($err['rPassword'])) ? $err['rPassword'] : "" ?></span>
                                </div>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" name="cb" />
                                <label class="form-check-label" for="form2Example33">
                                    Minh dep trai!

                                </label>

                            </div>
                            <div class="text-danger">
                                <span><?php echo (isset($err['cb'])) ? $err['cb'] : "" ?></span>
                            </div>
                            <br>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">
                                Sign up
                            </button>



                            <div class="text-center">
                                <p>Have account? <a href="./Login.php">Login Here</a></p>
                            </div>


                            <!-- Register buttons -->
                            <!-- <div class="text-center">
                                <p>or sign up with:</p>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>

                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                </button>

                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                </button>

                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-github"></i>
                                </button>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>