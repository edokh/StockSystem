<!-- Sidebar -->
<style>
    .nav-span {
        font-size: 1rem !important;
        color: #F7F7F7
    }

    i {
        font-size: 1rem !important;
        color: #F1F1F1 !important;
    }

    .active {
        color: white !important;
        font-weight: 700
    }
</style>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/cp">

        <div class="sidebar-brand-text mx-3">state recording system</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    @can('admin')
        <li class="nav-item">
            <a class="nav-link @if (Request::is('cp/users*')) active @endif " href="/cp/users">
                <i class="fas fa-users @if (Request::is('cp/users*')) active @endif "></i>
                <span class="nav-span ">Users</span>
            </a>
        </li>
    @endcan

    @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="/cp/faculties">
                <i class="fas fa-university @if (Request::is('cp/faculties*')) active @endif "></i>
                <span class="nav-span @if (Request::is('cp/faculties*')) active @endif ">Faculties</span></a>
        </li>
    @endcan
    @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="/cp/departments">
                <i class="fas fa-building @if (Request::is('cp/departments*')) active @endif "></i>
                <span class="nav-span @if (Request::is('cp/departments*')) active @endif ">Departments</span></a>
        </li>
    @endcan

    @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="/cp/staff">
                <i class="fas fa-users-cog @if (Request::is('cp/staff*')) active @endif "></i>
                <span class="nav-span @if (Request::is('cp/staff*')) active @endif ">Staff</span></a>
        </li>
    @endcan
    @canany(['admin', 'staff'])
        <li class="nav-item">
            <a class="nav-link" href="/cp/rooms">
                <i class="fas fa-door-open @if (Request::is('cp/rooms*')) active @endif "></i>
                <span class="nav-span @if (Request::is('cp/rooms*')) active @endif ">Rooms</span></a>
        </li>
    @endcanany
    @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="/cp/device-types">
                <i class="material-icons @if (Request::is('cp/device-types*')) active @endif"
                    style="font-size:36px">devices_other</i>
                <span class="nav-span @if (Request::is('cp/device-types*')) active @endif">Device Types</span>
            </a>
        </li>
    @endcan

    @canany(['admin', 'staff'])
        <li class="nav-item">
            <a class="nav-link" href="/cp/devices">
                <i class="material-icons @if (Request::is('cp/devices*')) active @endif">devices</i>

                <span class="nav-span @if (Request::is('cp/devices*')) active @endif">Devices</span></a>
        </li>
    @endcanany
    @canany(['admin'])
        <li class="nav-item">
            <a class="nav-link" href="/cp/teams">
                <i class="fas fa-user-friends @if (Request::is('cp/teams*')) active @endif"></i>
                <span class="nav-span @if (Request::is('cp/teams*')) active @endif">Teams</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/cp/team-members">
                <i class="fas fa-id-badge @if (Request::is('cp/team-members*')) active @endif"></i>
                <span class="nav-span @if (Request::is('cp/team-members*')) active @endif">Team Members</span>
            </a>
        </li>
    @endcanany
    @canany(['admin', 'staff', 'maintainer'])
        <li class="nav-item">
            <a class="nav-link" href="/cp/reports">
                <i class="fas fa-file-alt @if (Request::is('cp/reports*')) active @endif"></i>
                <span class="nav-span @if (Request::is('cp/reports*')) active @endif">Reports</span>
            </a>
        </li>
    @endcanany


</ul>
<!-- End of Sidebar -->
