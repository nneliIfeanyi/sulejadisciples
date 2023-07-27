<?php require 'inc/header.php'; ?>
<style>
.cssmarquee {
height: 50px;
overflow: hidden;
position: relative;
}
.cssmarquee h1 {
position: absolute;
width: 100%;
height: 100%;
margin: 0;
z-index: 5;
text-align: center;
transform:translateX(100%);
animation: cssmarquee 12s linear infinite;
}
@keyframes cssmarquee {
0% {
transform: translateX(100%);
}
100% {
transform: translateX(-100%);
}
}
</style>
<?php if(isset($_SESSION['username'])): ?>

 <div class="row">
   <div class="col-md-3">
    <?php include 'inc/nav.php'; ?>
   </div>
   <div class="col-md-9">
    <div class=" mx-auto">
      <div class="card card-body bg-light my-3">
        <?php flash('error'); ?>
        <?php flash('success');?>
        <p class="text-success lead">Welcome Back! Admin</p>
        <p class="lead fw-semibold">Greater Bethesda 2023 <br><span class="badge bg-primary">theme</span></p>
        <h1 class="display-3 fw-bold">The Glory of the Gospel</h1>
        <p>Please use the form below to register individual participants.</p>

        <form action="register.php" method="post">
          <div class="form-group">
              <label>Surname:<sup class="text-danger">*</sup></label>
              <input type="text" name="surname" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="">
              <span class="invalid-feedback"></span>
          </div>    
          <div class="form-group mb-2">
              <label>Other Names:<sup class="text-danger">*</sup></label>
              <input type="text" name="other_names" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="">
              <span class="invalid-feedback"></span>
          </div>
          <div class="form-group mb-2">
              <label>Phone Number:<sup class="text-danger">*</sup></label>
              <input type="number" name="phone" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="">
              <span class="invalid-feedback"></span>
          </div>
          <div class="form-group mb-2">
              <label>Local Assembly:<sup class="text-danger">*</sup></label>
              <input type="text" name="church" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="">
              <span class="invalid-feedback"></span>
          </div>

          <div class="form-group">
              <label>Invited by:</label>
              <input type="text" name="referee" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="">
              <span class="invalid-feedback"></span>
          </div>
          <div class="form-row my-4">
            <div class="col-6 mb-2">
              <input type="submit" class="btn btn-success px-5" value="Register">
            </div>
          </div>
        </form>

      </div>
    </div>
   </div>
 </div>
 <?php include 'inc/footer.php'; ?>
<?php else : ?>
  <header class="header">
      <!-- Hero -->
      <div class="hero pt-1 pb-4">
        <div class="cssmarquee container p-3">
          <i class="fas fa-bullhorn fa-flip-horizontal fa-3x text-primary" style="position: absolute; top: 0;right: 0;z-index: 10;"></i>
          <h1 class="fst-italic lead text-primary fw-semibold" style="font-size: 17px;margin-top: -3px;"> God's Great visitation is here again!!</h1>
        </div> 
        <div class="container">
          <div class="pt-2 pb-3">
            <p class="lead fw-semibold">Greater Bethesda 2023 <br><span class="badge bg-primary">theme</span></p>
            <h1 class="display-1 pb-2 fw-bold">The Glory of the Gospel</h1>
            <p class=""><span class="" style="font-size: 12px;"> Thursday <span class="fw-bold"> 10th August</span> -- Saturday <span class="fw-bold"> 12th August</span> 2023</span></p>
             <a href="register.php" class="btn btn-outline-primary px-7">
               Registration
             </a>
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
  <!-- Statement -->
  <section class="statement my-2">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="text-container bg-light p-5 rounded-5">
            <h2><i class="fas fa-book-open text-primary"></i> A Welcome Note</h2>
            <p>
              We welcome you specially in the name of God The Father, the creator of the Heavens and the earth, the giver of life in whom we live and move and have our being, the Joy giver from whom springs every good and perfect gift, it is Him who loves the world and gave His only begotten son for her sake, He is the saviour of mankind, who heals us from our sicknesses and diseases, to Him alone be all the Glory and Honour and Power and Dominion and Majesty Forever Amen.
            </p>
            <p>
              We trust that He who upholds all things even this website by the word of His Power will keep you firm and steadfast in Faith and that as you navigate through this site may you find spiritual Riches and Blessings for the edification of your soul. Remain Blessed of the Lord Jesus Christ.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>


      <!-- Icons -->
    <section class="icons py-5 mb-7 mt-5">
      <div class="container">
        <div class="m-2">
        <div class="row hstack g-4">
          <div class="col-md-6 d-flex gap-4">
             <i class="fa fa-users fa-3x text-primary"></i>
            <div>
              <h5 class="fw-bold">Whom We Are</h5>
              <p class="text-muted">
                We are a small group of nobodys, trusting only in the merit of Jesus whom alone is somebody to align and fix our lives aright for His own Pleasure and exploits.
              </p>
            </div>
          </div>

          <div class="col-md-6 d-flex gap-4">
            <i class="fa fa-cross fa-3x text-primary"></i>
            <div>
              <h5 class="fw-bold">Our Message</h5>
              <p class="text-muted">
                Jesus only is our message, His Kingdom and Making is our focus. We believe He died on the cross to save man from sin and it's rulership. He was buried and on the 3rd day He rose from the dead and forever lives to sanctify all that believe in Him through His Word the Truth, and by the Holy Ghost and fire in whom He immerses us for our purification.
              </p>
            </div>
          </div>
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
   

<?php endif;?>

