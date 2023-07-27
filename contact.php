<?php require 'inc/header.php'; 
$name = $phone =$message ='';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // Sanitize POST
  $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $name = trim($_POST['name']);
  $message = trim($_POST['message']);
  $phone = trim($_POST['phone']);
 
  if(empty($name)){
    flash('error', 'Please kindly enter your name.', 'alert alert-danger');
  }elseif (empty($phone)) {
    flash('error', 'Please enter your phone number', 'alert alert-danger');
  }elseif (strlen($phone) > 11 ) {
    flash('error', 'Invalid Phone Number.', 'alert alert-danger');
  }elseif (strlen($phone) < 11 ) {
    flash('error', 'Invalid Phone Number.', 'alert alert-danger');
  }elseif (empty($message)) {
    flash('error', 'Please enter message body', 'alert alert-danger');
  }else{

    $send_message = sendMessage($conn,$name,$phone,$message);
    if ($send_message) {
       flash('success','You Message has been sent successfully.. ');
      ?>
      <meta http-equiv='refresh' content='3.5; contact.php'>
      <?php
      }
  }
}



?>

    <!-- Header -->
    <header class="header">
      <!-- Hero -->
      <div class="hero text-primary pt-5 pb-4">
        <div class="container-xl">
          <div class="row">
            <div class="col-12">
              <h1 class="fw-semibold">Contact Information</h1>
            </div>
          </div>
        </div>
      </div>
      <svg
        class="frame-decoration"
        data-name="Layer 2"
        xmlns="http://www.w3.org/2000/svg"
        preserveAspectRatio="none"
        viewBox="0 0 1920 192.275"
      >
        <defs>
          <style>
            .cls-1 {
              fill: #f3f6f9;
            }
          </style>
        </defs>
        <title>frame-decoration</title>
        <path
          class="cls-1"
          d="M0,158.755s63.9,52.163,179.472,50.736c121.494-1.5,185.839-49.738,305.984-49.733,109.21,0,181.491,51.733,300.537,50.233,123.941-1.562,225.214-50.126,390.43-50.374,123.821-.185,353.982,58.374,458.976,56.373,217.907-4.153,284.6-57.236,284.6-57.236V351.03H0V158.755Z"
          transform="translate(0 -158.755)"
        />
      </svg>
    </header>

    <!-- Contact Form -->
    <section class="contact bg-light pb-4 mb-7">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <small class="fst-italic fw-semibold" style="font-size: 14px;text-decoration: underline;">Let's get in touch</small>
            <h3>Send us a message</h3>
            <?php flash('error'); ?>
            <?php flash('success');?>
            <form action="contact.php" method="POST">
              <div class="mb-3">
                <input
                  type="text"
                  class="form-control form-control-lg"
                  name="name"
                  placeholder="Name"
                  value="<?=$name?>"
                />
              </div>
              <div class="mb-3">
                <input
                  type="number"
                  class="form-control form-control-lg"
                  name="phone" value="<?=$phone?>"
                  placeholder="Phone number"
                />
              </div>
              <div class="mb-3">
                <textarea
                  class="form-control form-control-lg"
                  name="message"
                  rows="6"
                  placeholder="Message"
                ><?=$message?></textarea>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary text-white mt-3">
                  Send
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
              <img src="assets/img/flyer.jpeg" alt="" class="img-fluid shadow rounded-3" />
            </div>
          </div>
          <div class="col-lg-7">
            <div
              class="text-container text-white d-flex flex-column justify-content-center h-100 mb-5"
            >
              <h2 class="fw-bold">Prepare To Be There</h2>
              <h2 class="h4 fw-semibold badge">About Greater Bethesda</h2>
              <p>
                Tis an anual 3(three) days seminar retreat with the Lord, Divinely arranged and packaged for a greater visitation Of God than we saw in the pool of Bethesda...<span class="fw-bold">John 5:2-4</span>
              </p>
               <div class="d-grid">
              <a class="btn btn-primary " href="register.php">Register Now</a>
            </div>
            </div>
           
          </div>
        </div>
      </div>
    </section>

    <?php include 'inc/footer2.php'; ?>