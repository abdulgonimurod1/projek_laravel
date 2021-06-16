<?php

namespace App\Http\Controllers;

use App\bidding;
use App\Cart;
use App\Product;
use App\Category;
use App\cara_pemesanan;
use App\User;
use App\About_Us;
use App\Owner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with([
            'category'
        ])->get()->where('tampilkan', 1);
        $category =  Category::all();
        $cart = Cart::all();

        return view('halaman_utama.konten', [
            'category' => $category,
            'product' => $product,
            'cart' => $cart
          
        ]);
    }

    public function cari(Request $request)
	{
        $product = Product::with([
            'category'
        ])->get()->where('tampilkan', 1);
        $category =  Category::all();
        $cart = Cart::all();
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$product = DB::table('products')
		->where('nama_produk','like',"%".$cari."%")
        ->paginate();
        
        return view('halaman_utama.konten', [
            'category' => $category,
            'product' => $product,
            'cart' => $cart
        ]);
    }

    public function tentang()
    {
        $about = About_Us::all()->where('tampilkan', 1);
        $owner = Owner::all()->where('tampilkan', 1);
        $category =  Category::all();
        $cart = Cart::all();

        return view('konten.tentang_kami', [
            'category' => $category,
            'cart' => $cart,
            'owner' => $owner,
            'about' => $about,   
        ]);
    }

    public function hubungi()
    {
        $product = Product::with([
            'category'
        ])->get()->where('tampilkan', 1);
        $category =  Category::all();
        $cart = Cart::all();

        return view('konten.hubungi_kami', [
            'category' => $category,
            'product' => $product,
            'cart' => $cart
          
        ]);
    }
    
    public function pemesanan()
    {
        $product = Product::with([
            'category'
        ])->get()->where('tampilkan', 1);
        $category =  Category::all();
        $cart = Cart::all();
        $cara = cara_pemesanan::all();

        return view('konten.cara_pemesanan', [
            'category' => $category,
            'product' => $product,
            'cart' => $cart,
            'cara' => $cara          
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_produk )
    {
        $product = Product::where('id_produk', $id_produk)->first();
        $cart = $product->id_produk;

        // Validasi Stok
        if ($request->qty > $product->stok) {
            return redirect()->back()->with('danger','Anda Memesan melebihi Stok');
        }

        // Cek Validasi
        $cek = Cart::where('user_id', Auth::user()->id)->where('id_produk', $cart)->first();
        
        // Simpan ke Cart
        if ($product->stok != 0){
            if (empty($cek)) {
                $cart = New Cart;
                $cart->user_id = Auth::user()->id;
                $cart->id_produk = $product->id_produk;
                $cart->qty = $request->qty;
                $cart->harga = $product->harga;
                $cart->total = $cart->harga * $request->qty;
                $product->stok = $product->stok - $request->qty;
                $product->update();
                $cart->save();
                return redirect()->back()->with('success', 'Anda Menambahakan Pesanan Ke Keranjang');
            }else{
                $cart = Cart::where('user_id', Auth::user()->id)->where('id_produk', $cart)->first();
                $cart->qty = $request->qty + $cart->qty;

                $harga_cart_baru = $product->harga * $request->qty;     
                $cart->harga = $product->harga;
                $cart->total = $harga_cart_baru + $cart->total;
                $product->stok = $product->stok - $request->qty;

                $product->update();
                $cart->update();
                return redirect()->back()->with('success', 'Anda Menambahkan Jumlah Pesanan Ke Keranjang');
            } 
        }else{
            return redirect()->back()->with('danger','Mohon Maaf stok sudah habis');
        }
        
        return redirect()->back();
    }
    public function hapusCart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect('/keranjang')->with('success','Pesanan Anda Berhasil Dihapus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_produk)
    {
        $product = Product::with(['category'])->where('id_produk', $id_produk)->firstOrfail();
        $category =  Category::all();
        $cart =  Cart::all();
        if ($product->stok == 0){
            return view('konten.produk', [
                'category' => $category,
                'product' => $product,
                'cart' => $cart
            ]);
        }else{
            return view('admin.produk.view', [
                'category' => $category,
                'product' => $product,
                'cart' => $cart
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function penawaran(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'whatsapp' => 'required|min:11|max:15',
        ]);

        $random = "1234567890";
        
        $data = New bidding();
        $data->kode_pemesanan = Str::random($random, 12);
        $data->nama = Auth::user()->name;
        $data->whatsapp = $request->whatsapp;
        $data->email = $request->email;
        $data->status_penawaran = 'pending';
        $data->save();
        return redirect()->route('penawaran.invoice')->with('success','Penawaran Anda sedang kami proses');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search_kategori(Request $request,$id_kategori)
    {
        $product = Product::where('id_kategori', $id_kategori)->get()->where('tampilkan', 1);
        $category = Category::all();
        // $product = DB::table('products')->get();
        return view('halaman_utama.konten',['product'=>$product,'category'=>$category]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
