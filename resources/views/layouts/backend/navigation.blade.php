<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="index.html" class="b-brand">
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
                <li class="nxl-item nxl-hasmenu">
                <li class="nxl-item"><a class="nxl-link" href="index.html"> <span class="nxl-micon"><i
                                class="feather-airplay"></i></span>Dashboard</a></li>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-cast"></i></span>
                        <span class="nxl-mtext">Reports</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item"><a class="nxl-link" href="reports-sales.html">Sales Report</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="reports-leads.html">Leads Report</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="reports-project.html">Project Report</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="reports-timesheets.html">Timesheets
                                Report</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>