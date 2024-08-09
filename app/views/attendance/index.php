<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';
include APPROOT . '/views/inc/sidebar.php';
flash('msg');
?>
<?php if ($data['param'] == 'day1') : ?>
    <div id="sec">
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Mark Attendance</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item active">Day One</li>
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
                            </div>

                            <div class="table-responsive">

                                <table class="table datatable table-striped" id="example" width="100%">
                                    <thead>
                                        <tr class="">
                                            <th><b>S/N</b></th>
                                            <th><b>Names</b></th>
                                            <th><b>Day One</b></th>
                                            <th><b>Action</b></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($data['names'] as $participant) :
                                            $check = $this->attendanceModel->getUserById($participant->id, 'day1', date('Y'));
                                        ?>
                                            <tr class="">
                                                <td><?= $data['numbering']; ?></td>
                                                <td><?= $participant->surname . ' ' . $participant->other_names; ?></td>
                                                <td>
                                                    <?php if (!$check) : ?>
                                                        <form action="" id="markAttendance<?= $participant->id; ?>">
                                                            <input type="hidden" name="user_id" value="<?= $participant->id; ?>">
                                                            <input type="hidden" name="fullname" value="<?= $participant->surname . ' ' . $participant->other_names; ?>">
                                                            <input type="hidden" name="yearz" value="<?= date('Y'); ?>">
                                                            <input type="hidden" name="timez" value="<?= date('h:i:a'); ?>">
                                                            <input type="submit" id="submit<?= $participant->id; ?>" value="Mark" class="btn btn-danger">
                                                        </form>
                                                    <?php else : ?>
                                                        <button class="btn diasabled btn-success">Marked..</button>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($check) : ?>
                                                        <form action="<?php echo URLROOT ?>/attendance/unmark/<?= $data['param']; ?>" method="POST">
                                                            <input type="hidden" name="user_id" value="<?= $participant->id; ?>">
                                                            <input type="hidden" name="fullname" value="<?= $participant->surname . ' ' . $participant->other_names; ?>">
                                                            <input type="hidden" name="yearz" value="<?= date('Y'); ?>">
                                                            <input type="submit" value="Unmark" class="btn btn-danger">
                                                        </form>
                                                    <?php else : ?>
                                                        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $participant->id; ?>"><i class="fa fa-trash"></i> Trash
                                                        </button>
                                                        <!--Delete entry Modal -->
                                                        <div class="modal fade" id="deleteModal<?= $participant->id ?>">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        This Action cannot be reveresed..
                                                                        <p class="lead">Are you sure you want to delete <strong class="fw-bold"><?= $participant->surname . ' ' . $participant->other_names; ?></strong> from registered participants?</p>
                                                                    </div>
                                                                    <div class="modal-footer d-flex justify-content-between">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                                                                        <form action="<?php echo URLROOT; ?>/users/delete/<?php echo $participant->id; ?>" method="post">
                                                                            <input type="hidden" name="name" value="<?= $participant->surname . ' ' . $participant->other_names; ?>">
                                                                            <input type="hidden" name="param" value="<?= $data['param']; ?>">
                                                                            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Yes, Continue</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>


                                            <!-- Response message div -->
                                            <div id="msg"></div>
                                            <script src="<?php echo URLROOT; ?>/js/jquery.js"></script>
                                            <script src="<?php echo URLROOT; ?>/js/parsley.min.js"></script>

                                            <script>
                                                $('#markAttendance<?= $participant->id; ?>').on('submit', function(event) {
                                                    event.preventDefault();
                                                    let formData = $(this).serialize();
                                                    $.ajax({
                                                        url: "<?php echo URLROOT; ?>/attendance/index/day1",
                                                        method: "POST",
                                                        data: formData,

                                                        beforeSend: function() {
                                                            $('#submit<?= $participant->id; ?>').attr('disabled', 'disabled');
                                                            $('#submit<?= $participant->id; ?>').val('Pls wait..');

                                                        },
                                                        success: function(response) {
                                                            $('#submit<?= $participant->id; ?>').val('Marked..');
                                                            $('#msg').append(response);
                                                        }
                                                    });
                                                });
                                            </script>
                                        <?php $data['numbering']++;
                                        endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
