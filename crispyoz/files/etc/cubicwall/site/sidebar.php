                <!-- Sidebar -->
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                    <!-- Sidebar - Brand -->
                    
                   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                        <div class="sidebar-brand-text"></div>
                    </a>
                    
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo(HOME_PAGE)?>">
                        <div class="sidebar-brand-icon">
                            <img src="./assets/images/logo.png" width="150px" height="85px" />
                        </div>
                    </a>


                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                        <div class="sidebar-brand-text">Administration</div>
                    </a>


                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link" href="main.php"  data-toggle="tooltip" title="Back to Home Page">>
                            <img class="custom-menu-icon" src="./assets/css/icons/dashboard.svg"></img>
                            <span>Home</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="blacklist.php"  data-toggle="tooltip" title="View and Edit Black List">
                            <img class="custom-menu-icon" src="./assets/css/icons/dashboard.svg"></img>
                            <span>Black List</span></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="whitelist.php" data-toggle="tooltip" title="View and Edit White List">
                            <img class="custom-menu-icon" src="./assets/css/icons/other.svg"></img>
                            <span>White List</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="statistics.php" data-toggle="tooltip" title="View Black/White List Hits">
                            <img class="custom-menu-icon" src="./assets/css/icons/other2.svg"></img>
                            <span>Statistics</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="configuration.php" data-toggle="tooltip" title="Configure Device Settings">
                            <img class="custom-menu-icon" src="./assets/css/icons/other2.svg"></img>
                            <span>Configuration</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/" href="#" data-toggle="modal" data-target="#logoutModal">
                            <img class="custom-menu-icon" src="./assets/css/icons/other2.svg" ></img>
                            <span>Logout</span></a>
                    </li>

                </ul>
                <!-- End of Sidebar -->
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>