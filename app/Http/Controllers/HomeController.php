<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
      return view('backend.page.home.index',[
        'revenue'=>Transaksi::sum('total_harga'),
        'transaksi'=>Transaksi::count(),
        'produk'=>Produk::count(),
        'collection'=>Collection::count(),
      ]);
    }
    public function profile()
    {
      return view('backend.page.home.profile');
    }
}
