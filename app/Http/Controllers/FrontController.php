<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cart;
use App\Models\Collection;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id??0;

        return view('frontend.index',[
            'colecction'=>Collection::latest()->get(),
            'produk'=>Produk::latest()->get(),
            'blog'=>Blog::latest()->get(),
            'cart'=>Cart::where('id_user',$user)->get()
        ]);
    }
}
