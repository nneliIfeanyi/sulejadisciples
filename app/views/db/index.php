<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';
include APPROOT . '/views/inc/sidebar.php';
?>
<?php if ($data['param'] == 'day1') : ?>
    <div id="sec">
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Database</h1>
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
                                <p class="lead"><span class="fw-bold"><?= $data['day1Count']; ?></span> Individuals Attended.</p>
                            </div>

                            <div class="table-responsive">

                                <table class="table datatable table-striped">
                                    <?php if (!empty($data['names'])) : ?>
                                        <thead>
                                            <tr class="">
                                                <th><b>S/N</b></th>
                                                <th><b>Names</b></th>
                                                <th><b>Phone</b></th>
                                                <th><b>Assembly</b></th>
                                                <th><b>Day One</b></th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php foreach ($data['names'] as $participant) :
                                                $check = $this->userModel->getUserById($participant->user_id);
                                            ?>
                                                <tr class="">
                                                    <td><?= $data['numbering']; ?></td>
                                                    <td><?= $participant->fullname; ?></td>
                                                    <td><?= $check->phone; ?></td>
                                                    <td><?= $check->church; ?></td>
                                                    <td>
                                                        <?= $participant->timez; ?>
                                                    </td>
                                                </tr>
                                            <?php $data['numbering']++;
                                            endforeach; ?>
                                        <?php else : ?>
                                            <h5>Nothing to show..</h5>
                                        <?php endif; ?>
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
                <h1>Database</h1>
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
                                <p class="lead"><span class="fw-bold"><?= $data['day2Count']; ?></span> Individuals Attended.</p>
                            </div>

                            <div class="table-responsive">

                                <table class="table datatable table-striped">
                                    <?php if (!empty($data['names'])) : ?>
                                        <thead>
                                            <tr class="">
                                                <th><b>S/N</b></th>
                                                <th><b>Names</b></th>
                                                <th><b>Phone</b></th>
                                                <th><b>Assembly</b></th>
                                                <th><b>Day One</b></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($data['names'] as $participant) :
                                                $check = $this->userModel->getUserById($participant->user_id);
                                            ?>
                                                <tr class="">
                                                    <td><?= $data['numbering']; ?></td>
                                                    <td><?= $participant->fullname; ?></td>
                                                    <td><?= $check->phone; ?></td>
                                                    <td><?= $check->church; ?></td>
                                                    <td>
                                                        <?= $participant->timez; ?>
                                                    </td>
                                                </tr>
                                            <?php $data['numbering']++;
                                            endforeach; ?>
                                        <?php else : ?>
                                            <h5>Nothing to show..</h5>
                                        <?php endif; ?>
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
                <h1>Database</h1>
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
                                <p class="lead"><span class="fw-bold"><?= $data['day3Count']; ?></span> Individuals Attended.</p>
                            </div>

                            <div class="table-responsive">

                                <table class="table datatable table-striped">
                                    <?php if (!empty($data['names'])) : ?>
                                        <thead>
                                            <tr class="">
                                                <th><b>S/N</b></th>
                                                <th><b>Names</b></th>
                                                <th><b>Phone</b></th>
                                                <th><b>Assembly</b></th>
                                                <th><b>Day One</b></th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php foreach ($data['names'] as $participant) :
                                                $check = $this->userModel->getUserById($participant->user_id);
                                            ?>
                                                <tr class="">
                                                    <td><?= $data['numbering']; ?></td>
                                                    <td><?= $participant->fullname; ?></td>
                                                    <td><?= $check->phone; ?></td>
                                                    <td><?= $check->church; ?></td>
                                                    <td>
                                                        <?= $participant->timez; ?>
                                                    </td>
                                                </tr>
                                            <?php $data['numbering']++;
                                            endforeach; ?>
                                        <?php else : ?>
                                            <h5>Nothing to show..</h5>
                                        <?php endif; ?>
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