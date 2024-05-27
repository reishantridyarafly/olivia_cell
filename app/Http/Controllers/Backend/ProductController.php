<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $product = Product::orderBy('name', 'asc')->get();
            return DataTables::of($product)
                ->addIndexColumn()
                ->addColumn('catalog', function ($data) {
                    return $data->catalog->name;
                })
                ->addColumn('after_price', function ($data) {
                    return 'Ro ' . number_format($data->after_price, 0, ',', '.');
                })

                ->addColumn('status', function ($data) {
                    $status = $data->status == 0 ? '<div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" data-id="' . $data->id . '" checked>
                        <label class="form-check-label" for="status">Aktif</label>
                    </div>' : '<div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" data-id="' . $data->id . '">
                    <label class="form-check-label" for="status">Tidak Aktif</label>
                    </div>';
                    return $status;
                })
                ->addColumn('action', function ($data) {
                    return '
                        <div class="hstack gap-2 justify-content-end">
                            <a href="invoice-view.html" class="avatar-text avatar-md">
                                <i class="feather feather-eye"></i>
                            </a>
                            <div class="dropdown">
                                <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                    <i class="feather feather-more-horizontal"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="' . route('product.edit', $data->id) . '" class="dropdown-item">
                                            <i class="feather feather-edit-3 me-3"></i>
                                            <span>Edit</span>
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
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('backend.product.index');
    }

    public function create()
    {
        $catalog = Catalog::orderBy('name', 'asc')->get();
        return view('backend.product.add', compact('catalog'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|unique:products,name',
                'imei1' => 'required',
                'description' => 'required|string',
                'short_description' => 'required|string',
                'before_price' => 'required',
                'after_price' => 'required',
                'stock' => 'required|string',
                'weight' => 'required',
                'photo' => 'required|max:5120',
                'photo.*' => 'image|mimes:jpg,png,jpeg,webp,svg|file|max:5120',
                'catalog' => 'required|string',
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu.',
                'name.string' => 'Nama harus berupa teks.',
                'name.unique' => 'Nama sudah tersedia.',
                'imei1.required' => 'Silakan isi imei terlebih dahulu.',
                'description.required' => 'Silakan isi deskripsi terlebih dahulu.',
                'description.string' => 'Deskripsi harus berupa teks.',
                'short_description.required' => 'Silakan isi deskripsi singkat terlebih dahulu.',
                'short_description.string' => 'Deskripsi singkat harus berupa teks.',
                'short_description.string' => 'Deskripsi singkat harus berupa teks.',
                'before_price.required' => 'Silakan isi harga terlebih dahulu.',
                'after_price.required' => 'Silakan isi harga jual terlebih dahulu.',
                'stock.required' => 'Silakan isi stok terlebih dahulu.',
                'stock.string' => 'Stok harus berupa teks.',
                'weight.required' => 'Silakan isi berat terlebih dahulu.',
                'catalog.required' => 'Silakan pilih Katalog terlebih dahulu.',
                'catalog.string' => 'Katalog harus berupa teks.',
                'photo.required' => 'Silakan isi foto terlebih dahulu.',
                'photo.image' => 'File harus berupa gambar.',
                'photo.mimes' => 'Ekstensi file harus berupa: jpg, png, jpeg, webp, atau svg.',
                'photo.file' => 'File harus berupa gambar.',
                'photo.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $product = new Product();

            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->imei1 = $request->imei1;
            $product->imei2 = $request->imei2;
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->before_price = str_replace(['Rp', ' ', '.'], '', $request->before_price);
            $product->after_price = str_replace(['Rp', ' ', '.'], '', $request->after_price);
            $product->stock = $request->stock;
            $product->weight = $request->weight;
            $product->catalog_id = $request->catalog;
            $product->save();

            if ($request->hasFile('photo')) {
                foreach ($request->file('photo') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    Storage::putFileAs('public/uploads/products', $image, $imageName);
                    $product->photos()->create(['photo_name' => $imageName]);
                }
            }

            return response()->json(['success' => 'Data berhasil disimpan']);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $catalog = Catalog::orderBy('name', 'asc')->get();
        return view('backend.product.edit', compact('product', 'catalog'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|unique:products,name,' . $id,
                'imei1' => 'required',
                'description' => 'required|string',
                'short_description' => 'required|string',
                'before_price' => 'required',
                'after_price' => 'required',
                'stock' => 'required|string',
                'weight' => 'required',
                'photo' => 'max:5120',
                'photo.*' => 'image|mimes:jpg,png,jpeg,webp,svg|file|max:5120',
                'catalog' => 'required|string',
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu.',
                'name.string' => 'Nama harus berupa teks.',
                'name.unique' => 'Nama sudah tersedia.',
                'imei1.required' => 'Silakan isi imei terlebih dahulu.',
                'description.required' => 'Silakan isi deskripsi terlebih dahulu.',
                'description.string' => 'Deskripsi harus berupa teks.',
                'short_description.required' => 'Silakan isi deskripsi singkat terlebih dahulu.',
                'short_description.string' => 'Deskripsi singkat harus berupa teks.',
                'short_description.string' => 'Deskripsi singkat harus berupa teks.',
                'before_price.required' => 'Silakan isi harga terlebih dahulu.',
                'after_price.required' => 'Silakan isi harga jual terlebih dahulu.',
                'stock.required' => 'Silakan isi stok terlebih dahulu.',
                'stock.string' => 'Stok harus berupa teks.',
                'weight.required' => 'Silakan isi berat terlebih dahulu.',
                'catalog.required' => 'Silakan pilih Katalog terlebih dahulu.',
                'catalog.string' => 'Katalog harus berupa teks.',
                'photo.required' => 'Silakan isi foto terlebih dahulu.',
                'photo.image' => 'File harus berupa gambar.',
                'photo.mimes' => 'Ekstensi file harus berupa: jpg, png, jpeg, webp, atau svg.',
                'photo.file' => 'File harus berupa gambar.',
                'photo.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $product = Product::find($id);

            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->imei1 = $request->imei1;
            $product->imei2 = $request->imei2;
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->before_price = str_replace(['Rp', ' ', '.'], '', $request->before_price);
            $product->after_price = str_replace(['Rp', ' ', '.'], '', $request->after_price);
            $product->stock = $request->stock;
            $product->weight = $request->weight;
            $product->catalog_id = $request->catalog;
            $product->save();

            if ($request->hasFile('photo')) {
                $this->deleteProductImages($product);
                foreach ($request->file('photo') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    Storage::putFileAs('public/uploads/products', $image, $imageName);
                    $product->photos()->create(['photo_name' => $imageName]);
                }
            }

            return response()->json(['success' => 'Data berhasil disimpan']);
        }
    }

    private function deleteProductImages($product)
    {
        foreach ($product->photos as $photo) {
            Storage::delete('public/uploads/products/' . $photo->photo_name);
            $photo->delete();
        }
    }

    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $this->deleteProductImages($product);
        $product->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }

    public function updateStatus(Request $request)
    {
        $produk = Product::find($request->id);
        $produk->status = $request->status;
        $produk->save();
        return response()->json($produk);
    }
}
