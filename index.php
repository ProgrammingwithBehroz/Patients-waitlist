<?php

session_start();

if(isset($_GET['lang'])){
session_start();

if($_GET['lang'] == 'fa'){

  $lang = $_GET['lang'];
  $_SESSION['lang'] = $lang;
} else {
  $lang = $_GET['lang'];
  $_SESSION['lang'] = $lang;
}

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>کلینک درمانی ابلی سینا</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
        .waiting-list {
            margin-top: 20px;
        }
        .doctor-info, .waiting-list {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>

  
</head>

<body class="index-page">

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
        <li><a href="#hero" class="active">خانه </a></li>
        <li><a href="#about" class="active">درباره ما</a></li>
        <li><a href="#services" class="active">خدمات</a></li>
        <li><a href="#contact" class="active">تماس با ما</a></li>
        
        <?php
        if(isset($_SESSION['username'])){
          if($_SESSION['role'] == 'بیمار'){
            echo "<li><a href='./user_area/dashboard/patient_dashboard.php' class='active'>پروفایل</a></li>";
          } else {
            echo "<li><a href='./doctor_area/dashboard/doctor_dashboard.php' class='active'>پروفایل</a></li>";
          }
          
        } else {
          echo "<li><a href='./user_area/registration.php' class='active'>ثبت نام</a></li>";
        }
        
        ?>    
        
        <?php
        if(isset($_SESSION['username'])){
          echo "<li><a href='./user_area/logout.php' class='active'>خروج</a></li>";
        } else {
          echo "<li><a href='./user_area/login.php' class='active'>ورود</a></li>";
        }
        
        ?>      
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>

</div>

</header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section accent-background">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active">
          <img src="assets/img/istockphoto-1404962407-612x612.jpg" alt="">
          <div class="carousel-container">
            <h2>به کلینیک ابلی سینا خوش آمدید</h2>
            <p>بیماران را به گذاشتن نظر در شبکه‌های اجتماعی یا سایت‌هایی مثل نی‌نی سایت تشویق کنید.
               به آن‌ها بگویید که می‌توانید تجربهٔ خود را بیان کنید تا بتوانید خدمات بهتری ارائه کنید. 
              اگر کار خود را در بخش ارائهٔ خدمات درست انجام داده باشید، یک هیاهوی خارق‌‌العاده حول نام شما شکل می‌گیرد.</p>
              <a href="#about" class="btn-get-started">همین حالا شروع کن</a>
          </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="assets/img/istockphoto-1176308870-612x612.jpg" alt="">
          <div class="carousel-container">
            <h2>تبلیغات دهان‌به‌دهان معجزه می‌کند</h2>
            <p>۵۰ درصد بیماران از طرف خانواده و دوستان بیمارهای فعلی با مطب آشنا شد
              ه‌اند. البته سهم پزشک‌های متخصص از عمومی بیشتر بو
              ده است؛ بنابراین می‌توان نتیجه گرفت هرچه موضوع حیاتی‌تر باشد، بیشتر به حرف اطرافیان توجه می‌کنند.</p>
            <a href="#about" class="btn-get-started">همین حالا شروع کن</a>
          </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="assets/img/arab-female-doctor-hijab-poses-modern-clinic_875825-182908.avif" alt="">
          <div class="carousel-container">
            <h2>ارسال پیامک انبوه</h2>
            <p>یکی از راه‌های جذب بیمار به مطب، هدف‌گرفتن مردم یک منطقه است.
               شما می‌توانید پیامک خود را فقط برای محلهٔ مشخصی ارسال کنید. 
               در این حالت، بیمارانی با شما آشنا می‌شوند که می‌توانند به‌راحتی به مطب شما بیایند؛ حتی پیاده!</p>
               <a href="#about" class="btn-get-started">همین حالا شروع کن</a>
          </div>
        </div><!-- End Carousel Item -->

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->

  </main>

      <!-- About Section -->
      <section id="about" class="about section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>درباره ما</h2>
  <p>ئودذریبخهت مندابمبیاخحتهصثخح منسثیلمن تیسدممنثصمنتد بنلمدین منیتبلمنیلییل</p>
</div><!-- End Section Title -->

<div class="container" dir='rtl'>

  <div class="row gy-4">
    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
      <img src="./user_area//assets//adminlte//dist//img//ai-generated-8881542_640.webp" class="img-fluid" alt="">
      <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
    </div>
    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
      <h3>دینسمتب یسنمتبمینیس یسنتبیسمنبت یسبنیستبثصهخفع حخثقص منتمسنیبل</h3>
      <p class="fst-italic">

      </p>
      <ul>
        <li><i class="bi bi-check2-all"></i> <span>دنرتمیبله خصثمنرذس دیئمنلت یصخه ینمدریمسندبنیسمتب</span></li>
        <li><i class="bi bi-check2-all"></i> <span>یسنرتدبخهصث ودسبیسمهن بحثفهصثهع سمینابلیسنملباسیبلی.</span></li>
        <li><i class="bi bi-check2-all"></i> <span>یسبنیسناب دنصتقلخهصثف ختهتبلایسخبلاصیخه اخحسییسوتذدلصیسملاحخصث حخرذسینمدلص خهثخهلتصثن امنیلئسمیندخهحت  یسمنلیتسلمنیسلیلیسب بیذبی.</span></li>
      </ul>
      <p>
      کلینیک آبیل سینا یکی از مراکز معتبر درمانی است که خدمات پزشکی و درمانی مختلفی را به مراجعین خود ارائه می‌دهد. این کلینیک با بهره‌گیری از تیم متخصص و تجهیزات پیشرفته، در زمینه‌های مختلف مانند جراحی‌های تخصصی، درمان‌های زیبایی، مشاوره‌های پزشکی و فیزیوتراپی فعالیت می‌کند. هدف کلینیک آبیل سینا، ارائه خدمات بهداشتی و درمانی با کیفیت بالا و بهبود سلامت و رفاه بیماران است. به علاوه، محیط آرام و حرفه‌ای این کلینیک باعث اطمینان بیشتر بیماران از دریافت بهترین مراقبت‌ها می‌شود.
      </p>
    </div>
  </div>

</div>

</section><!-- /About Section -->



  <!-- Services Section -->
  <section id="services" class="services section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>خدمات ما</h2>
  <p>خدمت از ما بازار آنلاین برای دسترسی آسان به متخصصین خدمات است، مکانی برای یافتن متخصصین با امتیاز و نظر از مشتریان قبلی آن ها. </p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row g-5">

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
      <div class="service-item item-cyan position-relative">
        <i class="bi bi-activity icon"></i>
        <h3><a href="service-details.html" class="read-more stretched-link">لابراتوار</a></h3>
        <p>“خدمات پیشرفته لابراتوار کلینیک درمانی ابن‌سینا؛ تضمین دقت و سرعت در انجام آزمایش‌های پزشکی برای سلامت شما.</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
      <div class="service-item item-orange position-relative">
        <i class="bi bi-broadcast icon"></i>
        <h3><a href="service-details.html" class="read-more stretched-link">گراف قبی</a></h3>
        <p>گراف قلب دقیق و پیشرفته در کلینیک درمانی ابن‌سینا؛ مراقبت از قلب شما، اولویت ماست.</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
      <div class="service-item item-teal position-relative">
        <i class="bi bi-easel icon"></i>
        <h3><a href="service-details.html" class="read-more stretched-link">تلیوزیونی</a></h3>
        <p>تلویزیوفناوری‌های پیشرفته، تجربه‌ای بی‌نظیر از تماشای برنامه‌ها با کیفیت بالا را برای مخاطبان فراهم می‌آورد.</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
      <div class="service-item item-red position-relative">
        <i class="bi bi-bounding-box-circles icon"></i>
        <h3><a href="service-details.html" class="read-more stretched-link">ولادت</a></h3>
        <p>ولادت یک رویداد پرخیر و برکت است که به همراه خود شادی، امید و شروعی تازه می‌آورد. این لحظه، نماد تولدی دوباره است که نه تنها برای فرد، بلکه برای خانواده و جامعه نیز معانی عمیق‌تری دارد. جشن ولادت فرصتی است برای تجدید آرزوها و ارتباط عمیق‌تر با زندگی و دنیای پیرامون. هر ولادت، آغاز یک داستان جدید است که به ما یادآوری می‌کند چقدر زندگی گرانبها و شگفت‌انگیز است.</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
      <div class="service-item item-indigo position-relative">
        <i class="bi bi-calendar4-week icon"></i>
        <h3><a href="service-details.html" class="read-more stretched-link">عملیات سیزارین</a></h3>
        <p>عملیات سزارین یک روش جراحی است که برای تولد نوزاد از طریق برش در دیواره شکم مادر انجام می‌شود. این روش زمانی به کار می‌رود که تولد طبیعی به دلایلی مانند مشکلات جنینی، وضعیت سلامت مادر یا جنین، یا مسائل پزشکی دیگر امکان‌پذیر نباشد. سزارین به عنوان یک انتخاب ایمن و موثر در بسیاری از موارد، به مادر و نوزاد کمک می‌کند تا در شرایط بهتری به دنیای جدید وارد شوند. مراقبت‌های پزشکی پیشرفته، این عمل را به گزینه‌ای مطمئن و قابل اعتماد تبدیل کرده است.</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
      <div class="service-item item-pink position-relative">
        <i class="bi bi-chat-square-text icon"></i>
        <h3><a href="service-details.html" class="read-more stretched-link">عملیات هیمورویت</a></h3>
        <p>عملیات همورویید یا هموروئیدکتومی، یک روش جراحی است که برای درمان هموروئیدهای دردناک یا شدید انجام می‌شود. این عمل به کمک تکنیک‌های پیشرفته و با دقت بالا، به کاهش درد، خونریزی و ناراحتی ناشی از هموروئیدها کمک می‌کند. با انجام این عمل، بیماران می‌توانند به زندگی بدون درد و با کیفیت بهتر بازگردند. تحت نظر پزشک متخصص، هموروئیدکتومی یک گزینه مطمئن برای درمان هموروئیدهای مزمن و مقاوم به درمان‌های دارویی است.</p>
      </div>
    </div><!-- End Service Item -->

  </div>

</div>

</section><!-- /Services Section -->

  <!-- Contact Section -->
  <section id="contact" class="contact section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>ارتباط با ما</h2>
  <p></p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4">

    <div class="col-lg-5">

      <div class="info-wrap">
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>آدرس</h3>
            <p>G43J+Q3X, Kabul, Afghanistan</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>شماره موبایل</h3>
            <p>+99 5589 55488 5</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>ایمل</h3>
            <p>info@example.com</p>
          </div>
        </div><!-- End Info Item -->

        <iframe src="https://www.google.com/maps/place/Ali+Sina+hospital/@34.5233895,69.0970511,13z/data=!4m10!1m2!2m1!1shospital!3m6!1s0x38d169006c27e107:0x367a28134567949a!8m2!3d34.5045571!4d69.1305088!15sCghob3NwaXRhbJIBEGdlbmVyYWxfaG9zcGl0YWzgAQA!16s%2Fg%2F11vwyz2jx3?entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoASAFQAw%3D%3D" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>


  </div>

</div>

</section><!-- /Contact Section -->



<?php require "./templates/footer.php";?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>