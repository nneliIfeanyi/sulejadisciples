<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';
include APPROOT . '/views/inc/sidebar.php';
?>
<div id="sec">
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Youth Database</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Admin</a></li>
                    <li class="breadcrumb-item active">29th June 2025</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-body bg-light my-1">
                        <div class="card-header mb-3">
                            <h1 class="card-title">Youth Summut 2025 </h1>
                        </div>

                        <div class="table-responsive">

                            <table class="table table-light">
                                <thead>
                                    <tr class="">
                                        <th><b>S/N</b></th>
                                        <th><b>Fullname</b></th>
                                        <th><b>Phone</b></th>
                                        <th><b>Assembly</b></th>
                                        <th><b>Residence</b></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $numbering = 1;
                                    foreach ($data['names'] as $youth) : ?>
                                        <tr class="">
                                            <td><?php echo $numbering ?></td>
                                            <td><?php echo $youth->surname; ?> <?php echo $youth->other_names; ?></td>
                                            <td><?php echo $youth->phone; ?></td>
                                            <td><?php echo $youth->church; ?></td>
                                            <td><?php echo $youth->residence; ?></td>
                                        </tr>
                                    <?php $numbering++;
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




<?php
include APPROOT . '/views/inc/footer.php';
?>