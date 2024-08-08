<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';
include APPROOT . '/views/inc/sidebar.php';
?>
<div id="sec">
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Resgistration</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Admin</a></li>
          <li class="breadcrumb-item active">Register</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->



    <section class="section dashboard">
      <div class="row">
        <div class="col-md-9">
          <div class="card card-body bg-light my-1">
            <div class="card-header mb-3">
              <h1 class="card-title">Greater Bethesda 2024 </h1>
              <p class="card-text">A total of <span class="fw-bold text-underline">(<?php echo $data['count']; ?>)</span> registered in the Database, this includes previous years participants.</p>
            </div>

            <form action="" method="post" id="register_form">
              <div class="form-floating mb-2">
                <input id="surname" type="text" name="surname" required class="form-control" placeholder="Your Surname" value="">
                <label for="surname">Surname</label>
              </div>
              <div class="form-floating mb-2">
                <input id="other" type="text" name="other_names" placeholder="Other names" required class="form-control" value="">
                <label for="other">Other Names</label>
              </div>
              <div class="form-floating mb-2">
                <input id="whatsapp" type="number" name="phone" placeholder="whatsapp" class="form-control" required data-parsley-length="[0, 11]" data-parsley-trigger="keyup" value="">
                <label for="whatsapp">Whatsapp Number</label>
              </div>
              <div class="form-floating mb-2">
                <input id="assembly" type="text" placeholder="Assembly" name="church" required class="form-control" value="">
                <label for="assembly">Local Assembly</label>
              </div>
              <p class="m-0" style="font-size: small;">leave empty if a member of suleja disples</p>
              <div class="form-floating">
                <input id="referee" type="text" name="invited_by" placeholder="Referee" class="form-control" value="">
                <label for="referee">Invited by</label>
              </div>
              <div class="row my-4">
                <div class="col">
                  <input type="submit" id="submit" class="btn btn-primary px-5" value="Register">
                </div>
                <div class="col mb-2 me-auto">
                  <a href="<?php echo URLROOT; ?>/pages" class="btn btn-outline-secondary"><i class="fa fa-home"></i> Home</a>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
  </main>
</div>

<!-- Response message div -->
<div id="msg"></div>
<script src="<?php echo URLROOT; ?>/js/jquery.js"></script>
<script src="<?php echo URLROOT; ?>/js/parsley.min.js"></script>

<script>
  $('#register_form').parsley();
  $('#register_form').on('submit', function(event) {
    event.preventDefault();

    if ($('#register_form').parsley().isValid()) {
      let formData = $(this).serialize();
      $.ajax({
        url: "<?php echo URLROOT; ?>/users/register",
        method: "POST",
        data: formData,

        beforeSend: function() {
          $('#submit').attr('disabled', 'disabled');
          $('#submit').val('Processing, pls wait ...');

        },
        success: function(response) {
          $('#sec').hide(4000);
          $('#register_form').trigger("reset");
          $('#register_form').parsley().reset();
          //$('#submit').attr('disabled', false);
          //$('#submit').val('Registration Recorded Successfully..');
          $('#msg').append(response);
          //$('#submit').val('Register');

        }


      });
    }

  });
</script>
<?php
include APPROOT . '/views/inc/footer.php';
?>