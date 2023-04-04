<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="cp">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Stock System</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="/cp/users">
                <i class="fas fa-fw fa-table"></i>
                <span>Users</span></a>
        </li>
    @endcan

    @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="/cp/faculties">
                <i class="fas fa-fw fa-table"></i>
                <span>Faculties</span></a>
        </li>
    @endcan
    @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="/cp/departments">
                <i class="fas fa-fw fa-table"></i>
                <span>Departments</span></a>
        </li>
    @endcan

    @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="/cp/staff">
                <i class="fas fa-fw fa-table"></i>
                <span>Staff</span></a>
        </li>
    @endcan
    @canany(['admin', 'staff'])
        <li class="nav-item">
            <a class="nav-link" href="/cp/rooms">
                <i class="fas fa-fw fa-table"></i>
                <span>Rooms</span></a>
        </li>
    @endcanany
    @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="/cp/device-types">
                <i class="fas fa-fw fa-table"></i>
                <span>Device Types</span></a>
        </li>
    @endcan

    @canany(['admin', 'staff'])

        <li class="nav-item">
            <a class="nav-link" href="/cp/devices">
                <i class="fas fa-fw fa-table"></i>
                <span>Devices</span></a>
        </li>
    @endcanany
    @canany(['admin'])
        <li class="nav-item">
            <a class="nav-link" href="/cp/teams">
                <i class="fas fa-fw fa-table"></i>
                <span>Teams</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/cp/team-members">
                <i class="fas fa-fw fa-table"></i>
                <span>Team Members</span>
            </a>
        </li>
    @endcanany
    @canany(['admin', 'staff','maintainer'])
        <li class="nav-item">
            <a class="nav-link" href="/cp/reports">
                <i class="fas fa-fw fa-table"></i>
                <span>Reports</span>
            </a>
        </li>
    @endcanany


</ul>
<!-- End of Sidebar -->
