<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('pendaftaran.dashboard') }}">
                <span class="logo-name">KLINIK-APP</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>

            <li class="{{ request()->routeIs('pendaftaran.dashboard') ? 'active' : '' }}">
                <a href="{{ route('pendaftaran.dashboard') }}" class="nav-link">
                    <i data-feather="home"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('dokter.pemeriksaan.*') ? 'active' : '' }}">
                <a href="{{ route('dokter.pemeriksaan.index') }}" class="nav-link">
                    <i data-feather="activity"></i><span>Pemeriksaan</span>
                </a>
            </li>


        </ul>

        <!-- Logout -->
        <li class="dropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i data-feather="log-out"></i><span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </aside>
</div>
