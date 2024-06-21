@extends('layouts.backend.main')
@section('title', 'Detail Transaksi')
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
                        <li class="breadcrumb-item"><a href="{{ route('transaction.index') }}">Transaksi</a></li>
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
                                    <h2 class="fs-16 fw-700 text-truncate-1-line mb-0 mb-sm-1">@yield('title')</h2>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="javascript:void(0)" class="d-flex me-1 printBTN" id="printInvoice">
                                        <div class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                            title="Print Invoice"><i class="feather feather-printer"></i></div>
                                    </a>
                                    @if (auth()->user()->type == 'Administrator')
                                        @if ($transaction->status == 'pending')
                                            <a href="javascript:void(0)" class="d-flex me-1">
                                                <div class="avatar-text avatar-md" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" id="btnFailed" data-id="{{ $transaction->id }}"
                                                    title="Tolak"><i class="feather feather-x"></i>
                                                </div>
                                            </a>

                                            <a href="javascript:void(0)" class="d-flex me-1">
                                                <div class="avatar-text avatar-md" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" id="btnProcess" data-id="{{ $transaction->id }}"
                                                    title="Proses"><i class="feather feather-repeat"></i></div>
                                            </a>
                                        @endif
                                        @if ($transaction->status == 'process' && $transaction->resi == null)
                                            <a href="javascript:void(0)" class="d-flex me-1">
                                                <div class="avatar-text avatar-md" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" id="btnUpdateResi"
                                                    data-id="{{ $transaction->id }}" title="Update Resi"><i
                                                        class="feather feather-clipboard"></i></div>
                                            </a>
                                        @endif
                                    @endif
                                    @if ($transaction->status == 'process' && $transaction->resi != null)
                                        <a href="javascript:void(0)" class="d-flex me-1">
                                            <div class="avatar-text avatar-md" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" id="btnCompleted" data-id="{{ $transaction->id }}"
                                                title="Barang diterima"><i class="feather feather-check-circle"></i></div>
                                        </a>
                                    @endif
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
                                <hr class="border-dashed">
                                <div class="px-4 py-sm-5">
                                    <div class="d-sm-flex gap-4 justify-content-center">
                                        <div class="text-sm-end">
                                            <h2 class="fs-16 fw-bold text-dark mb-3">Alamat Pengiriman:</h2>
                                            <address class="text-muted lh-lg" style="width: 200px">
                                                @if ($transaction->address != null)
                                                    {{ $transaction->address->name }}<br>
                                                    {{ $transaction->address->telephone }}<br>
                                                    {{ $transaction->address->detail_address }}<br>
                                                    <strong>{{ optional($transaction->address)->city_name }}</strong>,
                                                    <strong>{{ optional($transaction->address)->province_name }}</strong>,
                                                    <strong>{{ optional($transaction->address)->postal_code }}</strong>
                                                @else
                                                    Tidak dikirim
                                                @endif
                                            </address>
                                        </div>
                                        <div class="border-end border-end-dashed border-gray-500 d-none d-sm-block"></div>
                                        <div class="mt-4 mt-sm-0">
                                            <h2 class="fs-16 fw-bold text-dark mb-3">Detail Pembayaran:</h2>
                                            <div class="text-muted lh-lg">
                                                <div>
                                                    <span class="text-muted">Total Pembayaran:</span>
                                                    <span class="fw-bold text-dark">
                                                        {{ 'Rp ' . number_format($transaction->total_price, 0, ',', '.') }}</span>
                                                </div>
                                                <div>
                                                    <span class="text-muted">Status:</span>
                                                    @if ($transaction->status == 'pending')
                                                        <span class="fw-bold text-warning">Pending</span>
                                                    @elseif ($transaction->status == 'process')
                                                        <span class="fw-bold text-warning">Proses</span>
                                                    @elseif ($transaction->status == 'completed')
                                                        <span class="fw-bold text-success">Selesai</span>
                                                    @else
                                                        <span class="fw-bold text-danger">Gagal</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <span class="text-muted">Nama:</span>
                                                    <span
                                                        class="fw-bold text-dark">{{ $transaction->customer_name }}</span>
                                                </div>
                                                <div>
                                                    <span class="text-muted">Tipe transaksi:</span>
                                                    <span class="fw-bold text-dark">{!! $transaction->type_transaction == 'online'
                                                        ? '<span class="badge rounded-pill text-bg-success text-light">Online</span>'
                                                        : '<span class="badge rounded-pill text-bg-danger text-light">Offline</span>' !!}</span>
                                                </div>
                                                @if ($transaction->courier)
                                                    <div>
                                                        <span class="text-muted">Ekspedisi:</span>
                                                        <span class="fw-bold text-dark"
                                                            style="text-transform: uppercase">{{ $transaction->courier }}
                                                            -
                                                            {{ $transaction->resi ? $transaction->resi : 'No Resi Belum Tersedia' }}</span>
                                                    </div>
                                                @endif
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
                                                    <td><a href="javascript:void(0)">{{ $detail->product->name }} </a>
                                                    </td>
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
                                                    {{ 'Rp ' . number_format($transaction->total_price, 0, ',', '.') }}
                                                </td>
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

    <!-- modal -->
    <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="id" id="id" value="{{ $transaction->id }}">
                            <label for="no_resi" class="form-label">No Resi</label>
                            <input type="text" id="no_resi" name="no_resi" class="form-control" autofocus>
                            <small class="text-danger errorNoResi"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('script')
    <script type="text/javascript">
        document.getElementById('printInvoice').addEventListener('click', function() {
            var printContents = document.querySelector('.card-body').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            window.location.reload();
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#btnFailed', function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Tolak',
                    text: "Apakah anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, tolak!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('transaction.failed') }}",
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Sukses',
                                    text: response.message,
                                }).then(function() {
                                    window.location.href = window.location.href;
                                });
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log(xhr.status + "\n" + xhr.responseText +
                                    "\n" +
                                    thrownError);
                            }
                        })
                    }
                })
            })

            $('body').on('click', '#btnProcess', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('transaction.process') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response.message,
                        }).then(function() {
                            window.location.href = window.location.href;
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status + "\n" + xhr.responseText +
                            "\n" +
                            thrownError);
                    }
                })
            })

            $('body').on('click', '#btnCompleted', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('transaction.completed') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response.message,
                        }).then(function() {
                            window.location.href = window.location.href;
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status + "\n" + xhr.responseText +
                            "\n" +
                            thrownError);
                    }
                })
            })

            $('body').on('click', '#btnUpdateResi', function() {
                $('#modalLabel').html("Update Resi");
                $('#modal').modal('show');
                $('#form').trigger("reset");

                $('#noResi').removeClass('is-invalid');
                $('.errorNoResi').html('');
            });

            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ route('transaction.updateResi') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#simpan').attr('disable', 'disabled');
                        $('#simpan').text('Proses...');
                    },
                    complete: function() {
                        $('#simpan').removeAttr('disable');
                        $('#simpan').html('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.no_resi) {
                                $('#no_resi').addClass('is-invalid');
                                $('.errorNoResi').html(response.errors.no_resi);
                            } else {
                                $('#no_resi').removeClass('is-invalid');
                                $('.errorNoResi').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.message,
                            }).then(function() {
                                $('#modal').modal('hide');
                                $('#form').trigger("reset");
                                window.location.href = window.location.href;
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });
        })
    </script>
@endsection
