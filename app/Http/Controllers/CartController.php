<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.cart',[
            'data'=>Cart::where('id_user',Auth::user()->id)->get(),
            'total' => Cart::leftJoin('produks', 'produks.id', '=', 'carts.id_produk')
    ->where('carts.id_user', Auth::user()->id)
    ->sum('produks.harga'),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( $id)
    {


        if(!Auth::user())
        {
            return redirect('/login');
        }

        $validate['id_user']=Auth::user()->id;
        $validate['id_produk']=$id;

        Cart::create($validate);

        return redirect('/')->with('success','Data Berhasil Ditambahkan Ke Keranjang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cart::destroy($id);

        return back()->with('success','Produk Berhasil dihapus');
    }
}
