<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.page.collection.index',[
            'data'=>Collection::latest()->get(),
            'title'=>"LIST COLLECTION"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.page.collection.create',[
            'title'=>"TAMBAH COLLECTION"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => "required|string",
            'neutered' => "required|in:yes,no",
            'gender' => "required|in:male,female",
            'age' => "required|numeric|min:0",
            'description' => "required",
            'image' => "required|mimes:png,jpg,jpeg|max:10000",
        ]);

        try {
            DB::beginTransaction();

            if ($request->file('image')) {
                $nameImage = time() . '-' . $request->image->hashName();
                Storage::putFileAs('public/img-collection', $request->image, $nameImage);
                $validate['image'] = 'public/img-collection/' . $nameImage;
            }

            Collection::create($validate);
            DB::commit();

            return redirect('dashboard/collection')->with('success', 'Collection Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            DB::rollback();

            return back()->with('failed', 'Terjadi kesalahan: ' . $th->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        //
    }

   
public function edit(Collection $collection)
{
    return view('backend.page.collection.edit', [
        'title' => "EDIT COLLECTION",
        'collection' => $collection,
    ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $collection)
{
    $validate = $request->validate([
        'name' => "required|string",
        'neutered' => "required|in:yes,no",
        'gender' => "required|in:male,female",
        'age' => "required|numeric|min:0",
        'description' => "required",
        'image' => "nullable|mimes:png,jpg,jpeg|max:10000",
    ]);

    try {
        DB::beginTransaction();

        if ($request->file('image')) {
            // Hapus gambar lama jika ada
            if ($collection->image && Storage::exists($collection->image)) {
                Storage::delete($collection->image);
            }

            // Simpan gambar baru
            $nameImage = time() . '-' . $request->image->hashName();
            Storage::putFileAs('public/img-collection', $request->image, $nameImage);
            $validate['image'] = 'public/img-collection/' . $nameImage;
        } else {
            // Pertahankan gambar lama jika tidak ada gambar baru
            $validate['image'] = $collection->image;
        }

        $collection->update($validate);
        DB::commit();

        return redirect('dashboard/collection')->with('success', 'Collection Berhasil Diperbarui');
    } catch (\Throwable $th) {
        DB::rollback();

        return back()->with('failed', 'Terjadi kesalahan: ' . $th->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     */
    /**
 * Remove the specified resource from storage.
 */
public function destroy(Collection $collection)
{
    try {
        DB::beginTransaction();

        // Hapus gambar dari penyimpanan jika ada
        if ($collection->image && Storage::exists($collection->image)) {
            Storage::delete($collection->image);
        }

        $collection->delete();
        DB::commit();

        return redirect('dashboard/collection')->with('success', 'Collection Berhasil Dihapus');
    } catch (\Throwable $th) {
        DB::rollback();

        return back()->with('failed', 'Terjadi kesalahan: ' . $th->getMessage());
    }
}

}
