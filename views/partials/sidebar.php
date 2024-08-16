<main class="sidebar">
    <img src="/sdo.png" class="sidebar-icon" />
    <ul class="sidebar-list">
        <a href="/coordinator/dashboard" class="<?php echo $_SERVER['REQUEST_URI'] === '/coordinator/dashboard' ? 'sidebar-li-alt' : 'sidebar-li' ?>">
            <i class="bi bi-bar-chart-line-fill sidebar-li-icon"></i>
            <h6 class="sidebar-li-text">Dashboard</h6>
        </a>
        <a href="/coordinator/resources" class="<?php echo $_SERVER['REQUEST_URI'] === '/coordinator/resources' ? 'sidebar-li-alt' : 'sidebar-li' ?>">
            <i class="bi bi-box-seam-fill sidebar-li-icon"></i>
            <h6 class="sidebar-li-text">Resources</h6>
        </a>
        <a href="/coordinator/schools" class="<?php echo $_SERVER['REQUEST_URI'] === '/coordinator/schools' ? 'sidebar-li-alt' : 'sidebar-li' ?>">
            <i class="bi bi-building-fill sidebar-li-icon"></i>
            <h6 class="sidebar-li-text">Schools</h6>
        </a>
        <a href="/coordinator/users" class="<?php echo $_SERVER['REQUEST_URI'] === '/coordinator/users' ? 'sidebar-li-alt' : 'sidebar-li' ?>">
            <i class="bi bi-people-fill sidebar-li-icon"></i>
            <h6 class="sidebar-li-text">Users</h6>
        </a>
    </ul>
</main>