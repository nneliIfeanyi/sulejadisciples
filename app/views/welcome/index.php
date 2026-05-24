<?php require APPROOT . '/views/inc/header.php'; ?>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">
                                <a href="javascript:void(0)" class="logo d-flex align-items-center w-auto">
                                    <span class="fw-bold">Admin</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="text-center pb-0">Enter username & password to login</h5>
                                    </div>

                                    <form class="row g-3" action="<?php echo URLROOT; ?>/welcome/login" method="POST" id="login_form">

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user"></i></span>
                                                <input type="text" name="username" class="form-control" id="yourUsername" required value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>">
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                            <?php if (!empty($data['email_err'])): ?>
                                                <div class="text-danger"><?php echo $data['email_err']; ?></div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-lock"></i></span>
                                                <input type="password" name="password" class="form-control" id="yourPassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <?php if (!empty($data['password_err'])): ?>
                                                <div class="text-danger"><?php echo $data['password_err']; ?></div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->
    <?php require APPROOT . '/views/inc/footer.php'; ?>