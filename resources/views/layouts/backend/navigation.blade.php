<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('dashboard.index') }}" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{ asset('backend/assets') }}/images/logo.png" alt="" class="logo logo-lg"
                    style="width: 50px;">
                <img src="{{ asset('backend/assets') }}/images/logo.png" alt="" class="logo logo-sm">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>
                <li class="nxl-item {{ request()->routeIs(['dashboard.*']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Dashboards</span>
                    </a>
                </li>

                <li class="nxl-item {{ request()->routeIs(['catalog.*']) ? 'active' : '' }}">
                    <a href="{{ route('catalog.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-archive"></i></span>
                        <span class="nxl-mtext">Katalog</span>
                    </a>
                </li>

                <li class="nxl-item {{ request()->routeIs(['product.*']) ? 'active' : '' }}">
                    <a href="{{ route('product.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-package"></i></span>
                        <span class="nxl-mtext">Produk</span>
                    </a>
                </li>

                <li class="nxl-item {{ request()->routeIs(['account.*']) ? 'active' : '' }}">
                    <a href="{{ route('account.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-credit-card"></i></span>
                        <span class="nxl-mtext">Rekening Bank</span>
                    </a>
                </li>

                <li class="nxl-item {{ request()->routeIs(['customers.*']) ? 'active' : '' }}">
                    <a href="{{ route('customers.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-users"></i></span>
                        <span class="nxl-mtext">Pelanggan</span>
                    </a>
                </li>

                <li class="nxl-item {{ request()->routeIs(['users.*']) ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-user"></i></span>
                        <span class="nxl-mtext">Pengguna</span>
                    </a>
                </li>

                <li class="nxl-item {{ request()->routeIs(['profile.*']) ? 'active' : '' }}">
                    <a href="{{ route('profile.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-settings"></i></span>
                        <span class="nxl-mtext">Profile</span>
                    </a>
                </li>

                <li class="nxl-item {{ request()->routeIs(['address.*']) ? 'active' : '' }}">
                    <a href="{{ route('address.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-map-pin"></i></span>
                        <span class="nxl-mtext">Alamat</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
