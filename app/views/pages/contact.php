<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Discipleship, discipleship works, discipleship labour, discipleship in Suleja Niger state Nigeria, Suleja disciples, Greater Bethesda, Pool of Bethesda,">
  <meta name="description" content="We are a small group of nobodys trusting only in the merit of our Lord Jesus whom alone is Somebody...">
  <meta name="author" content="Nneli Ifeanyi Victor">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo URLROOT; ?>/img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo URLROOT; ?>/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URLROOT; ?>/img/favicon-16x16.png">
  <link rel="manifest" href="<?php echo URLROOT; ?>/site.webmanifest">

  <link href="<?php echo URLROOT; ?>/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome.css" />

  <title>Suleja Disciples</title>
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">
      <a href="<?php echo URLROOT; ?>/pages" class="navbar-brand">
        <img src="<?php echo URLROOT; ?>/img/favicon.ico" alt="" height="30px" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/pages" class="nav-link fw-semibold">Home</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/pages/register" class="nav-link fw-semibold">Register</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/pages/contact" class="nav-link btn btn-outline-primary fw-semibold px-4 mx-4">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Header -->
  <header class="header mt-5">
    <!-- Hero -->
    <div class="hero text-primary pt-5 pb-4">
      <div class="container-xl">
        <div class="row">
          <div class="col-12">
            <h1 class="fw-semibold">Contact Us</h1>
          </div>
        </div>
      </div>
    </div>
    <svg class="frame-decoration" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 192.275">
      <defs>
        <style>
          .cls-1 {
            fill: #f3f6f9;
          }
        </style>
      </defs>
      <title>frame-decoration</title>
      <path class="cls-1" d="M0,158.755s63.9,52.163,179.472,50.736c121.494-1.5,185.839-49.738,305.984-49.733,109.21,0,181.491,51.733,300.537,50.233,123.941-1.562,225.214-50.126,390.43-50.374,123.821-.185,353.982,58.374,458.976,56.373,217.907-4.153,284.6-57.236,284.6-57.236V351.03H0V158.755Z" transform="translate(0 -158.755)" />
    </svg>
  </header>

  <!-- Contact Form -->
  <section class="contact bg-light pb-4 mb-7">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <small class="fst-italic fw-semibold" style="font-size: 14px;text-decoration: underline;">Let's get in touch</small>
          <h3>Send us a message</h3>
          <form action="contact.php" method="POST">
            <div class="mb-3">
              <input type="text" class="form-control form-control-lg" name="name" placeholder="Name" value="" />
            </div>
            <div class="mb-3">
              <input type="number" class="form-control form-control-lg" name="phone" value="" placeholder="Phone number" />
            </div>
            <div class="mb-3">
              <textarea class="form-control form-control-lg" name="message" rows="6" placeholder="Message"></textarea>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary text-white mt-3">
                <i class="fa fa-paper-plane fa-2x" arial-hidden="true"></i> Send
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Download -->
  <section class="download bg-dark">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-5">
          <div class="image-container mt-n6 mb-5 ">
            <img src="<?php echo URLROOT; ?>/img/flyer2.jpg" alt="" class="img-fluid shadow rounded-3" />
          </div>
        </div>
        <div class="col-lg-7">
          <div class="text-container text-white d-flex flex-column justify-content-center h-100 mb-5">
            <h2 class="fw-bold">Prepare To Be There</h2>
            <h2 class="h4 fw-semibold badge">About Greater Bethesda</h2>
            <p>
              Tis an anual 3(three) days seminar retreat with the Lord, Divinely arranged and packaged for a greater visitation Of God than we saw in the pool of Bethesda...<span class="fw-bold">John 5:2-4</span>
            </p>
            <div class="d-grid">
              <a class="btn btn-primary " href="<?php echo URLROOT; ?>/pages/register">
                <i class="fas fa-pencil"></i> Register Now</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</body>

</html>