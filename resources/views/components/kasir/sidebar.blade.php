<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('customer.dashboard') }}">
                <img alt="image" src="/assets/logo/logo-rental.png" style="width: 60px; height: 60px" class="header-logo" />
                <span class="logo-name">Rental-MA</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <!-- Main Navigation -->
            <li class="menu-header">Main Navigation</li>

            <!-- Dashboard Customer -->
            <li class="dropdown{{ request()->routeIs('customer.dashboard') ? ' active' : '' }}">
                <a href="{{ route('customer.dashboard') }}" class="nav-link">
                    <i data-feather="home"></i><span>Dashboard</span>
                </a>
            </li>

            <!-- Penyewaan Aktif -->
            <li class="dropdown{{ request()->routeIs('customer.rentals.active') ? ' active' : '' }}">
                <a href="{{ route('customer.rentals.active') }}" class="nav-link">
                    <i data-feather="check-circle"></i><span>Penyewaan Aktif</span>
                </a>
            </li>

            <!-- Riwayat Penyewaan -->
            <li class="dropdown{{ request()->routeIs('customer.rentals.history') ? ' active' : '' }}">
                <a href="{{ route('customer.rentals.history') }}" class="nav-link">
                    <i data-feather="archive"></i><span>Riwayat Penyewaan</span>
                </a>
            </li>

            <!-- Profil Pengguna -->
            <li class="dropdown{{ request()->routeIs('customer.profile') ? ' active' : '' }}">
                <a href="{{ route('customer.profile') }}" class="nav-link">
                    <i data-feather="user"></i><span>Profil Pengguna</span>
                </a>
            </li>

            <!-- Pencarian atau Penyewaan Baru -->
            <li class="dropdown{{ request()->routeIs('customer.rental.new') ? ' active' : '' }}">
                <a href="{{ route('customer.rentals.new') }}" class="nav-link">
                    <i data-feather="search"></i><span>Cari Mobil</span>
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
