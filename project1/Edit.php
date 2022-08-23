<?php
include "./User.php";
// lấy thông tin theo email

if ($_GET['email']) {
  $email = $_SESSION['dataEmail'];
  $user = Auth::find($email);
} else {
  header("location:./index.php");
}



$err = [];


//Xử lý update
if (isset($_POST['submit'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $rPassword = $_POST['rPassword'];

  if (empty($username)) {
    $err['username'] = 'Bạn chưa nhập tên';
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
    $dataUpdate = [
      'username' => $_POST['username'],
      'password' => $pass,
      'email' => $_SESSION['dataEmail']
      // 'password'=>$_POST['password']
    ];

    Auth::update($dataUpdate);
    if (isset($_SESSION['message_update'])) {
      header("location:./Index.php");
    }
    else{
      echo '<script>alert("Cập nhật thông tin thất bại")</script>';
    }
  }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EditUser</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

  <!-- Section: Design Block -->
  <section class="background-radial-gradient overflow-hidden">
    <style>
      .background-radial-gradient {
        background-color: hsl(218, 41%, 15%);
        background-image: radial-gradient(650px circle at 0% 0%,
            hsl(218, 41%, 35%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%),
          radial-gradient(1250px circle at 100% 100%,
            hsl(218, 41%, 45%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%);
      }

      #radius-shape-1 {
        height: 220px;
        width: 220px;
        top: -60px;
        left: -130px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
      }

      #radius-shape-2 {
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
        bottom: -60px;
        right: -110px;
        width: 300px;
        height: 300px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
      }

      .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.9) !important;
        backdrop-filter: saturate(200%) blur(25px);
      }
    </style>

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            The best offer <br />
            <span style="color: hsl(218, 81%, 75%)">for your business</span>
          </h1>
          <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Temporibus, expedita iusto veniam atque, magni tempora mollitia
            dolorum consequatur nulla, neque debitis eos reprehenderit quasi
            ab ipsum nisi dolorem modi. Quos?
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
              <form action="" method="post">
                <h1>Edit account</h1>

                <!-- username input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3" class="form-control" name="username" />
                  <label class="form-label" for="form3Example3"><?php echo $_SESSION['dataEmail']; ?></label>
                  <div id="usernamelHelp" class="text-danger">
                    <span><?php echo (isset($err['username'])) ? $err['username'] : "" ?></span>
                  </div>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4" class="form-control" name="password" />
                  <label class="form-label" for="form3Example4">Password</label>
                  <div class="text-danger">
                    <span><?php echo (isset($err['password'])) ? $err['password'] : "" ?></span>
                  </div>
                </div>

                <!-- confirm Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4" class="form-control" name="rPassword" />
                  <label class="form-label" for="form3Example4">Password</label>
                  <div class="text-danger">
                    <span><?php echo (isset($err['rPassword'])) ? $err['rPassword'] : "" ?></span>
                  </div>
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                  <label class="form-check-label" for="form2Example33">
                    Minh đẹp trai!
                  </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4" style="width: 100%;" name="submit">
                  SUBMIT
                </button>

                <!-- Register buttons -->
                <div class="text-center">
                  <p>or <a href="./Index.php">back to page</a></p>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>