<?php elseif ($data['param'] == 'day2') : ?>
    <div id="sec">
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Mark Attendance</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item active">Day Two</li>
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
                            </div>

                            <div class="table-responsive">

                                <table class="table datatable table-light" width="100%" id="example">
                                    <thead>
                                        <tr class="">
                                            <th><b>S/N</b></th>
                                            <th><b>Names</b></th>
                                            <th><b>Day Two</b></th>
                                            <th><b>Action</b></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($data['names'] as $participant) :
                                            $check = $this->attendanceModel->getUserById($participant->id, 'day2', date('Y'));
                                        ?>
                                            <tr class="">
                                                <td><?= $data['numbering']; ?></td>
                                                <td><?= $participant->surname . ' ' . $participant->other_names; ?></td>
                                                <td>
                                                    <?php if (!$check) : ?>
                                                        <form action="" id="markAttendance<?= $participant->id; ?>">
                                                            <input type="hidden" name="user_id" value="<?= $participant->id; ?>">
                                                            <input type="hidden" name="fullname" value="<?= $participant->surname . ' ' . $participant->other_names; ?>">
                                                            <input type="hidden" name="yearz" value="<?= date('Y'); ?>">
                                                            <input type="hidden" name="timez" value="<?= date('h:i:a'); ?>">
                                                            <input type="submit" id="submit<?= $participant->id; ?>" value="Mark" class="btn btn-danger">
                                                        </form>
                                                    <?php else : ?>
                                                        <button class="btn diasabled btn-success">Marked..</button>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($check) : ?>
                                                        <form action="<?php echo URLROOT ?>/attendance/unmark/<?= $data['param']; ?>" method="POST">
                                                            <input type="hidden" name="user_id" value="<?= $participant->id; ?>">
                                                            <input type="hidden" name="fullname" value="<?= $participant->surname . ' ' . $participant->other_names; ?>">
                                                            <input type="hidden" name="yearz" value="<?= date('Y'); ?>">
                                                            <input type="submit" value="Unmark" class="btn btn-danger">
                                                        </form>
                                                    <?php else : ?>
                                                        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $participant->id; ?>"><i class="fa fa-trash"></i> Trash
                                                        </button>
                                                        <!--Delete entry Modal -->
                                                        <div class="modal fade" id="deleteModal<?= $participant->id ?>">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        This Action cannot be reveresed..
                                                                        <p class="lead">Are you sure you want to delete <strong class="fw-bold"><?= $participant->surname . ' ' . $participant->other_names; ?></strong> from registered participants?</p>
                                                                    </div>
                                                                    <div class="modal-footer d-flex justify-content-between">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                                                                        <form action="<?php echo URLROOT; ?>/users/delete/<?php echo $participant->id; ?>" method="post">
                                                                            <input type="hidden" name="name" value="<?= $participant->surname . ' ' . $participant->other_names; ?>">
                                                                            <input type="hidden" name="param" value="<?= $data['param']; ?>">
                                                                            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Yes, Continue</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <!-- Response message div -->
                                            <div id="msg"></div>
                                            <script src="<?php echo URLROOT; ?>/js/jquery.js"></script>
                                            <script src="<?php echo URLROOT; ?>/js/parsley.min.js"></script>

                                            <script>
                                                $('#markAttendance<?= $participant->id; ?>').on('submit', function(event) {
                                                    event.preventDefault();
                                                    let formData = $(this).serialize();
                                                    $.ajax({
                                                        url: "<?php echo URLROOT; ?>/attendance/index/day2",
                                                        method: "POST",
                                                        data: formData,

                                                        beforeSend: function() {
                                                            $('#submit<?= $participant->id; ?>').attr('disabled', 'disabled');
                                                            $('#submit<?= $participant->id; ?>').val('Pls wait..');

                                                        },
                                                        success: function(response) {
                                                            $('#submit<?= $participant->id; ?>').val('Marked..');
                                                            $('#msg').append(response);
                                                        }
                                                    });
                                                });
                                            </script>
                                        <?php $data['numbering']++;
                                        endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

