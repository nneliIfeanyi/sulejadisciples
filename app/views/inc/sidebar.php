<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="<?php echo URLROOT ?>/users/register">
                <i class="bi bi-pencil-square"></i>
                <span>Registration</span>
            </a>
        </li><!-- End Registration Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#attendance-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clipboard-data"></i><span>Attendance</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="attendance-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <!-- <li>
                    <a href="<?php echo URLROOT ?>/pages/youth">
                        <i class="bi bi-circle"></i><span>Youth Summit</span>
                    </a>
                </li> -->
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
        </li><!-- Attendance Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#database-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clipboard-data"></i><span>Database</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <!-- <ul id="database-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?php echo URLROOT ?>/db/index/day1">
                        <i class="bi bi-circle"></i><span>Day one</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo URLROOT ?>/db/index/day2">
                        <i class="bi bi-circle"></i><span>Day two</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo URLROOT ?>/db/index/day3">
                        <i class="bi bi-circle"></i><span>Day three</span>
                    </a>
                </li>
            </ul> -->
        </li><!-- Database Nav -->



        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo URLROOT ?>/db/bulk">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Bulk Contacts</span>
            </a>
        </li><!-- End Login Page Nav -->

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li> -->
<!-- End Error 404 Page Nav -->
        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li> -->
        <!-- End Blank Page Nav -->

    </ul>

</aside><!-- End Sidebar-->