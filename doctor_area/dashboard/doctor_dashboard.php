<?php
session_start();
include "../../includes/connection.php";
include "../../includes/auth_check_doctor.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد دوکتران</title>

      <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../user_area/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../user_area/assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../user_area/assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../user_area/assets/adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../user_area/assets/adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../user_area/assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../user_area/assets/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../user_area/assets/adminlte/plugins/summernote/summernote-bs4.min.css">

    <!-- Favicons -->
    <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../../assets/css/main.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<header id="header" class="header sticky-top">

<div class="topbar d-flex align-items-center accent-background">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
      <i class="bi bi-phone d-flex align-items-center ms-4"><span>+99 5589 55488 5</span></i>
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
        <li><a href="../../index.php#hero" class="active">خانه </a></li>
        <li><a href="../../index.php#about" class="active">درباره ما</a></li>
        <li><a href="../../index.php#services" class="active">خدمات</a></li>
        <li><a href="../../index.php#contact" class="active">تماس با ما</a></li>      
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>

</div>

</header>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-info elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          $user_id = $_SESSION['user_id'];
          $select = "SELECT * from doctors_table where user_id = $user_id";
          $result = mysqli_query($conn,$select);
          $row = mysqli_fetch_array($result);
          $image = $row['image'];
          $name = $row['full_name'];
          ?>
          <img src=<?php echo "../doctor_images/$image"?> class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <p class="d-block text-light"><?php echo($name)?></p>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                داشبورد
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./doctor_dashboard.php?patients" class="nav-link <?php if(isset($_GET['patients'])){echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>لیست بیماران منتظر</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./doctor_dashboard.php?current_patient" class="nav-link <?php if(isset($_GET['current_patient'])){echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>جزءیات بیمار ویزیت</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./doctor_dashboard.php?management" class="nav-link <?php if(isset($_GET['management'])){echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>مدیریت بیماران</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./doctor_dashboard.php?setting" class="nav-link <?php if(isset($_GET['setting'])){echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ویرایش حساب</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./doctor_dashboard.php?absence" class="nav-link <?php if(isset($_GET['absence'])){echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اعلان غیر حاظری</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../user_area/logout.php" class="nav-link" id="logout">
                  <i class="far fa-circle nav-icon"></i>
                  <p>خروج</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
              <script type="text/javascript">
$("#logout").click(function(){
    if(confirm("آیا از این کار مطمئن هستین؟")){
        $("#logout").attr();
    }
    else{
        return false;
    }
});
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php
            if(isset($_GET['patients'])){
                echo "<h1 class='m-0' dir='rtl'>لیست بیماران در صف انتظار</h1>";
            }

            if(isset($_GET['current_patient'])){
              echo "<h1 class='m-0' dir='rtl'>جزءیات بیماران در حال ویزیت</h1>";
            }
            
            ?>
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <?php
            if(isset($_GET['patients'])){
                include "./patients_queue.php";
            }

            if(isset($_GET['current_patient'])){
                include "./current_patient.php";
            }

            if(isset($_GET['management'])){
              include "./patients_management.php";
            }

            if(isset($_GET['setting'])){
              include "./setting.php";
            }

            if(isset($_GET['absence'])){
              include "./doctor_absence.php";
            }
        ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include"../../templates/footer.php";?>
<!-- jQuery -->
<script src="../../user_area/assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../user_area/assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../user_area/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../user_area/assets/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../user_area/assets/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../user_area/assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../user_area/assets/adminlte/plugins/moment/moment.min.js"></script>
<script src="../../user_area/assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../user_area/assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../user_area/assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../user_area/assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../user_area/assets/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../user_area/assets/adminlte/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../user_area/assets/adminlte/dist/js/pages/dashboard.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
