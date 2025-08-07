<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';
include APPROOT . '/views/inc/sidebar.php';
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
                    <div class="col-md-9 mx-auto">
                        <div class="card card-body bg-light my-1">
                            <!-- <h3 class="p-2">Total of <?php echo $data['day1Count'];?> in attendance</h3> -->
                            <div class="table-responsive">
                                <table class="table datatable table-striped" id="participants">
                                    <thead>
                                        <tr class="">
                                            <th><b>#</b></th>
                                            <th><b>Names</b></th>
                                            <th><b>Day One</b></th>
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
                    <div class="col-md-9 mx-auto">
                        <div class="card card-body bg-light my-1">
                            <div class="table-responsive">

                                <table class="table table-striped" id="participants">
                                    <thead>
                                        <tr class="">
                                            <th><b>S/N</b></th>
                                            <th><b>Names</b></th>
                                            <th><b>Day Two</b></th>
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
                    <div class="col-md-9 mx-auto">
                        <div class="card card-body bg-light my-1">
                            <div class="table-responsive">

                                <table class="table table-striped" id="participants">
                                    <thead>
                                        <tr class="">
                                            <th><b>#</b></th>
                                            <th><b>Names</b></th>
                                            <th><b>Day Three</b></th>
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
<script type="text/javascript">
    $('#participants').DataTable();
</script>