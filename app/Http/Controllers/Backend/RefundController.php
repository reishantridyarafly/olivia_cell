<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Refund;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RefundController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $refund = Refund::with('transaction')->orderBy('created_at', 'asc')->get();
            return DataTables::of($refund)
                ->addIndexColumn()
                ->addColumn('invoice', function ($data) {
                    return $data->transaction->code;
                })
                ->addColumn('name', function ($data) {
                    $name = $data->user->first_name . ' ' . $data->user->last_name;
                    return $name;
                })
                ->addColumn('status', function ($data) {
                    $status = '';
                    if ($data->status == 'pending') {
                        $status = '<span class="fw-bold text-warning">Pending</span>';
                    } elseif ($data->status == 'process') {
                        $status = '<span class="fw-bold text-warning">Proses</span>';
                    } elseif ($data->status == 'completed') {
                        $status = '<span class="fw-bold text-success">Selesai</span>';
                    } else {
                        $status = '<span class="fw-bold text-danger">Gagal</span>';
                    }
                    return $status;
                })
                ->addColumn('action', function ($data) {
                    $action = '';
                    if (auth()->user()->type == 'Administrator') {
                        $action = '<li>
                                        <a href="' . route('refund.detail', $data->id) . '" class="dropdown-item">
                                            <i class="feather feather-eye me-3"></i>
                                            <span>Lihat</span>
                                        </a>
                                    <li>
                                        <button class="dropdown-item" id="btnDelete" data-id="' . $data->id . '">
                                            <i class="feather feather-trash-2 me-3"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </li>';
                    } else {
                        $action = '<li>
                        <a href="' . route('refund.detail', $data->id) . '" class="dropdown-item">
                            <i class="feather feather-eye me-3"></i>
                            <span>Lihat</span>
                        </a>';
                    }
                    return '
                        <div class="hstack gap-2 justify-content-end">
                            <div class="dropdown">
                                <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                    <i class="feather feather-more-horizontal"></i>
                                </a>
                                <ul class="dropdown-menu">
                                ' . $action . '
                                </ul>
                            </div>
                        </div>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('backend.refund.index');
    }

    public function detail($id)
    {
        $refund = Refund::with('transaction', 'user')->find($id);
        return view('backend.refund.detail', compact('refund'));
    }

    public function failed(Request $request)
    {
        $refund = Refund::find($request->id);
        $refund->status = 'failed';
        $refund->save();

        return response()->json(['message' => 'Pengembalian ditolak!']);
    }

    public function process(Request $request)
    {
        $refund = Refund::find($request->id);
        $refund->status = 'process';
        $refund->processed_date = now();
        $refund->save();

        return response()->json(['message' => 'Pengembalian diproses!']);
    }

    public function completed(Request $request)
    {
        $refund = Refund::find($request->id);
        $refund->status = 'completed';
        $refund->save();

        return response()->json(['message' => 'Pengembalian selesai diproses!']);
    }
}
