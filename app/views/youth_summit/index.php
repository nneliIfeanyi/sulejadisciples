<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Registration</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= URLROOT ?>/welcome">Home</a></li>
        <li class="breadcrumb-item">Registration</li>
        <!-- <li class="breadcrumb-item active">Layouts</li> -->
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5 class="card-title mb-0">Fill The Form Below To Register Participants</h5>
              <a href="<?= URLROOT ?>/youth_summit/participants" class="btn btn-sm btn-outline-primary">View Participants</a>
            </div>

            <!-- Alert Messages -->
            <div id="alertMessage" class="alert alert-dismissible fade hide" role="alert"></div>

            <!-- Multi Columns Form -->
            <form id="registrationForm" class="row g-3">
              <div class="col-md-4">
                <label for="firstname" class="form-label">Your Name <span class="text-danger">*</span></label>
                <input type="text" name="firstname" class="form-control" id="firstname" required>
                <div class="invalid-feedback" id="firstname_err"></div>
              </div>
              <div class="col-md-4">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" name="middlename" class="form-control" id="middlename">
                <div class="invalid-feedback" id="middlename_err"></div>
              </div>
              <div class="col-md-4">
                <label for="surname" class="form-label">Surname <span class="text-danger">*</span></label>
                <input type="text" name="surname" class="form-control" id="surname" required>
                <div class="invalid-feedback" id="surname_err"></div>
              </div>
              <div class="col-md-4">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="10-11 digits (optional)">
                <div class="invalid-feedback" id="phone_err"></div>
              </div>
              <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email">
                <div class="invalid-feedback" id="email_err"></div>
              </div>

              <div class="col-md-4">
                <label for="age" class="form-label">Age Bracket <span class="text-danger">*</span></label>
                <select id="age" class="form-select" name="age" required>
                  <option value="">Choose...</option>
                  <option value="8yrs - 12yrs">8yrs - 12yrs</option>
                  <option value="13yrs - 18yrs">13yrs - 18yrs</option>
                  <option value="19yrs - 30yrs">19yrs - 30yrs</option>
                  <option value="30yrs - 55yrs">30yrs - 55yrs</option>
                </select>
                <div class="invalid-feedback" id="age_err"></div>
              </div>
              <div class="col-md-4">
                <label for="marital_status" class="form-label">Marital Status <span class="text-danger">*</span></label>
                <select id="marital_status" class="form-select" name="marital_status" required>
                  <option value="">Choose...</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Widow">Widow</option>
                  <option value="Widower">Widower</option>
                  <option value="Engaged">Engaged</option>
                </select>
                <div class="invalid-feedback" id="marital_status_err"></div>
              </div>
              <div class="col-md-6">
                <label for="denomination" class="form-label">Denomination</label>
                <input type="text" name="denomination" class="form-control" id="denomination">
                <div class="invalid-feedback" id="denomination_err"></div>
              </div>

              <div class="col-md-10">
                <label for="address" class="form-label">Home Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="">
                <div class="invalid-feedback" id="address_err"></div>
              </div>

              <div class="col-md-4">
                <label style="font-size: smaller;" for="event_ongoing" class="form-label fw-semibold fst-italics">Event Ongoing <span class="text-danger">*</span></label>
                <select id="event_ongoing" class="form-select" name="event_ongoing" required>

                  <option value="Youth Summit">Youth Summit</option>
                  <option value="Greater Bethesda">Greater Bethesda</option>
                  <option value="Couples Dinner">Couples Dinner</option>
                </select>
                <div class="invalid-feedback" id="event_ongoing_err"></div>
              </div>
              <div class="col-md-4">
                <label style="font-size: smaller;" for="is_member" class="form-label fw-semibold fst-italics">Is Member</label>
                <select id="is_member" class="form-select" name="is_member">
                  <option value="">Choose...</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
                <div class="invalid-feedback" id="is_member_err"></div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2" id="submitBtn">Submit</button>
              </div>
            </form><!-- End Multi Columns Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script>
  document.getElementById('registrationForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Get form data
    const formData = new FormData(this);
    const submitBtn = document.getElementById('submitBtn');
    const alertDiv = document.getElementById('alertMessage');

    // Disable submit button
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Submitting...';

    // Clear previous alerts and errors
    alertDiv.classList.add('hide');
    document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

    // Send AJAX request
    fetch('<?= URLROOT ?>/youth_summit/register', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          // Show success message
          alertDiv.className = 'alert alert-success alert-dismissible fade show';
          alertDiv.innerHTML = `${data.message} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;

          // Reset form
          document.getElementById('registrationForm').reset();

          // Hide alert after 5 seconds
          setTimeout(() => {
            alertDiv.classList.add('hide');
          }, 5000);
        } else {
          if (data.errors) {
            // Display validation errors
            alertDiv.className = 'alert alert-warning alert-dismissible fade show';
            alertDiv.innerHTML = 'Please correct the errors below <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';

            // Show field errors
            Object.keys(data.errors).forEach(key => {
              if (key.endsWith('_err') && data.errors[key]) {
                const errorDiv = document.getElementById(key);
                if (errorDiv) {
                  errorDiv.textContent = data.errors[key];
                  // Add error class to input
                  const fieldName = key.replace('_err', '');
                  const field = document.getElementById(fieldName);
                  if (field) {
                    field.classList.add('is-invalid');
                  }
                }
              }
            });
          } else {
            // Show general error
            alertDiv.className = 'alert alert-danger alert-dismissible fade show';
            alertDiv.innerHTML = `${data.message} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;
          }
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alertDiv.className = 'alert alert-danger alert-dismissible fade show';
        alertDiv.innerHTML = 'An error occurred. Please try again. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
      })
      .finally(() => {
        // Re-enable submit button
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'Submit';
      });
  });

  // Clear error styling when user starts typing
  document.querySelectorAll('input, select').forEach(field => {
    field.addEventListener('input', function() {
      this.classList.remove('is-invalid');
      const errorDiv = document.getElementById(this.name + '_err');
      if (errorDiv) {
        errorDiv.textContent = '';
      }
    });

    // Also handle change event for select dropdowns
    if (field.tagName === 'SELECT') {
      field.addEventListener('change', function() {
        this.classList.remove('is-invalid');
        const errorDiv = document.getElementById(this.name + '_err');
        if (errorDiv) {
          errorDiv.textContent = '';
        }
      });
    }
  });
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>