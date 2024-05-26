<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('dashboard.index') }}" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{ asset('backend/assets') }}/images/logo-full.png" alt="" class="logo logo-lg">
                <img src="{{ asset('backend/assets') }}/images/logo-abbr.png" alt="" class="logo logo-sm">
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
            </ul>
        </div>
    </div>
</nav>
