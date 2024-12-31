<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.page.transaksi.index',[
            'data'=>Transaksi::latest()->get(),
            'title'=>"LIST TRANSAKSI"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=Cart::where('id_user',Auth::user()->id)->get();

        $datas = [];

        foreach ($data as $item) {
        $datas[] = [
           'produk' => $item->produk->produk,
           'harga' => $item->produk->harga,
        ];
       }


       Transaksi::create([
        'id_user'=>Auth::user()->id,
        'produks'=> json_encode($datas) ,
        'total_harga'=>$request->total
       ]);

       return redirect('/')->with('success','Pembayaran Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('backend.page.transaksi.show',[
            'data'=>Transaksi::find($id),
            'title'=>"Detail Transaksi"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
