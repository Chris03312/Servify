<?php
if (!isset($allMissions)) {
    $allMissions = Landingpage::Volunteers(); // ✅ Fetch all missions if not already available
}
?>

<style>
    /* NAVBAR */
    .navbar-container {
        position: fixed;
        top: 20px;
        left: 20px;
        right: 20px;
        z-index: 1000;
        background: linear-gradient(to right,
                #E8F6FF 21%,
                #B0E0FE 65%,
                #50CCFA 91%,
                #3AA7CF 100%);
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        border-radius: 15px;
        padding: 10px 30px;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-links {
        list-style-type: none;
        display: flex;
        margin-right: 70px;
        gap: 30px;
        position: relative;
    }

    .nav-links li {
        position: relative;
    }

    .nav-links li a {
        text-decoration: none;
        color: #262626;
        font-size: 17px;
        font-family: 'Abyssinica SIL', serif;
        font-weight: 500;
        transition: color 0.3s ease;
        padding: 5px 8px;
    }

    .nav-links li a:hover {
        color: #007BFF;
    }


    /* ABOUT US & RESOURCES DROPDOWN */
    .dropdown-menu {
        list-style: none;
        position: absolute;
        left: -29px;
        background: #ffffff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        display: none;
        padding: 10px 0;
        z-index: 1000;
        min-width: 160px;
    }

    .dropdown-menu li a {
        text-decoration: none;
        display: block;
        padding: 10px 15px;
        font-size: 15px;
        color: #333;
        transition: background 0.5s ease, color 0.3s ease;
    }

    .dropdown-menu li a:hover {
        background-color: #f0f8ff;
        color: #007BFF;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-toggles i {
        margin-left: 5px;
        font-size: 12px;
        transition: transform 0.3s ease;
    }

    .nav-links li:hover .dropdown-toggles i {
        transform: rotate(180deg);
    }


    /* NAVBAR LOGO */
    .logo {
        display: flex;
        align-items: center;
    }

    .logo-image {
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }

    .ser {
        color: #CF000A;
        font-size: 20px;
        font-weight: bold;
    }

    .fy {
        color: #4FA3E5;
        font-size: 20px;
        font-weight: bold;
    }


    /* HAMBURGER MENU */
    .hamburger {
        display: none;
        flex-direction: column;
        gap: 6px;
        cursor: pointer;
    }

    .hamburger span {
        width: 20px;
        height: 2px;
        background-color: #333;
        border-radius: 2px;
    }

    @media screen and (max-width: 768px) {
        .navbar-container {
            position: fixed;
            top: 15px;
            left: 15px;
            right: 10px;
            padding: 5px 10px;
            border-radius: 10px;
            z-index: 1000;
        }

        .nav-links {
            display: none;
            flex-direction: column;
            gap: 4px;
            padding: 10px;
            background-color: rgb(234, 234, 234);
            position: absolute;
            top: 60px;
            left: 80%;
            transform: translateX(-50%);
            width: 40%;
            border-radius: 5px;
            box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .dropdown-menu {
            display: none;
            top: 5px;
            left: -175px;
            border-radius: 5px;

        }

        .dropdown.active .dropdown-menu {
            display: block;
        }

        .hamburger {
            display: flex;
        }

        .nav-links.active {
            display: flex;
        }

        .nav-links li a {
            font-size: 16px;
            padding: 5px 8px;
        }

        .logo {
            flex-direction: row;
            align-items: center;
        }

        .ser,
        .fy {
            font-size: 16px;
        }

        .logo-image {
            width: 35px;
            height: 35px;
        }

        .nav-links li a {
            font-size: 13px;
            padding: 4px 6px;
        }

        .navbar {
            padding: 10px 15px;
        }

    }
</style>
<div class="navbar-container">
    <nav class="navbar">
        <div class="logo">
            <img src="LandingPage/img/logo.png" alt="Logo" class="logo-image">
            <span class="ser">Serv</span><span class="fy">ify</span>
        </div>

        <div class="hamburger" id="hamburger-icon">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <ul class="nav-links" id="nav-links">
            <li><a href="/index">Home</a></li>
            <li class="dropdown">
                <a href="/index#about" class="dropdown-toggles">About Us <i class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="/whoweare">Who We Are?</a></li>
                    <li><a href="/mission_vision">Mission & Vision</a></li>
                    <li><a href="/organization_profile">Organization Profile</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="/index#volunteers" class="dropdown-toggles">Volunteers <i class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-menu">
                    <?php if (!empty($allMissions)): ?>
                        <?php foreach ($allMissions as $mission): ?>
                            <li>
                                <a href="/volunteers?mission=<?php echo urlencode($mission['MISSION_DESCRIPTION']); ?>">
                                    <?php echo htmlspecialchars($mission['MISSION_DESCRIPTION']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><a href="#">No missions available</a></li>
                    <?php endif; ?>
                    <li><a href="/pollwatchers">Types of Pollwatchers</a></li>
                </ul>
            </li>

            <!-- <li class="dropdown">
                <a href="/index#resources" class="dropdown-toggles">Resources<i class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="#guide">Volunteers Guide</a></li>
                    <li><a href="#guidelines">Elections Guidelines</a></li>
                </ul>
            </li> -->
            <li><a href="/index#resources">Resources</a></li>
            <li><a href="/index#news-events">Events</a></li>
            <li><a href="/index#contactus">Contact Us</a></li>
        </ul>
    </nav>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdowns = document.querySelectorAll('.dropdown-toggles');
        let clickedOnce = null;

        dropdowns.forEach(toggle => {
            toggle.addEventListener('click', function (e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    const parentLi = this.parentElement;

                    if (clickedOnce !== parentLi) {

                        document.querySelectorAll('.dropdown').forEach(dropdown => {
                            if (dropdown !== parentLi) {
                                dropdown.classList.remove('active');
                            }
                        });

                        parentLi.classList.toggle('active');
                        clickedOnce = parentLi;
                    } else {

                        window.location.href = this.getAttribute('href');
                    }
                }
            });
        });

        document.addEventListener('click', function (e) {
            if (!e.target.closest('.dropdown')) {
                dropdowns.forEach(dropdown => dropdown.parentElement.classList.remove('active'));
                clickedOnce = null;
            }
        });
    });

</script>