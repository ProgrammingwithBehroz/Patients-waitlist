<?php

if(isset($_POST['login'])){
  session_start();
  include "../includes/connection.php";
  $username = $_POST['username'];
  $password = sha1($_POST['password']);

  $select_user = "SELECT * from users_table where username='$username' and password='$password'";
  $result = mysqli_query($conn,$select_user);
  $count = mysqli_num_rows($result);
  
  //
  if($count > 0){

    $gid = "SELECT * from users_table where username='$username' and password='$password'";
    $result1 = mysqli_query($conn,$gid);
    $row = mysqli_fetch_assoc($result);
    $id = $row['user_id'];
    $role = $row['role'];

    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['user_id'] = $id;

    if($role == 'بیمار'){
      echo "<script>alert('ورود با موفقیت انجام شد')</script>";
      echo "<script>window.open('./dashboard/patient_dashboard.php','_self')</script>";
    } else {
      echo "<script>alert('ورود با موفقیت انجام شد')</script>";
      echo "<script>window.open('../doctor_area/dashboard/doctor_dashboard.php','_self')</script>";
    }

    
    
  } else {
    echo "<script>alert('نام کاربری یا رمز عبور اشتباه است')</script>";
  }
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ورود</title>

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
      <h1 class="sitename">کلینیک درمانی ابلی سینا</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">خانه </a></li>
        <li><a href="#about" class="active">درباره ما</a></li>
        <li><a href="#services" class="active">خدمات</a></li>
        <li><a href="#contact" class="active">تماس با ما</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>

</div>

</header>
    <div class=" w-50 m-auto my-5">
<form method="post" dir="rtl">
<div class="mb-3">
  <label for="name" class="form-label">نام</label>
  <input type="text" class="form-control" id="name" name="username"
   placeholder="نام خود را وارد کنید" required autocomplete="off">
</div>
<div class="mb-3">
  <label for="password" class="form-label">رمز عبور</label>
  <input type="password" class="form-control" id="password" required name="password" placeholder="رمز عبور خود را وارد کنید" autocomplete="off">
</div>
<button type="submit" class="btn btn-success mb-3" name="login">ورود</button>
</form>
</div>

<?php include "../templates/footer.php";?>
</body>
</html>
