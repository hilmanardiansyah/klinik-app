<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('kasir.dashboard') }}">
                {{-- <img alt="image" src="/assets/logo/logo-rental.png" style="width: 60px; height: 60px" class="header-logo" /> --}}
                <span class="logo-name">KLINIK-APP</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <!-- Main Navigation -->
            <li class="menu-header">Main Navigation</li>

            <!-- Dashboard Kasir -->
            <li class="dropdown{{ request()->routeIs('kasir.dashboard') ? ' active' : '' }}">
                <a href="{{ route('kasir.dashboard') }}" class="nav-link">
                    <i data-feather="home"></i><span>Dashboard</span>
                </a>
            </li>

            <!-- Pembayaran -->
            <li class="dropdown{{ request()->routeIs('kasir.pembayaran.index') ? ' active' : '' }}">
                <a href="{{ route('kasir.pembayaran.index') }}" class="nav-link">
                    <i data-feather="credit-card"></i><span>Transaksi Pembayaran</span>
                </a>
            </li>

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
        </ul>
    </aside>
</div>
