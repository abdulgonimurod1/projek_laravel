<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\cart;
use App\Pesan;
use App\Web_View;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all()->count();
        $product = Product::all()->count();
        $kontak = Pesan::all();
        $pesan = Pesan::all()->count();
        $cart = cart::all()->count();
        $view = Web_View::all()->where('id', 1);
        return view('admin.dashboard', [
            'user' => $user,
            'product' => $product,
            'kontak' => $kontak,
            'pesan' => $pesan,
            'cart' => $cart,
            'view' => $view,
        ]);
    }
    
    public function pengunjung()
    {
        $pengunjung = Web_View::all();
        return view('admin.pengunjung', ['view' => $pengunjung ]);
    }
}
