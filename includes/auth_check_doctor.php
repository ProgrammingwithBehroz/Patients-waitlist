<?php
if(!isset($_SESSION['username']) or $_SESSION['role'] == "بیمار"){
    echo "<script>window.open('../../user_area/login.php','_self')</script>";
}
?>