<?php elseif ($data['param'] == 'day3') : ?>
    <div id="sec">
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Mark Attendance</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item active">Day Three</li>
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
                            </div>

                            <div class="table-responsive">

                                <table class="table table-light" width="100%" id="example">
                                    <thead>
                                        <tr class="">
                                            <th><b>S/N</b></th>
                                            <th><b>Names</b></th>
                                            <th><b>Day Three</b></th>
                                            <th><b>Action</b></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($data['names'] as $participant) :
                                            $check = $this->attendanceModel->getUserById($participant->id, 'day3', date('Y'));
                                        ?>
                                            <tr class="">
                                                <td><?= $data['numbering']; ?></td>
                                                <td><?= $participant->surname . ' ' . $participant->other_names; ?></td>
                                                <td>
                                                    <?php if (!$check) : ?>
                                                        <form action="" id="markAttendance<?= $participant->id; ?>">
                                                            <input type="hidden" name="user_id" value="<?= $participant->id; ?>">
                                                            <input type="hidden" name="fullname" value="<?= $participant->surname . ' ' . $participant->other_names; ?>">
                                                            <input type="hidden" name="yearz" value="<?= date('Y'); ?>">
                                                            <input type="hidden" name="timez" value="<?= date('h:i:a'); ?>">
                                                            <input type="submit" id="submit<?= $participant->id; ?>" value="Mark" class="btn btn-danger">
                                                        </form>
                                                    <?php else : ?>
                                                        <button class="btn diasabled btn-success">Marked..</button>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($check) : ?>
                                                        <form action="<?php echo URLROOT ?>/attendance/unmark/<?= $data['param']; ?>" method="POST">
                                                            <input type="hidden" name="user_id" value="<?= $participant->id; ?>">
                                                            <input type="hidden" name="fullname" value="<?= $participant->surname . ' ' . $participant->other_names; ?>">
                                                            <input type="hidden" name="yearz" value="<?= date('Y'); ?>">
                                                            <input type="submit" value="Unmark" class="btn btn-danger">
                                                        </form>
                                                    <?php else : ?>
                                                        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $participant->id; ?>"><i class="fa fa-trash"></i> Trash
                                                        </button>
                                                        <!--Delete entry Modal -->
                                                        <div class="modal fade" id="deleteModal<?= $participant->id ?>">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        This Action cannot be reveresed..
                                                                        <p class="lead">Are you sure you want to delete <strong class="fw-bold"><?= $participant->surname . ' ' . $participant->other_names; ?></strong> from registered participants?</p>
                                                                    </div>
                                                                    <div class="modal-footer d-flex justify-content-between">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                                                                        <form action="<?php echo URLROOT; ?>/users/delete/<?php echo $participant->id; ?>" method="post">
                                                                            <input type="hidden" name="name" value="<?= $participant->surname . ' ' . $participant->other_names; ?>">
                                                                            <input type="hidden" name="param" value="<?= $data['param']; ?>">
                                                                            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Yes, Continue</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <!-- Response message div -->
                                            <div id="msg"></div>
                                            <script src="<?php echo URLROOT; ?>/js/jquery.js"></script>
                                            <script src="<?php echo URLROOT; ?>/js/parsley.min.js"></script>

                                            <script>
                                                $('#markAttendance<?= $participant->id; ?>').on('submit', function(event) {
                                                    event.preventDefault();
                                                    let formData = $(this).serialize();
                                                    $.ajax({
                                                        url: "<?php echo URLROOT; ?>/attendance/index/day3",
                                                        method: "POST",
                                                        data: formData,

                                                        beforeSend: function() {
                                                            $('#submit<?= $participant->id; ?>').attr('disabled', 'disabled');
                                                            $('#submit<?= $participant->id; ?>').val('Pls wait..');

                                                        },
                                                        success: function(response) {
                                                            $('#submit<?= $participant->id; ?>').val('Marked..');
                                                            $('#msg').append(response);
                                                        }
                                                    });
                                                });
                                            </script>
                                        <?php $data['numbering']++;
                                        endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
<?php endif; ?>


<?php
include APPROOT . '/views/inc/footer.php';
?>