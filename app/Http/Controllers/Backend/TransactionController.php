<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $transaction = Transaction::orderBy('transaction_date', 'desc')->get();
            return DataTables::of($transaction)
                ->addIndexColumn()
                ->addColumn('transaction_date', function ($data) {
                    $date = Carbon::parse($data->transaction_date);
                    $months = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $monthName = $months[$date->format('F')];
                    $formattedDate = $date->format('d') . ' ' . $monthName . ' ' . $date->format('Y');
                    return $formattedDate;
                })
                ->addColumn('type_payment', function ($data) {
                    return $data->type_payment == 'cash' ? 'Tunai' : 'Transfer';
                })
                ->addColumn('type_transaction', function ($data) {
                    return $data->type_transaction == 'online' ? '<span class="badge rounded-pill text-bg-success text-light">Online</span>' : '<span class="badge rounded-pill text-bg-danger text-light">Offline</span>';
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
                ->addColumn('total_price', function ($data) {
                    return  'Rp ' . number_format($data->total_price, 0, ',', '.');
                })
                ->addColumn('action', function ($data) {
                    return '
                        <div class="hstack gap-2 justify-content-end">
                            <div class="dropdown">
                                <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                    <i class="feather feather-more-horizontal"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="' . route('transaction.detail', $data->id) . '" class="dropdown-item">
                                            <i class="feather feather-eye me-3"></i>
                                            <span>Lihat</span>
                                        </a>
                                    <li>
                                        <button class="dropdown-item" id="btnDelete" data-id="' . $data->id . '">
                                            <i class="feather feather-trash-2 me-3"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>';
                })
                ->rawColumns(['action', 'type_transaction', 'status'])
                ->make(true);
        }
        return view('backend.transaction.index');
    }
    public function create()
    {
        $users = User::where('type', 2)->orderBy('first_name', 'asc')->get();
        $products = Product::orderBy('name', 'asc')->where('stock', '>', 0)->get();
        return view('backend.transaction.add', compact(['users', 'products']));
    }

    public function store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->code = $this->generateTransactionCode();
        $transaction->transaction_date = $request->transaction_date;
        $transaction->user_id = $request->customers;
        $transaction->customer_name = $request->customer_name;
        $transaction->type_payment = $request->type_payment;
        $transaction->type_transaction = 'offline';
        $transaction->status = 'completed';
        $transaction->discount = $request->discount;
        $subtotal_price = floatval(str_replace(['Rp', ' ', '.', "\xc2\xa0"], '', $request->subtotal));
        $discount_percentage = $request->discount;
        $discount_amount = $subtotal_price * ($discount_percentage / 100);
        $transaction->discount = $discount_amount;
        $transaction->total_price = floatval(str_replace(['Rp', ' ', '.', "\xc2\xa0"], '', $request->total));
        $transaction->save();

        foreach ($request->input('products') as $key => $productId) {
            $detail = new TransactionDetail();
            $detail->transaction_id = $transaction->id;
            $detail->product_id = $productId;
            $detail->quantity = $request->input('qty.' . $key);
            $detail->unit_price = floatval(str_replace(['Rp', ' ', '.', "\xc2\xa0"], '', $request->input('price.' . $key)));
            $detail->total_price = floatval(str_replace(['Rp', ' ', '.', "\xc2\xa0"], '', $request->input('total_items.' . $key)));
            $detail->save();

            $product = Product::find($productId);
            if ($product) {
                $product->stock -= $detail->quantity;
                $product->save();
            }
        }


        return response()->json(['message' => 'Transaksi berhasil disimpan']);
    }

    private function generateTransactionCode()
    {
        $prefix = 'T';
        $date = now()->format('Ymd');

        $lastTransaction = Transaction::latest()->first();
        $lastCode = $lastTransaction ? substr($lastTransaction->code, -4) : '0000';
        $nextCode = str_pad(intval($lastCode) + 1, 4, '0', STR_PAD_LEFT);

        return $prefix . $date . $nextCode;
    }

    public function detail($id)
    {
        $transaction = Transaction::with(['details', 'address' => function ($query) {
            $query->join('provinces', 'address.province_id', '=', 'provinces.id')
                ->join('cities', 'address.city_id', '=', 'cities.id')
                ->select('address.*', 'provinces.name as province_name', 'cities.name as city_name', 'cities.postal_code as postal_code');
        }])->find($id);

        $months = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];

        $date = Carbon::parse($transaction->transaction_date);
        $monthName = $months[$date->format('F')];
        $formattedDate = $date->format('d') . ' ' . $monthName . ' ' . $date->format('Y');
        $transaction->formatted_transaction_date = $formattedDate;
        $subtotal = $transaction->details->sum('total_price');

        return view('backend.transaction.detail', compact(['transaction', 'subtotal']));
    }

    public function failed(Request $request)
    {
        $checkout = Transaction::find($request->id);
        $checkout->status = 'failed';
        $checkout->save();
        return response()->json(['message' => 'Data berhasil di simpan.']);
    }

    public function process(Request $request)
    {
        $checkout = Transaction::find($request->id);
        $checkout->status = 'process';
        $checkout->save();
        return response()->json(['message' => 'Data berhasil di simpan.']);
    }

    public function completed(Request $request)
    {
        $checkout = Transaction::find($request->id);
        $checkout->status = 'completed';
        $checkout->save();
        return response()->json(['message' => 'Data berhasil di simpan.']);
    }

    public function updateResi(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'no_resi' => 'required|unique:transactions,resi,' . $id,
            ],
            [
                'no_resi.required' => 'Silakan isi no resi terlebih dahulu.',
                'no_resi.unique' => 'No resi sudah tersedia.'
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $checkout = Transaction::find($id);
            $checkout->resi = $request->no_resi;
            $checkout->save();
            return response()->json(['message' => 'Data berhasil di simpan.']);
        }
    }
}
