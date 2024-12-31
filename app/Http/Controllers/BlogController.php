<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.page.blog.index', [
            'data' => Blog::latest()->get(),
            'title' => "DATA BLOG"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.page.blog.create', [
            'title' => "TAMBAH BLOG"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required|unique:blogs,judul',
            'image' => 'mimes:png,jpg,jpeg|max:6000',
            'description' => 'required'
        ]);

        $validate['slug'] = Str::slug($request->judul);

        try {
            DB::beginTransaction();

            // Menangani upload gambar
            if ($request->file('image')) {
                $nameImage = time() . '-' . $request->image->hashName();
                Storage::putFileAs('public/img-blog', $request->image, $nameImage);
                $validate['image'] = 'public/img-blog/' . $nameImage;
            }

            Blog::create($validate);
            DB::commit();

            return redirect('/dashboard/blog')->with('success', 'Blog Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('failed', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        // Menampilkan detail blog
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('backend.page.blog.edit', [
            'data' => Blog::find($id),
            'title' => "EDIT BLOG"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validate = $request->validate([
            'judul' => 'required|unique:blogs,judul,' . $blog->id,
            'image' => 'nullable|mimes:png,jpg,jpeg|max:6000',
            'description' => 'required'
        ]);

        $validate['slug'] = Str::slug($request->judul);

        try {
            DB::beginTransaction();

            // Menangani upload gambar baru jika ada
            if ($request->file('image')) {
                // Hapus gambar lama jika ada
                if ($blog->image) {
                    Storage::delete($blog->image);
                }

                // Simpan gambar baru
                $nameImage = time() . '-' . $request->image->hashName();
                Storage::putFileAs('public/img-blog', $request->image, $nameImage);
                $validate['image'] = 'public/img-blog/' . $nameImage;
            } else {
                // Jika tidak ada gambar baru, tetap gunakan gambar lama
                $validate['image'] = $blog->image;
            }

            $blog->update($validate);
            DB::commit();

            return redirect('/dashboard/blog')->with('success', 'Blog berhasil diperbarui');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('failed', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);


        // Hapus gambar hanya jika  ada
        if ($blog->image) {
            Storage::delete($blog->image);
        }

        // Hapus blog dari database
        $blog->delete();

        return redirect('/dashboard/blog')->with('success', 'Blog berhasil dihapus');
    }
}
