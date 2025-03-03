<style>
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
        overflow-x: auto;
    }
    .logo {
        display: flex;
        align-items: center;
    }

    .logo-image {
        width: 75px;
        height: 75px;
        margin-right: 10px;
    }

    .ser {
        color: #CF000A;
        font-size: 30px;
        font-weight: bold;
    }

    .fy {
        color: #4FA3E5;
        font-size: 30px;
        font-weight: bold;
    }
    .sidebar {
        width: 250px;
        background: rgb(201, 201, 201);
        color: black;
        padding: 20px;
        position: fixed;
        height: 100%;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .sidebar h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    .sidebar ul {
        list-style: none;
        padding: 0;
    }
    .sidebar ul li {
        margin: 15px 0;
    }
    .sidebar ul li a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 10px;
        transition: 0.3s;
    }
    .sidebar ul li a:hover {
        background: #495057;
        border-radius: 5px;
    }
    .main-content {
        margin-left: 270px;
        padding: 20px;
        flex-grow: 1;
    }
    .navbar {
        width: 100%;
        margin-left: 250px;
    }
</style>
<nav class="navbar navbar-dark bg-dark px-3">
        <span class="navbar-brand mb-0 h1">Welcome to Website Admin Page</span>
    </nav>
    <div class="sidebar">
        <div class="logo">
            <img src="../adminIncludes/imgs/logo.png" alt="Logo" class="logo-image">
            <span class="ser">Serv</span><span class="fy">ify</span>
        </div>
        <hr>
        <ul>
            <h6>Home</h6>
            <li><a href="../adminWeb/adminDashboard.php" class="btn btn-secondary w-100">Dashboard</a></li>
            <li><a href="#" class="btn btn-secondary w-100">Organizational Profile</a></li>
            <li><a href="#" class="btn btn-secondary w-100">General Resources</a></li>
        </ul>
        <hr>
        <ul>
            <h6>Events</h6>
            <li><a href="../adminEVENTS/adminEvents.php" class="btn btn-secondary w-100">Add Events</a></li>
            <li><a href="../adminEVENTS/adminViewEvents.php" class="btn btn-secondary w-100">View Events</a></li>
        </ul>
        <hr>
        <ul>
            <h6>FAQ</h6>
            <li><a href="../adminFAQ/adminFAQ.php" class="btn btn-secondary w-100">Add FAQ</a></li>
            <li><a href="../adminFAQ/adminViewFAQ.php" class="btn btn-secondary w-100">View FAQ</a></li>
        </ul>
        <hr>
        <ul>
            <h6>Settings</h6>
            <li><a href="#" class="btn btn-secondary w-100">Settings</a></li>
            <li><a href="#" class="btn btn-danger w-100">Logout</a></li>
        </ul>
    </div>