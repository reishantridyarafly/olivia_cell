<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::with('catalog')->where('status', 0)
            ->where('stock', '>', 0)
            ->orderBy('created_at', 'asc')
            ->paginate(12);

        $catalogs = Catalog::whereHas('products', function ($query) {
            $query->where('status', 0)
                ->where('stock', '>', 0);
        })->orderBy('name', 'asc')->get();

        return view('frontend.shop.index', compact(['products', 'catalogs']));
    }

    public function detail($slug)
    {
        $product = Product::with('catalog')->where('slug', $slug)->first();
        return view('frontend.shop.detail', compact('product'));
    }

    public function catalog($slug)
    {
        $catalogs = Catalog::whereHas('products', function ($query) {
            $query->where('status', 0)
                ->where('stock', '>', 0);
        })->orderBy('name', 'asc')->get();

        $catalogId = Catalog::where('slug', $slug)->first()->id;

        $products = Product::with('catalog')
            ->where('catalog_id', $catalogId)
            ->where('status', 0)
            ->where('stock', '>', 0)
            ->orderBy('created_at', 'asc')
            ->paginate(12);

        return view('frontend.shop.index', compact(['catalogs', 'products']));
    }
}
