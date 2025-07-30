<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';
require APPROOT . '/views/inc/sidebar.php';
?>
 <div id="sec">
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Bulk Contacts</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item active">Send SMS</li>
                    </ol>
                </nav>
            </div>
            <!-- End Page Title -->
            <section class="section dashboard">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-body bg-light my-1">
                            <div class="card-header mb-3">
                                <h1 class="card-title">Greater Bethesda Database</h1>
                                <p class="lead">Selecting all from Participants <?php echo $data['total'];?></p>
                            </div>

                            		<p><?php foreach($data['bulks'] as $contancts):?>
                            			<?php echo $contancts->phone.',';?>
                            		<?php endforeach;?></p>
                            	

                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <?php
require APPROOT . '/views/inc/footer.php';
?>