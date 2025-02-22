
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <br>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo(HOME_PAGE)?>">
            <div class="sidebar-brand-icon">
                <img src="./assets/images/logo.png" class="img-fluid max-width: 100%;" />
            </div>
        </a>


        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-text">Administration</div>
        </a>


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="main.php"  data-toggle="tooltip" title="Back to Home Page" >
                <img class="custom-menu-icon" src="./assets/images/home.svg"/>
                <span>Home</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="blacklist.php"  data-toggle="tooltip" title="View and Edit Black List">
                <img class="custom-menu-icon" src="./assets/images/blacklist.svg"/>
                <span>Black List</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="whitelist.php" data-toggle="tooltip" title="View and Edit White List">
                <img class="custom-menu-icon" src="./assets/images/whitelist.svg"/>
                <span>White List</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="adminlist.php" data-toggle="tooltip" title="View and Edit Devices Excluded from Filters">
                <img class="custom-menu-icon" src="./assets/images/devices.svg"/>
                <span>Excluded Device List</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="baddevicelist.php" data-toggle="tooltip" title="View and Edit Devices on Your Network You Want to Block">
                <img class="custom-menu-icon" src="./assets/images/blocked_devices.svg"/>
                <span>Blocked Device List</span></a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="statistics.php" data-toggle="tooltip" title="View Black/White List Hits">
                <img class="custom-menu-icon" src="./assets/images/statistics.svg"/>
                <span>Statistics</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="configuration.php" data-toggle="tooltip" title="Configure Device Settings">
                <img class="custom-menu-icon" src="./assets/images/settings.svg" />
                <span>Configuration</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="tools.php" data-toggle="tooltip" title="Manage Your Cube">
                <img class="custom-menu-icon" src="./assets/images/tools.svg"/>
                <span>Tools</span></a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link" href="/" href="#" data-toggle="modal" data-target="#logoutModal" rel="tooltip" data-original-title="Logout to end your session">
                <img class="custom-menu-icon" src="./assets/images/logout.svg" />
                <span>Logout</span></a>
        </li>

    </ul>

<script src="./assets/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
