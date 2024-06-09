@extends('layouts.backend.main')
@section('title', 'Transaksi')
@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">@yield('title')</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">@yield('title')</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->

            <!-- [ Main Content ] start -->
            <div class="main-content container-lg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card invoice-container">
                            <div class="card-header">
                                <div>
                                    <h2 class="fs-16 fw-700 text-truncate-1-line mb-0 mb-sm-1">Invoice Preview</h2>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="javascript:void(0)" class="d-flex me-1 printBTN" id="printInvoice">
                                        <div class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                            title="Print Invoice"><i class="feather feather-printer"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="px-4 pt-4">
                                    <div class="d-sm-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="fs-24 fw-bolder font-montserrat-alt text-uppercase">Olivia Cell
                                            </div>
                                            <address class="text-muted">
                                                Dusun Pahing, RT 002 / RW 013,<br>
                                                Desa Mekarsari Kec.Jatiwangi,<br>
                                                Kab. Majalengka
                                            </address>
                                        </div>
                                        <div class="lh-lg pt-3 pt-sm-0">
                                            <h2 class="fs-4 fw-bold text-primary">Invoice</h2>
                                            <div>
                                                <span class="fw-bold text-dark">Invoice:</span>
                                                <span class="fw-bold text-primary">{{ $transaction->code }}</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark">Tanggal:</span>
                                                <span
                                                    class="text-muted">{{ $transaction->formatted_transaction_date }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="border-dashed mb-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>QTY</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($transaction->details as $detail)
                                                <tr>
                                                    <td><a href="javascript:void(0)">{{ $detail->product->name }} </a></td>
                                                    <td>{{ 'Rp ' . number_format($detail->product->after_price, 0, ',', '.') }}
                                                    </td>
                                                    <td>{{ $detail->quantity }}</td>
                                                    <td class="text-dark fw-semibold">
                                                        {{ 'Rp ' . number_format($detail->total_price, 0, ',', '.') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">Data tidak tersedia</td>
                                                </tr>
                                            @endforelse

                                            <tr>
                                                <td colspan="2"></td>
                                                <td class="fw-semibold text-dark bg-gray-100 text-lg-end">Subtotal</td>
                                                <td class="fw-bold bg-gray-100">
                                                    {{ 'Rp ' . number_format($subtotal, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td class="fw-semibold text-dark bg-gray-100 text-lg-end">Diskon</td>
                                                <td class="fw-bold text-success bg-gray-100">-
                                                    {{ 'Rp ' . number_format($transaction->discount, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td class="fw-semibold text-dark bg-gray-100 text-lg-end">Total Keseluruhan
                                                </td>
                                                <td class="fw-bolder text-dark bg-gray-100">
                                                    {{ 'Rp ' . number_format($transaction->total_price, 0, ',', '.') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </main>

    <script type="text/javascript">
        document.getElementById('printInvoice').addEventListener('click', function() {
            var printContents = document.querySelector('.card-body').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            window.location.reload();
        });
    </script>
@endsection
