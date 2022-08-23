<?php
include './User.php';

Auth::logout();
unset($_SESSION['message']);
header("location:./Index.php");
?>