<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- <li class="nav-item">
            <a class="nav-link " href="<?= URLROOT ?>/registration">
                <i class="bi bi-pen"></i>
                <span>Registration</span>
            </a>
        </li> -->
        <!-- End Registration Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#youth-summit-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clipboard-data"></i><span>Youth Summit</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="youth-summit-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="<?php echo URLROOT ?>/youth_summit">
                        <i class="bi bi-circle"></i><span>Registration</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo URLROOT ?>/youth_summit/participants">
                        <i class="bi bi-circle"></i><span>Participants</span>
                    </a>
                </li>

                <!-- <li>
                    <a href="<?php echo URLROOT ?>/attendance/index/day3">
                        <i class="bi bi-circle"></i><span>Day three</span>
                    </a>
                </li> -->
            </ul>
        </li><!-- Attendance Nav -->
        <!-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#attendance-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clipboard-data"></i><span>Attendance</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="attendance-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="<?php echo URLROOT ?>/attendance/index/day1">
                        <i class="bi bi-circle"></i><span>Day one</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo URLROOT ?>/attendance/index/day2">
                        <i class="bi bi-circle"></i><span>Day two</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo URLROOT ?>/attendance/index/day3">
                        <i class="bi bi-circle"></i><span>Day three</span>
                    </a>
                </li>
            </ul> 
        </li>--> <!-- End Attendance Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#greater-bethesda-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-database"></i><span>Greater Bethesda</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="greater-bethesda-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?php echo URLROOT ?>/greater_bethesda">
                        <i class="bi bi-circle"></i><span>Registration</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT ?>/greater_bethesda/participants">
                        <i class="bi bi-circle"></i><span>Participants</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="icons-bootstrap.html">
                        <i class="bi bi-circle"></i><span>Attendance</span>
                    </a>
                </li> -->
            </ul>
        </li><!-- Greater Bethesda Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#couples-dinner-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clipboard-data"></i><span>Couples Dinner</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="couples-dinner-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="<?php echo URLROOT ?>/couples_dinner/register">
                        <i class="bi bi-circle"></i><span>Registration</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo URLROOT ?>/couples_dinner/participants">
                        <i class="bi bi-circle"></i><span>Participants</span>
                    </a>
                </li>

                <!-- <li>
                    <a href="<?php echo URLROOT ?>/attendance/index/day3">
                        <i class="bi bi-circle"></i><span>Day three</span>
                    </a>
                </li> -->
            </ul>
        </li><!-- Couples Dinner Nav -->

        <li class="nav-heading">Functions</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-hdd"></i>
                <span>Sort Database</span>
            </a>
        </li><!-- End Error 404 Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= URLROOT ?>/sermons/upload">
                <i class="bi bi-cloud-arrow-up"></i>
                <span>Upload Files</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-envelope"></i>
                <span>Send Bulk SMS</span>
            </a>
        </li><!-- End Register Page Nav -->

    </ul>

</aside><!-- End Sidebar-->