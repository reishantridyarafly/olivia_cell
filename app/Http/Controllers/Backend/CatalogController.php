<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $catalog = Catalog::orderBy('name', 'asc')->get();
            return DataTables::of($catalog)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '
                        <div class="hstack gap-2 justify-content-end">
                            <div class="dropdown">
                                <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                    <i class="feather feather-more-horizontal"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button class="dropdown-item" id="btnEdit" data-id="' . $data->id . '">
                                            <i class="feather feather-edit-3 me-3"></i>
                                            <span>Edit</span>
                                        </button>
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
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.catalog.index');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'image' => 'required|image|mimes:jpg,png,jpeg,webp,svg|file|max:5120',
                'name' => 'required|unique:catalog,name,' . $id,
            ],
            [
                'name.required' => 'Silakan isi nama katalog terlebih dahulu.',
                'name.unique' => 'Nama katalog sudah tersedia.',
                'image.required' => 'Silakan isi foto terlebih dahulu.',
                'image.image' => 'File harus berupa gambar.',
                'image.mimes' => 'Ekstensi file harus berupa: jpg, png, jpeg, webp, atau svg.',
                'image.file' => 'File harus berupa gambar.',
                'image.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $filename = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $filename = uniqid() . '.' . $extension;
                $image->storeAs('catalog', $filename, 'public');

                if ($id) {
                    $existingCatalog = Catalog::find($id);
                    if ($existingCatalog && $existingCatalog->image) {
                        Storage::disk('public')->delete('catalog/' . $existingCatalog->image);
                    }
                }
            }

            $catalog = Catalog::updateOrCreate([
                'id' => $id
            ], [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $filename,
            ]);

            return response()->json(['catalog' => $catalog, 'message' => 'Data berhasil disimpan.']);
        }
    }




    public function edit($id)
    {
        $data = Catalog::find($id);
        return response()->json($data);
    }

    public function destroy(Request $request)
    {
        $catalog = Catalog::find($request->id);

        if ($catalog) {
            if ($catalog->image) {
                Storage::disk('public')->delete('catalog/' . $catalog->image);
            }

            $catalog->delete();

            return response()->json(['message' => 'Data berhasil dihapus']);
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
}
