@extends('layouts.backend.main')
@section('title', 'Dashboard')
@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Analytics</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                                <span class="reportrange-picker-field"></span>
                            </div>
                            <div class="dropdown filter-dropdown">
                                <a class="btn btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10"
                                    data-bs-auto-close="outside">
                                    <i class="feather-filter me-2"></i>
                                    <span>Filter</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Role"
                                                checked="checked">
                                            <label class="custom-control-label c-pointer" for="Role">Role</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Team"
                                                checked="checked">
                                            <label class="custom-control-label c-pointer" for="Team">Team</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Email"
                                                checked="checked">
                                            <label class="custom-control-label c-pointer" for="Email">Email</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Member"
                                                checked="checked">
                                            <label class="custom-control-label c-pointer" for="Member">Member</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Recommendation"
                                                checked="checked">
                                            <label class="custom-control-label c-pointer"
                                                for="Recommendation">Recommendation</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-plus me-3"></i>
                                        <span>Create New</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-filter me-3"></i>
                                        <span>Manage Filter</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <!-- [Mini Card] start -->
                    <div class="col-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="hstack justify-content-between mb-4 pb-">
                                    <div>
                                        <h5 class="mb-1">Email Reports</h5>
                                        <span class="fs-12 text-muted">Email Campaign Reports</span>
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-light-brand">View Alls</a>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-envelope fs-3 text-primary"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">50,545</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Total Email</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-envelope-plus fs-3 text-warning"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">25,000</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Email Sent</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-envelope-check fs-3 text-success"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">20,354</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Emails Delivered</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-envelope-open fs-3 text-indigo"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">12,422</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Emails Opened</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-envelope-heart fs-3 text-teal"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">6,248</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Emails Clicked</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-envelope-slash fs-3 text-danger"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">2,047</div>
                                                <p
                                                    class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">
                                                    Emails Bounce</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Mini Card] end -->
                    <!-- [Visitors Overview] start -->
                    <div class="col-xxl-8">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Visitors Overview</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Collapse/Expand">
                                            <a href="#" class="avatar-text avatar-xs bg-gray-300"
                                                data-bs-toggle="collapse"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="#" class="avatar-text avatar-xs bg-danger"
                                                data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="#" class="avatar-text avatar-xs bg-warning"
                                                data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="#" class="avatar-text avatar-xs bg-success"
                                                data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="#" class="avatar-text avatar-sm" data-bs-toggle="dropdown"
                                            data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action">
                                <div id="visitors-overview-statistics-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- [Visitors Overview] end -->
                    <!-- [Browser States] start -->
                    <div class="col-xxl-4">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Browser States</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Collapse/Expand">
                                            <a href="#" class="avatar-text avatar-xs bg-gray-300"
                                                data-bs-toggle="collapse"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="#" class="avatar-text avatar-xs bg-danger"
                                                data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="#" class="avatar-text avatar-xs bg-warning"
                                                data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="#" class="avatar-text avatar-xs bg-success"
                                                data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="#" class="avatar-text avatar-sm" data-bs-toggle="dropdown"
                                            data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0);">
                                                        <i class="fa-brands fa-chrome fs-16 text-primary me-2"></i>
                                                        <span>Google Chrome</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="text-end d-flex align-items-center m-0">
                                                        <span class="me-3">90%</span>
                                                        <span class="progress w-100 ht-5">
                                                            <span class="progress-bar bg-success"
                                                                style="width: 90%"></span>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0);">
                                                        <i
                                                            class="fa-brands fa-firefox-browser fs-16 text-warning me-2"></i>
                                                        <span>Mozila Firefox</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="text-end d-flex align-items-center m-0">
                                                        <span class="me-3">76%</span>
                                                        <span class="progress w-100 ht-5">
                                                            <span class="progress-bar bg-primary"
                                                                style="width: 76%"></span>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0);">
                                                        <i class="fa-brands fa-safari fs-16 text-info me-2"></i>
                                                        <span>Apple Safari</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="text-end d-flex align-items-center m-0">
                                                        <span class="me-3">50%</span>
                                                        <span class="progress w-100 ht-5">
                                                            <span class="progress-bar bg-warning"
                                                                style="width: 50%"></span>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0);">
                                                        <i class="fa-brands fa-edge fs-16 text-success me-2"></i>
                                                        <span>Edge Browser</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="text-end d-flex align-items-center m-0">
                                                        <span class="me-3">20%</span>
                                                        <span class="progress w-100 ht-5">
                                                            <span class="progress-bar bg-success"
                                                                style="width: 20%"></span>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0);">
                                                        <i class="fa-brands fa-opera fs-16 text-danger me-2"></i>
                                                        <span>Opera mini</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="text-end d-flex align-items-center m-0">
                                                        <span class="me-3">15%</span>
                                                        <span class="progress w-100 ht-5">
                                                            <span class="progress-bar bg-danger"
                                                                style="width: 15%"></span>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0);">
                                                        <i class="fa-brands fa-internet-explorer fs-16 text-teal me-2"></i>
                                                        <span>Internet Explorer</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="text-end d-flex align-items-center m-0">
                                                        <span class="me-3">12%</span>
                                                        <span class="progress w-100 ht-5">
                                                            <span class="progress-bar bg-teal" style="width: 12%"></span>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0);">
                                                        <i class="fa-brands fa-octopus-deploy fs-16 text-dark me-2"></i>
                                                        <span>Others Browser</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="text-end d-flex align-items-center m-0">
                                                        <span class="me-3">6%</span>
                                                        <span class="progress w-100 ht-5">
                                                            <span class="progress-bar bg-dark" style="width: 6%"></span>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="javascript:void(0);"
                                class="card-footer fs-11 fw-bold text-uppercase text-center">Explore Details</a>
                        </div>
                    </div>
                    <!-- [Browser States] end -->
                    <!-- [Mini Card] start -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="d-flex justify-content-between p-4 mb-4">
                                    <div>
                                        <div class="fw-bold mb-2 text-dark text-truncate-1-line">Bounce Rate (Avg)
                                        </div>
                                        <div class="fs-11 text-muted">VS 20.49% (Prev)</div>
                                    </div>
                                    <div class="text-end">
                                        <div class="fs-24 fw-bold mb-2 text-dark"><span class="counter">78.65</span>%
                                        </div>
                                        <div class="fs-11 text-success">(+ 22.85%)</div>
                                    </div>
                                </div>
                                <div id="bounce-rate"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="d-flex justify-content-between p-4 mb-4">
                                    <div>
                                        <div class="fw-bold mb-2 text-dark text-truncate-1-line">Page Views (Avg)
                                        </div>
                                        <div class="fs-11 text-muted">VS 36.47% (Prev)</div>
                                    </div>
                                    <div class="text-end">
                                        <div class="fs-24 fw-bold mb-2 text-dark"><span class="counter">86.37</span>%
                                        </div>
                                        <div class="fs-11 text-danger">(- 34.25%)</div>
                                    </div>
                                </div>
                                <div id="page-views"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="d-flex justify-content-between p-4 mb-4">
                                    <div>
                                        <div class="fw-bold mb-2 text-dark text-truncate-1-line">Site Impressions
                                            (Avg)</div>
                                        <div class="fs-11 text-muted">VS 43.67% (Prev)</div>
                                    </div>
                                    <div class="tx-right">
                                        <div class="fs-24 fw-bold mb-2 text-dark"><span class="counter">67.53</span>%
                                        </div>
                                        <div class="fs-11 text-success">(+ 42.72%)</div>
                                    </div>
                                </div>
                                <div id="site-impressions"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="d-flex justify-content-between p-4 mb-4">
                                    <div>
                                        <div class="fw-bold mb-2 text-dark text-truncate-1-line">Conversions Rate
                                            (Avg)</div>
                                        <div class="fs-11 text-muted">VS 22.34% (Prev)</div>
                                    </div>
                                    <div class="tx-right">
                                        <div class="fs-24 fw-bold mb-2 text-dark"><span class="counter">32.53</span>%
                                        </div>
                                        <div class="fs-11 text-success">(+ 35.47%)</div>
                                    </div>
                                </div>
                                <div id="conversions-rate"></div>
                            </div>
                        </div>
                    </div>
                    <!-- [Mini Card] end -->
                    <!-- [Goal Progress] start -->
                    <div class="col-xxl-4">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Goal Progress</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                                data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                                data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                                data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm"
                                            data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action">
                                <div class="row g-4">
                                    <div class="col-sm-6">
                                        <div class="px-4 py-3 text-center border border-dashed rounded-3">
                                            <div class="mx-auto mb-4">
                                                <div class="goal-progress-1"></div>
                                            </div>
                                            <h2 class="fs-13 tx-spacing-1">Marketing Gaol</h2>
                                            <div class="fs-11 text-muted text-truncate-1-line">$550/$1250 USD</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="px-4 py-3 text-center border border-dashed rounded-3">
                                            <div class="mx-auto mb-4">
                                                <div class="goal-progress-2"></div>
                                            </div>
                                            <h2 class="fs-13 tx-spacing-1">Teams Goal</h2>
                                            <div class="fs-11 text-muted text-truncate-1-line">$550/$1250 USD</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="px-4 py-3 text-center border border-dashed rounded-3">
                                            <div class="mx-auto mb-4">
                                                <div class="goal-progress-3"></div>
                                            </div>
                                            <h2 class="fs-13 tx-spacing-1">Leads Goal</h2>
                                            <div class="fs-11 text-muted text-truncate-1-line">$850/$950 USD</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="px-4 py-3 text-center border border-dashed rounded-3">
                                            <div class="mx-auto mb-4">
                                                <div class="goal-progress-4"></div>
                                            </div>
                                            <h2 class="fs-13 tx-spacing-1">Revenue Goal</h2>
                                            <div class="fs-11 text-muted text-truncate-1-line">$5,655/$12,500 USD
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="javascript:void(0);" class="btn btn-primary">Generate Report</a>
                            </div>
                        </div>
                    </div>
                    <!-- [Goal Progress] end -->
                    <!-- [Marketing Campaign] start -->
                    <div class="col-xxl-8">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Marketing Campaign</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Collapse/Expand">
                                            <a href="#" class="avatar-text avatar-xs bg-gray-300"
                                                data-bs-toggle="collapse"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="#" class="avatar-text avatar-xs bg-danger"
                                                data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="#" class="avatar-text avatar-xs bg-warning"
                                                data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="#" class="avatar-text avatar-xs bg-success"
                                                data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="#" class="avatar-text avatar-sm" data-bs-toggle="dropdown"
                                            data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div id="campaign-alytics-bar-chart"></div>
                            </div>
                            <div class="card-footer">
                                <div class="row g-4">
                                    <div class="col-lg-3">
                                        <div class="p-3 border border-dashed rounded">
                                            <div class="fs-12 text-muted mb-1">Reach</div>
                                            <h6 class="fw-bold text-dark">5,486</h6>
                                            <div class="progress mt-2 ht-3">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 81%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="p-3 border border-dashed rounded">
                                            <div class="fs-12 text-muted mb-1">Opened</div>
                                            <h6 class="fw-bold text-dark">42.75%</h6>
                                            <div class="progress mt-2 ht-3">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 82%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="p-3 border border-dashed rounded">
                                            <div class="fs-12 text-muted mb-1">Clicked</div>
                                            <h6 class="fw-bold text-dark">38.68%</h6>
                                            <div class="progress mt-2 ht-3">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 68%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="p-3 border border-dashed rounded">
                                            <div class="fs-12 text-muted mb-1">Conversion</div>
                                            <h6 class="fw-bold text-dark">16.68%</h6>
                                            <div class="progress mt-2 ht-3">
                                                <div class="progress-bar bg-dark" role="progressbar" style="width: 75%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Marketing Campaign] end -->
                    <!-- [Project Remainders] start -->
                    <div class="col-xxl-8">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Project Remainders</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                                data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                                data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                                data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm"
                                            data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Remaining</th>
                                                <th scope="col">Stage</th>
                                                <th scope="col" class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="hstack gap-2">
                                                        <span
                                                            class="wd-10 ht-10 bg-gray-400 rounded-circle d-inline-block me-2 lh-base"></span>
                                                        <div class="border-3 border-start rounded ps-3">
                                                            <a href="javascript:void(0);" class="mb-2 d-block">
                                                                <span>CRM Dashboard Redesign</span>
                                                            </a>
                                                            <p class="fs-12 text-muted mb-0">Management of project
                                                                under "Duralux" brand</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-soft-primary text-primary">In
                                                        Prograss</span>
                                                </td>
                                                <td>
                                                    <div data-time-countdown="countdown_1"></div>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-1">
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-warning rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-warning rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-gray-300 rounded-pill"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto">
                                                        <i class="feather-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="hstack gap-2">
                                                        <span
                                                            class="wd-10 ht-10 bg-gray-400 rounded-circle d-inline-block me-2 lh-base"></span>
                                                        <div class="border-3 border-start rounded ps-3">
                                                            <a href="javascript:void(0);" class="mb-2 d-block">
                                                                <span>Duralux CRM Admin Project</span>
                                                            </a>
                                                            <p class="fs-12 text-muted mb-0">Duralux CRM Dashbaord
                                                                Project</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-soft-info text-info">Updading</span>
                                                </td>
                                                <td>
                                                    <div data-time-countdown="countdown_2"></div>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-1">
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-warning rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-warning rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-gray-300 rounded-pill"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto">
                                                        <i class="feather-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="hstack gap-2">
                                                        <span
                                                            class="wd-10 ht-10 bg-gray-400 rounded-circle d-inline-block me-2 lh-base"></span>
                                                        <div class="border-3 border-start rounded ps-3">
                                                            <a href="javascript:void(0);" class="mb-2 d-block">
                                                                <span>Website Redesign for Nike</span>
                                                            </a>
                                                            <p class="fs-12 text-muted mb-0">Website Redesign for Nike
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-soft-danger text-danger">Upcoming</span>
                                                </td>
                                                <td>
                                                    <div data-time-countdown="countdown_3"></div>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-1">
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-warning rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-warning rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-gray-300 rounded-pill"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto">
                                                        <i class="feather-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="hstack gap-2">
                                                        <span
                                                            class="wd-10 ht-10 bg-gray-400 rounded-circle d-inline-block me-2 lh-base"></span>
                                                        <div class="border-3 border-start rounded ps-3">
                                                            <a href="javascript:void(0);" class="mb-2 d-block">
                                                                <span>Duralux CRM Dashbaord Project</span>
                                                            </a>
                                                            <p class="fs-12 text-muted mb-0">Duralux CRM Dashbaord
                                                                Project</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-soft-teal text-teal">Submitted</span>
                                                </td>
                                                <td>
                                                    <div data-time-countdown="countdown_4"></div>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-1">
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-warning rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-warning rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-gray-300 rounded-pill"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto">
                                                        <i class="feather-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="hstack gap-2">
                                                        <span
                                                            class="wd-10 ht-10 bg-gray-400 rounded-circle d-inline-block me-2 lh-base"></span>
                                                        <div class="border-3 border-start rounded ps-3">
                                                            <a href="javascript:void(0);" class="mb-2 d-block">
                                                                <span>Update User Flows with UX Feedback</span>
                                                            </a>
                                                            <p class="fs-12 text-muted mb-0">Update User Flows with UX
                                                                Feedback</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-soft-warning text-warning">Working</span>
                                                </td>
                                                <td>
                                                    <div data-time-countdown="countdown_5"></div>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-1">
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-success rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-warning rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-warning rounded-pill opacity-75">
                                                        </div>
                                                        <div class="wd-15 ht-4 bg-gray-300 rounded-pill"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto">
                                                        <i class="feather-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <ul class="list-unstyled d-flex align-items-center gap-2 mb-0 pagination-common-style">
                                        <li>
                                            <a href="javascript:void(0);"><i class="bi bi-arrow-left"></i></a>
                                        </li>
                                        <li><a href="javascript:void(0);" class="active">1</a></li>
                                        <li><a href="javascript:void(0);">2</a></li>
                                        <li>
                                            <a href="javascript:void(0);"><i class="bi bi-dot"></i></a>
                                        </li>
                                        <li><a href="javascript:void(0);">8</a></li>
                                        <li><a href="javascript:void(0);">9</a></li>
                                        <li>
                                            <a href="javascript:void(0);"><i class="bi bi-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Project Remainders] end -->
                    <!-- [Social Statistics] start -->
                    <div class="col-xxl-4">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Social Statistics</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                                data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                                data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                                data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm"
                                            data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                    class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="social-radar-chart"></div>
                            </div>
                            <a href="javascript:void(0);"
                                class="card-footer fs-11 fw-bold text-uppercase text-center">Explore Details</a>
                        </div>
                    </div>
                    <!-- [Social Statistics] end -->
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
        <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                <span>Copyright ©</span>
                <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </p>
            <div class="d-flex align-items-center gap-4">
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Help</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Terms</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Privacy</a>
            </div>
        </footer>
        <!-- [ Footer ] end -->
    </main>
@endsection
