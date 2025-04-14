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

            <li class="{{ request()->routeIs('pendaftaran.pasien.*') ? 'active' : '' }}">
                <a href="{{ route('pendaftaran.pasien.index') }}" class="nav-link">
                    <i data-feather="users"></i><span>Data Pasien</span>
                </a>
            </li>

            {{-- Nanti tambahkan juga menu daftar kunjungan jika sudah --}}
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
