<?php

if(isset($_POST['register'])){

  include "../includes/connection.php";
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_pass = $_POST['confirm_pass'];
  $role = 'بیمار';

  if($password == $confirm_pass){
    $password = $_POST['password'];

  $select_users = "SELECT * from users_table where username='$username' or email='$email'";
  $result_user = mysqli_query($conn,$select_users);
  $count = mysqli_num_rows($result_user);

  if($count <= 0) {
    $user = "INSERT into users_table (username,email,password,role) values ('$username','$email',sha1($password),'$role')";
    $result = mysqli_query($conn,$user);


    if($result) {
      echo "<script>alert('کاربر با موفقیت ثبت شد')</script>";
      echo "<script>window.open('login.php','_self')</script>";
    } else {
      echo "<script>alert('کاربر با موفقیت ثبت نشد')</script>";
    }
  } else {
    echo "<script>alert('نام کاربری یا ایمل وجود دارد')</script>";
  }
  } else {
    echo "<script>alert('رمز عبور با هم یکسان نیست')</script>";
  }

}


?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">





  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <title>فورم ثبت نام</title>
      <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">
</head>
<body>
<header id="header" class="header sticky-top">

<div class="topbar d-flex align-items-center accent-background">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
      <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
    </div>
    <div class="social-links d-none d-md-flex align-items-center">
      <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>
  </div>
</div><!-- End Top Bar -->

<div class="branding d-flex align-items-cente">

  <div class="container position-relative d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1 class="sitename">کلینیک درمانی ابن سینا</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">خانه </a></li>
        <li><a href="#about" class="active">درباره ما</a></li>
        <li><a href="#services" class="active">خدمات</a></li>
        <li><a href="#contact" class="active">تماس با ما</a></li>
        <li><a href="./user_area/registration.php" class="active">ثبت نام </a></li>
        <li><a href="#" class="active">ورود</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>

</div>

</header>
    <div class=" w-50 m-auto my-5" dir="rtl">
<form method="post">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">نام</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="username" autocomplete="ob_clean" required="required"
   placeholder="نام خود را وارد کنید" require="required">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">رمز عبور</label>
  <input type="password" class="form-control" id="exampleFormControlInput1" name="password" autocomplete="ob_clean" required="required" placeholder="رمز عبور خود را وارد کنید">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">تایید رمز عبور</label>
  <input type="password" class="form-control" id="exampleFormControlInput1" name="confirm_pass" required="required" placeholder="رمز عبور را دوباره وارد کنید">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">ایمل</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name="email" autocomplete="ob_clean" required="required" placeholder="ایمل خود را وارد کنید">
</div>
<button type="submit" class="btn btn-success mb-3 " name="register">ثبت نام</button>
</form>
</div>

<?php include "../templates/footer.php";?>


</body>
</html>



