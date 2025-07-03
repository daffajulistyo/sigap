<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ route('dashboard') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('assets/dist/assets/img/logo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">SIGAP</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <li class="nav-header">MAIN NAVIGATION</li>

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @can('admin-only')
                   <li class="nav-item">
                        <a href="{{ route('riwayat-ambulans.index') }}"
                            class="nav-link {{ request()->routeIs('riwayat-ambulans.index') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-clock-history"></i>
                            <p>Riwayat Ambulance</p>
                        </a>
                    </li> 
                @endcan
                @can('super-admin-only')
                    <li class="nav-header">DATA MASTER</li>

                    <li class="nav-item">
                        <a href="{{ route('puskesmas.index') }}"
                            class="nav-link {{ request()->routeIs('puskesmas.index') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-hospital"></i>
                            <p>Puskesmas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ambulans.index') }}"
                            class="nav-link {{ request()->routeIs('ambulans.index') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-car-front-fill"></i>
                            <p>Ambulance</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('riwayat-ambulans.index') }}"
                            class="nav-link {{ request()->routeIs('riwayat-ambulans.index') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-clock-history"></i>
                            <p>Riwayat Ambulance</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-person-lines-fill"></i>
                            <p>Akun</p>
                        </a>
                    </li>
                @endcan

                <li class="nav-header">AUTH</li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Logout</p>
                    </a>
                </li>

                <!-- Add more navigation items here as needed -->

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
