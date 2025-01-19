<div class="wrapper">

    <!-- Sidebar -->
    <aside id="sidebar" class="border-end">
        <div class="sidebar-content">
            <!--LOGO SIDEBAR---->
            <div class="d-flex flex-row justify-content-start align-items-center">
                <img src="../img/SERVIFY_REMOVEDBG.png" alt="" class="img-fluid sidebarLogo">
                <img src="../img/SERVIFY2.png" alt="" class="img-fluid sidebarLogo">
            </div>

            <small class="text-muted">MAIN MENU</small>

            <ul class="sidebar-nav mt-2">
                <li class="sidebar-item">
                    <a href="volunteer_dashboard.php" class="nav-link">
                        <i class="bi bi-grid-fill me-2"></i>Dashboard</a>
                </li>
                <li class="sidebar-item"><a href="/volunteer_registration_status" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages"><i class="fa-solid fa-file-export me-2"></i>My Application</a>
                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="/volunteer_new_application" class="nav-link border-bottom"><i class="fa-solid fa-file-export me-2"></i>New Application</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="renewal_application.php" class="nav-link border-bottom"><i class="fa-solid fa-file-export me-2"></i>Renewal</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="achievements.php" class="nav-link">
                        <i class="fa-solid fa-award me-2"></i>Achievements</a>
                </li>
                <li class="sidebar-item">
                    <a href="attendance.php" class="nav-link">
                        <i class="fa-solid fa-file-circle-check me-2"></i>Attendance</a>
                </li>

                <li class="sidebar-item">
                    <a href="announcements.php" class="nav-link"><i class="bi bi-megaphone-fill me-2"></i>Announcements</a>
                </li>
                <li class="sidebar-item">
                    <a href="contact_us.php" class="nav-link">
                        <i class="bi bi-send-fill me-2"></i>Contact Us</a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-chat-dots-fill me-2"></i></i>Feedback</a>
                </li>
            </ul>

            <!--HELP DESK-->
            <small class="text-muted">HELP DESK</small>
            <div class="help_desk">
            <p><i class="bi bi-telephone-fill me-2"></i>09123456789 (SMART)</p>
            <p><i class="bi bi-telephone-fill me-2"></i>09123456789 (SMART)</p>
            <p><i class="bi bi-telephone-fill me-2"></i>09123456789 (SMART)</p>
            </div>

            <small class="text-primary">
                Our Help Desk is available from 8:00 AM to 5:00 PM. Contact us for any assistance!
            </small>
        </div>
    </aside>
    <!--END OF SIDEBAR-->

    <!-- Main Component -->
    <div class="main">
        <nav class="navbar navbar-expand border-bottom navbar-light bg-light d-flex flex-row justify-content-between align-items-center p-2">
            <!-- Button for sidebar toggle -->
            <button class="btn toggle-btn" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1 2.5h14v1H1v-1zm0 5h14v1H1v-1zm0 5h14v1H1v-1z"/>
    </svg>
            </button>

            <div class="d-flex flex-row align-items-center justify-content-center gap-4">
                <!--NOTIFICATIONS-->
                <div class="dropdown">
                
                <button type="button" class="btn bellBtn position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-bell-fill fs-4"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="margin-top: 15px;">
                        <?php echo $unread_count; ?>
                    </span>
                      <span class="visually-hidden">unread messages</span>
                    
                  </button>
                  <div class="dropdown-menu dropdown-menu-end pt-0 notif-container" aria-labelledby="dropdownMenuButton">
                    
                    <div class="sticky-top d-flex flex-column justify-content-center align-items-center p-2 notif-text mb-4">
                        <h3>Notifications</h3>
                    </div>

                    <?php if(!$notifications): ?>
                        <p>No notifications</p> <!-- Message when there are no notifications -->
                    <?php else: ?>
                        <?php foreach ($notifications as $notif): ?>
                            <a href="" class="btn btn-sm">
                                <div class="row row-cols-3 align-items-center justify-content-evenly mb-3">
                                    <div class="col-md-2"><img src="../img/DPPAM LOGO.png" alt="" style="width: 50px; height: 50px;"></div>
                                    <div class="col-md-8">
                                        <span>
                                            <?php echo $notif['FROM'] . 
                                            "<br>" . $notif['MESSAGE'] . 
                                            "<br>" . $notif['FORMATTED_DATE']; 
                                            ?>
                                        </span>
                                    </div>
                                    
                                    <div class="position-relative col-md-1">
                                        <span class="position-absolute top-0 start-50 translate-middle p-2 bg-success border border-light rounded-circle">
                                            <span class="visually-hidden">New alerts</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
            </div>

                <!--PROFILE-->

                <div class="dropdown">
                    <button class="btn dropdown-toggle d-flex flex-row justify-content-center align-items-center gap-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                        <div>
                            <img src="../img/DPPAM LOGO.png" alt="" class="img-fluid rounded-circle" style="width: 40px;">
                        </div>
                        <div class="d-flex flex-column">
                            <span><?php echo htmlspecialchars(($sidebarinfo['FIRST_NAME'] ?? " ") . ' ' . ($sidebarinfo['SURNAME'] ?? " ")); ?></span>
                            <small><?php echo htmlspecialchars(($sidebarinfo['ROLE'] ?? " ")); ?></small>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">My Profile</a></li>
                        <li><a class="dropdown-item" href="#">Change Password</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>


<script src="js/sidebar_toggle.js"></script>