<?php
session_start();
if (isset($_SESSION['message'])) {
  $a = "Chào mừng: " . $_SESSION['dataUser'];
  $b = "Sửa thông tin";
  $linkB = "Edit.php";
  $c = "Xóa tài khoản";
  $linkC = "#";
  $linkD = "Logout.php";
} else {
  $a = "Tài khoản";
  $b = "Đăng ký";
  $linkB = "Register.php";
  $c = "Đăng nhập";
  $linkC = "Login.php";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <?php if (isset($_SESSION['message_login'])) { ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <p>
          <?php echo ($_SESSION['message_login']);
            unset($_SESSION['message_login']) 
          ?>
        </p>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

    <?php } ?>

  </div>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">FB88</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $a ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php if (isset($_SESSION['message'])) { ?>
                <li><a class="dropdown-item" href="Edit.php?email=<?= $_SESSION['dataEmail'] ?>"><?php echo $b ?> </a></li>
              <?php } else { ?><li><a class="dropdown-item" href="<?php echo $linkB ?>"><?php echo $b ?></a></li><?php } ?>
              <li><a class="dropdown-item" href="<?php echo $linkC ?>"><?php echo $c ?></a></li>
              <?php if (isset($_SESSION['message'])) { ?>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="<?php echo $linkD ?>">Đăng xuất</a></li>
              <?php } ?>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>