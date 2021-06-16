<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Product;
use App\cart;
use App\cart_detail;
use App\Category;
use App\About_Us;
use App\Owner;
use App\Slider;
use App\Kontak;
use App\Sosmed;
use App\cara_pemesanan;
use App\Penawaran;
use App\banner_promo;
use App\message;
use App\web_view;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $product = DB::table('products')->paginate(8);
        $product_top = product::where('tampilkan', 'ya')->where('jenis_produk','top produk')->limit(15)->get();
        $promo1 = product::where('tampilkan', 'ya')->where('jenis_produk','promo')->limit(1)->orderBy('id_produk', 'desc')->get();
        $product_promo = product::where('tampilkan', 'ya')->where('jenis_produk','promo')->limit(4)->get();
        $product_baru = product::where('tampilkan', 'ya')->where('jenis_produk','produk baru')->limit(15)->get();
        $category = Category::all();
        $slider = Slider::where('tampilkan', 'ya')->get();
        $kontak = Kontak::all();
        $sosmed = Sosmed::all();
        $banpro = banner_promo::where('tampilkan', 'ya')->limit(1)->get();
        
        $web_view = web_view::where('Nama', 'Home')->first();
        $web_view->view = $web_view->view + 1;
        $web_view->update();
        
        return view('halaman_utama.konten',['pd'=>$product,'cg'=>$category, 'sosmed'=>$sosmed, 'contact'=>$kontak, 'sliders'=>$slider, 'top'=>$product_top, 'promo'=>$product_promo, 'promo1'=>$promo1, 'baru'=>$product_baru, 'banpro'=>$banpro]);
    }
    
    public function detail($id_produk)
    {
        $product = Product::find($id_produk);
        $kategori = Category::all()->where('id_kategori', $product->id_kategori)->first();
        $category = Category::all();
        $kontak = Kontak::all();
        $sosmed = Sosmed::all();
        
        $product = product::where('id_produk', $id_produk)->first();
        $product->dilihat = $product->dilihat + 1;
        $product->update();
        
        
        // dd($category);  
        return view('halaman_utama.detail_produk',['product'=>$product, 'sosmed'=>$sosmed, 'contact'=>$kontak,'cg'=>$category, 'kategori'=>$kategori]);
    }

    public function buat_penawaran(Request $request)
    {
        // dd($request->all());
        $startTime = date("YmdHis");
        // dd($startTime);
        
        $penawaran = new penawaran;
        $penawaran->kode_penawaran = $startTime;
        $penawaran->id_produk = $request->id_produk;
        $penawaran->nama = $request->nama;
        $penawaran->alamat = $request->alamat;
        $penawaran->email = $request->Email;
        $penawaran->nomer_wa = $request->nomor;
        $penawaran->save();
        return redirect('/detail/'.$request->id_produk);
    }
    
    public function search(Request $request)
    {
        $slider = Slider::all();
        $query = $request->input('query');
        $product = Product::where('nama_produk','like', "%$query%")->orwhere('deskripsi','like', "%$query%")->get();
        $product_promo = product::where('tampilkan', 'ya')->where('jenis_produk','promo')->limit(5)->orderBy('id_produk', 'desc')->get();
        $category = Category::all();
        $kontak = Kontak::all();
        $sosmed = Sosmed::all();

        // dd($query);
        return view('halaman_utama.shop')->with(['product'=>$product,'cg'=>$category, 'sosmed'=>$sosmed, 'contact'=>$kontak, 'sliders'=>$slider,'promo'=>$product_promo]);
    }

    public function shop_page()
    {
        $product = Product::all();
        $category = Category::all();
        $product_promo = product::where('tampilkan', 'ya')->where('jenis_produk','promo')->limit(5)->orderBy('id_produk', 'desc')->get();
        $kontak = Kontak::all();
        $sosmed = Sosmed::all();
        // $product = DB::table('products')->get();
        return view('halaman_utama.shop',['product'=>$product, 'sosmed'=>$sosmed, 'contact'=>$kontak,'cg'=>$category,'promo'=>$product_promo]);
    }

    public function search_kategori(Request $request,$id_kategori)
    {
        $product = Product::where('id_kategori', $id_kategori)->get();
        $category = Category::all();
        $product_promo = product::where('tampilkan', 'ya')->where('jenis_produk','promo')->where('id_kategori', $id_kategori)->orderBy('id_produk', 'desc')->limit(5)->get();
        $kontak = Kontak::all();
        $sosmed = Sosmed::all();
        // $product = DB::table('products')->get();
        return view('halaman_utama.shop',['product'=>$product,'sosmed'=>$sosmed, 'contact'=>$kontak,'cg'=>$category,'promo'=>$product_promo]);
    }
    public function tentang_kami()
    {
        $about_us = About_Us::where('tampilkan', 'ya')->get();
        $owner = Owner::all();
        $category = Category::all();
        $kontak = Kontak::all();
        $sosmed = Sosmed::all();
        return view('konten.tentang_kami',['about'=>$about_us, 'sosmed'=>$sosmed, 'owner'=>$owner, 'contact'=>$kontak, 'cg'=>$category]);
    }

    public function hubungi_kami()
    {
        $kontak = Kontak::all();
        $category = Category::all();
        $sosmed = Sosmed::all();
        return view('konten.hubungi_kami',['contact'=>$kontak, 'sosmed'=>$sosmed, 'cg'=>$category]);
    }
    
    public function message(Request $request)
    {
        // dd($request->all());
        
        $message = new message;
        $message->nama = $request->nama;
        $message->email = $request->email;
        $message->subjek = $request->subjek;
        $message->telepon = $request->telepon;
        $message->pesan = $request->pesan;
        $message->tanggal = Carbon::now();;
        $message->save();
        return redirect()->back()->with('message', 'Pesan Berhasil Terkirim');
    }
    
    public function pemesanan()
    {
        $product = Product::with([
            'category'
        ])->get()->where('tampilkan', 1);
        $category =  Category::all();
        $cart = cart::all();
        $cara = cara_pemesanan::all();
        $kontak = Kontak::all();
        $sosmed = Sosmed::all();


        return view('konten.cara_pemesanan', [
            'cg' => $category,
            'product' => $product,
            'cart' => $cart,
            'contact'=>$kontak,
            'sosmed'=>$sosmed,
            'cara' => $cara          
        ]);
    }
}
