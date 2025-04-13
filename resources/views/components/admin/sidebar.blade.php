<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                {{-- <img alt="image" src="/assets/logo/logo-rental.png" style="width: 60px; height: 60px" class="header-logo" /> --}}
                <span class="logo-name">KLINIK-APP</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <!-- Main Navigation -->
            <li class="menu-header">Master Data</li>
            <li class="dropdown{{ request()->routeIs('admin.wilayah.*') ? ' active' : '' }}">
                <a href="{{ route('admin.wilayah.index') }}" class="nav-link">
                    <i data-feather="map-pin"></i><span>Wilayah</span>
                </a>
            </li>
            <li class="dropdown{{ request()->routeIs('admin.pegawai.*') ? ' active' : '' }}">
                <a href="{{ route('admin.pegawai.index') }}" class="nav-link">
                    <i data-feather="user"></i><span>Pegawai</span>
                </a>
            </li>
            <li class="dropdown{{ request()->routeIs('admin.tindakan.*') ? ' active' : '' }}">
                <a href="{{ route('admin.tindakan.index') }}" class="nav-link">
                    <i data-feather="activity"></i><span>Tindakan</span>
                </a>
            </li>
            <li class="dropdown{{ request()->routeIs('admin.obat.*') ? ' active' : '' }}">
                <a href="{{ route('admin.obat.index') }}" class="nav-link">
                    <i data-feather="package"></i><span>Obat</span>
                </a>
            </li>
            <li class="dropdown{{ request()->routeIs('admin.user.*') ? ' active' : '' }}">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i data-feather="shield"></i><span>User & Role</span>
                </a>
            </li>

            <li class="menu-header">Laporan</li>
            <li class="dropdown{{ request()->routeIs('admin.laporan.*') ? ' active' : '' }}">
                <a href="{{ route('admin.laporan.index') }}" class="nav-link">
                    <i data-feather="bar-chart-2"></i><span>Laporan Klinik</span>
                </a>
            </li>


            <!-- Logout Section -->
            <li class="dropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i data-feather="log-out"></i><span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </aside>
</div>
