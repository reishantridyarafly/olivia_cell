<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $catalog_count = Catalog::all()->count();
        $product_count = Product::all()->count();
        return view('backend.dashboard.index', compact(['catalog_count', 'product_count']));
    }
}
