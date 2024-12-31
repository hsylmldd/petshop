<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.page.produk.index', [
            'data' => Produk::latest()->get(),
            'title'=>"LIST PRODUK"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.page.produk.create',[
            'title'=>"TAMBAH PRODUK"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'produk' => 'required|unique:produks,produk',
            'image' => 'mimes:png,jpg,jpeg|max:6000',
            'image2' => 'mimes:png,jpg,jpeg|max:6000',
            'harga' => 'required|numeric',
            'description' => 'required'
        ]);

        try {
            DB::beginTransaction();

            if ($request->file('image')) {
                $nameImage = time() . '-' . $request->image->hashName();
                Storage::putFileAs('public/img-produk', $request->image, $nameImage);
                $validate['image'] = 'public/img-produk/' . $nameImage;
            }
            if ($request->file('image2')) {
                $nameImage2 = time() . '-' . $request->image2->hashName();
                Storage::putFileAs('public/img-produk2', $request->image2, $nameImage2);
                $validate['image2'] = 'public/img-produk2/' . $nameImage2;
            }

            Produk::create($validate);
            DB::commit();

            return redirect('/dashboard/produk')->with('success', 'Produk Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            DB::rollback();

            return back()->with('failed', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('backend.page.produk.edit', [
            'data' => $produk,
            'title'=>"EDIT PRODUK"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $validate = $request->validate([
            'produk' => 'required|unique:produks,produk,' . $produk->id,
            'image' => 'nullable|mimes:png,jpg,jpeg|max:6000',
            'image2' => 'nullable|mimes:png,jpg,jpeg|max:6000',
            'harga' => 'required|numeric',
            'description' => 'required'
        ]);

        try {
            DB::beginTransaction();

            // Handle image upload for 'image'
            if ($request->file('image')) {
                if ($produk->image) {
                    Storage::delete($produk->image);
                }
                $nameImage = time() . '-' . $request->image->hashName();
                Storage::putFileAs('public/img-produk', $request->image, $nameImage);
                $validate['image'] = 'public/img-produk/' . $nameImage;
            } else {
                $validate['image'] = $produk->image;
            }

            // Handle image upload for 'image2'
            if ($request->file('image2')) {
                if ($produk->image2) {
                    Storage::delete($produk->image2);
                }
                $nameImage2 = time() . '-' . $request->image2->hashName();
                Storage::putFileAs('public/img-produk2', $request->image2, $nameImage2);
                $validate['image2'] = 'public/img-produk2/' . $nameImage2;
            } else {
                $validate['image2'] = $produk->image2;
            }

            $produk->update($validate);
            DB::commit();

            return redirect('/dashboard/produk')->with('success', 'Produk berhasil diperbarui');
        } catch (\Throwable $th) {
            DB::rollback();

            return back()->with('failed', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        try {
            DB::beginTransaction();

            if ($produk->image) {
                Storage::delete($produk->image);
            }
            if ($produk->image2) {
                Storage::delete($produk->image2);
            }

            $produk->delete();
            DB::commit();

            return redirect('/dashboard/produk')->with('success', 'Produk berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('failed', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }
}
