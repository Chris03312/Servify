<div class="wrapper">

    <!-- Sidebar -->
    <aside id="sidebar" class="border-end bg-light">
        <div class="sidebar-content">
            <!--LOGO SIDEBAR---->
            <div class="d-flex flex-row justify-content-start align-items-center">
                <img src="../img/SERVIFY_REMOVEDBG.png" alt="" class="img-fluid sidebarLogo">
                <img src="../img/SERVIFY2.png" alt="" class="img-fluid sidebarLogo">
            </div>

            <small class="text-muted">MAIN MENU</small>

            <ul class="sidebar-nav mt-2">
                <li class="sidebar-item">
                    <a href="/coordinator_dashboard" class="nav-link">
                        <i class="bi bi-grid-fill me-2"></i>Dashboard</a>
                </li>

                <li class="sidebar-item">
                    <a href="/coordinator_announcements" class="nav-link"><i class="bi bi-megaphone-fill me-2"></i>Announcements</a>
                </li>

                <li class="sidebar-item"><a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages"><i class="fa-solid fa-users me-2"></i>Volunteer Management</a>
                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item ms-3">
                            <a href="/coordinator_volunteer_management" class="nav-link border-bottom"><i class="fa-solid fa-users me-2"></i>Volunteer Management</a>
                        </li>
                        <li class="sidebar-item ms-3">
                            <a href="/add_new_volunteer" class="nav-link border-bottom"><i class="fa-solid fa-file-export me-2"></i>Registration Form</a>
                        </li>
                        <li class="sidebar-item ms-3">
                            <a href="/pending_submissions" class="nav-link border-bottom"><i class="fa-solid fa-file-export me-2"></i>Submissions</a>
                        </li>
                    </ul>
                </li>
                
                <li class="sidebar-item">
                    <a href="/coordinator_attendance_tracking" class="nav-link">
                        <i class="fa-solid fa-file-circle-check me-2"></i>Attendance Tracking</a>
                </li>

                <li class="sidebar-item">
                    <a href="/coordinator_achievements" class="nav-link">
                        <i class="fa-solid fa-award me-2"></i>Achievements</a>
                </li>
                
                <li class="sidebar-item"> 
                    <a href="/coordinator_inquiries" class="nav-link">
                    <i class="fa-solid fa-circle-question me-2"></i>Inquiries</a>
                </li>

                <li class="sidebar-item">
                    <a href="/coordinator_feedback" class="nav-link">
                        <i class="bi bi-chat-dots-fill me-2"></i></i>Feedback Form</a>
                </li>
                
                <li class="sidebar-item">
                    <a href="/reports" class="nav-link"><i class="bi bi-bar-chart-line-fill me-2"></i>Reports</a>
                </li>
                
            </ul>
        </div>
    </aside>
    <!--END OF SIDEBAR-->

    <!-- Main Component -->
    <div class="main">
        <nav class="navbar navbar-expand border-bottom navbar-light bg-light d-flex flex-row justify-content-between align-items-center p-2">
            <!-- Button for sidebar toggle -->
            <button class="btn toggle-btn" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 2.5h14v1H1v-1zm0 5h14v1H1v-1zm0 5h14v1H1v-1z" />
                </svg>
            </button>

            <div class="d-flex flex-row align-items-center justify-content-center gap-4">
                <!--NOTIFICATIONS-->
                <div class="dropdown">

                    <button type="button" class="btn bellBtn position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell-fill fs-4"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="margin-top: 15px;">
                            99+</span>
                        <span class="visually-hidden">unread messages</span>

                    </button>
                    <div class="dropdown-menu dropdown-menu-end pt-0 notif-container" aria-labelledby="dropdownMenuButton">

                        <div class="sticky-top d-flex flex-column justify-content-center align-items-center p-2 notif-text mb-4">
                            <h3>Notifications</h3>
                        </div>


                        <a href="" class="btn btn-sm">
                            <div class="row row-cols-3 align-items-center justify-content-evenly mb-3">
                                <div class="col-md-2"><img src="../img/DPPAM LOGO.png" alt="" style="width: 50px; height: 50px;"></div>
                                <div class="col-md-8"><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia, expedita.</span></div>

                                <div class="position-relative col-md-1">
                                    <span class="position-absolute top-0 start-50 translate-middle p-2 bg-success border border-light rounded-circle">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>


                <!--PROFILE-->

                <div class="dropdown">
                    <button class="btn dropdown-toggle d-flex flex-row justify-content-center align-items-center gap-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                        <div>
                            <img src="../img/DPPAM LOGO.png" alt="" class="img-fluid rounded-circle" style="width: 40px;">
                        </div>
                        <div class="d-none d-md-flex flex-column">
                            <span><?php echo $sidebarinfo['first_name']. ' ' .$sidebarinfo['surname']; ?></span>
                            <small><?php echo $sidebarinfo['role']; ?></small>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">My Profile</a></li>
                        <li><a class="dropdown-item" href="/coordinator_profile_settings">Profile Settings</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <script src="../js/sidebar_toggle.js"></script>