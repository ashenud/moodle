<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="hamburger hamburger-btn" id="hamburger" type="button">
            <i class="fas fa-bars"></i>
        </button>
        <span class="nav-title-custom navbar-brand mb-0 h1">LMS |</span> <span class="current-page"></span>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <!-- Avatar -->
            <li class="nav-item dropdown">
                <a class="nav-link user-anchor dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="now-ui-icons user-icon users_circle-08"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ url('/admin/profile') }}">
                            <i class="fas fa-user-circle"></i>My profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ url('/admin/settings') }}">
                            <i class="fas fa-cogs"></i>Settings
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="../../php/logout.php">
                            <i class="fas fa-power-off"></i>Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>