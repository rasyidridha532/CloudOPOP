<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Portal OPOP</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url(); ?>assets/dist/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?= base_url(); ?>assets/dist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/dist/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="<?= base_url(); ?>assets/dist/css/landing-page.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="<?= base_url(); ?>assets/dist/img/logo_opop.png" width="150" height="50"></a>
      <a href="#registrasi">Cara Registrasi</a>
      <a class="btn btn-primary" href="<?= base_url('auth'); ?>">Log In</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">One Pesantren One Product</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fab fa-envira m-auto text-primary"></i>
            </div>
            <h3>Mengapa OPOP?</h3>
            <p class="lead mb-0">Sebagian besar pesantren di Jawa Barat belum mampu mandiri secara ekonomi untuk membiayai kebutuhan operasional maupun pengembangan sarana dan prasarana pesantren.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="far fa-chart-bar m-auto text-primary"></i>
            </div>
            <h3>Target OPOP</h3>
            <p class="lead mb-0">Pesantren yang memiliki visi dan niat untuk menjalankan usaha, memiliki SDM, memiliki lahan, ketersediaan bahan baku, potensi pasar dan lain-lain.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-store m-auto text-primary"></i>
            </div>
            <h3>Tujuan OPOP</h3>
            <p class="lead mb-0">Membangun kemandirian pesantren melalui pemberdayaan ekonomi dengan cara membantu pesantren dalam memilih komoditi yang laku di pasar, memberi pelatihan dan pendampingan.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase" id="registrasi">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-3 order-lg-2 text-white showcase-img" style="background-image: url('/assets/dist/img/pesantren.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>1. Syarat Untuk Pesantren</h2>
          <p class="lead mb-0">Syarat pendaftaran untuk pesantren</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-3 text-white showcase-img" style="background-image: url('/assets/dist/img/ppesantren1.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>2. Syarat untuk Perwakilan Pesantren</h2>
          <p class="lead mb-0">Syarat pendaftaran untuk perwakilan pesantren</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-3 order-lg-2 text-white showcase-img" style="background-image: url('/assets/dist/img/ppesantren2.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Registrasi ke OPOP</h2>
          <p class="lead mb-0">Registrasi di link OPOP. <a href="https://opop.jabarprov.go.id/">Link Registrasi</a></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">Pesantren yang terdaftar di OPOP saat ini</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <a href="http://daaruttauhid.opopjabar.me/"><img class="img-fluid rounded-circle mb-3" src="<?= base_url(); ?>assets/dist/img/dt.png" alt=""></a>
            <h5>Daarut Tauhid Bandung</h5>
            <p class="font-weight-light mb-0">Jl. Gegerkalong Girang No. 67 Bandung</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">&copy; OPOP 2020. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="https://www.facebook.com/pesantrenjuara">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="https://www.youtube.com/channel/UCWmBmnx2laPk1QAVQqQ-RSQ">
                <i class="fab fa-youtube-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://www.instagram.com/opopjabar">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url(); ?>assets/dist/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>