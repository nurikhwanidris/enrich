<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/enrich">
        <img src="/enrich/include/assets/img/logo-wording-white.png" width="auto" height="30" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Payment Voucher
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuMenu">
                    <button class="dropdown-item" type="button" onclick="location.href = '/enrich/pv/home';">View All</button>
                    <button class="dropdown-item" type="button" onclick="location.href = '/enrich/pv/add';">Add PV</button>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Employee
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuMenu">
                    <button class="dropdown-item" type="button" onclick="location.href = '/enrich/include/users/home';">View All</button>
                    <button class="dropdown-item" type="button" onclick="location.href = '/enrich/include/users/register';">Add Employee</button>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuMenu">
                    <button class="dropdown-item" type="button" onclick="location.href = '/enrich/include/users/logout';">Logout</button>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!--/.Navbar -->