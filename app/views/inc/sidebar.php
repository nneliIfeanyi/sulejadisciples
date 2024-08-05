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
            <a class="nav-link " href="<?php echo URLROOT ?>">
                <i class="bi bi-person-check"></i>
                <span>Attendance</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clipboard-data"></i><span>Database</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Day one</span>
                    </a>
                </li>

                <!-- <li>
                    <a href="components-tooltips.html">
                        <i class="bi bi-circle"></i><span>Day two</span>
                    </a>
                </li>

                <li>
                    <a href="components-tooltips.html">
                        <i class="bi bi-circle"></i><span>Day three</span>
                    </a>
                </li> -->
            </ul>
        </li><!-- End Components Nav -->



        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li><!-- End Error 404 Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>

</aside><!-- End Sidebar-->