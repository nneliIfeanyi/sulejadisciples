<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <!-- <img src="<?php echo URLROOT; ?>/img/favicon.ico" alt=""> -->
      <span class="d-none d-lg-block">Suleja Disciples</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="<?php echo URLROOT; ?>/welcome/logout">
          Sign Out
        </a><!-- End Notification Icon -->
      </li><!-- End Notification Nav -->


    </ul>
  </nav><!-- End Icons Navigation -->
</header><!-- End Header -->

<!--

<script>
  $('#register_form').on('submit', function(event) {
    event.preventDefault();
    Swal.fire({
      title: 'Submitting...',
      allowOutsideClick: false,
      didOpen: () => Swal.showLoading()
    });
    let formData = $(this).serialize();
    $.ajax({
      url: '<?php echo URLROOT; ?>/users/register',
      method: 'POST',
      data: formData,
      success: function(response) {
        Swal.fire({
          icon: 'success',
          title: '',
          text: response,
          confirmButtonText: 'Okay'
        }).then(() => {
          // reload page on confirmation
          location.reload();
        });
      },
      error: function() {
        Swal.fire('Error!', 'Something went wrong!', 'error');
      }
    });
  });
</script>

-->