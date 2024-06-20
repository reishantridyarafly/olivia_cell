<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $new_products = Product::where('products.status', 0)
            ->where('products.stock', '>', 0)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('frontend.beranda.index', compact(['new_products']));
    }
}
