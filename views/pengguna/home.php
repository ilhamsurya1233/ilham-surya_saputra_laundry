<?php 
    include_once '../template/header.php';
    // include_once '../template/topbar.php';
    include_once '../template/sidebar.php';
    ?>

  <!-- ======= Header ======= -->
  
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      
    <style>
      #hero .flex-column center{
 position:relative;
 top:331px;
 left:400px;
}
/* Body */
body{
 background-image:url("https://images.unsplash.com/photo-1677822188273-5e47af1f18af?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNTc5fDB8MXxhbGx8NXx8fHx8fDJ8fDE2Nzc4MzcxMTQ&ixlib=rb-4.0.3&q=80&w=2560");
}



    </style>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  
  

  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <center>
          <h1 data-aos="fade-up">Selamat Datang <?php echo $_SESSION['nama'] ?></h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Ini adalah home <?php echo $_SESSION['role'] ?></h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <?php if ($_SESSION['role'] == 'admin') {?>
              <a href="../produk/v_list_product.php"  class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Produk</span> 
                <i class="bi bi-arrow-right"></i>
              </a>
              <a href="../laporan/v_laporan.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Laporan</span> 
                <i class="bi bi-arrow-right"></i>
              </a>
              <?php } elseif($_SESSION['role'] == 'kasir') {?>
                <a href="../transaksi/v_transaksi.php"  class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Transaksi</span> 
                <i class="bi bi-arrow-right"></i>
              </a>
              <a href="../laporan/v_laporan.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Laporan</span> 
                <i class="bi bi-arrow-right"></i>
              </a>
                <?php } elseif($_SESSION['role'] == 'owner') {?>
                  <a href="../laporan/v_laporan.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Laporan</span> 
                <i class="bi bi-arrow-right"></i>
              </a>
                  <?php }?>

          </div>
          </center>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="../../assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../../assets/vendor/aos/aos.js"></script>
  <!-- <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/mainn.js"></script>
  <script src="../../assets/js/bundle.js?ver=3.1.2"></script>
    <script src="../../assets/js/scripts.js?ver=3.1.2"></script>

</body>
<!-- <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../../assets/css/sstyle.css" rel="stylesheet"> -->
</html>