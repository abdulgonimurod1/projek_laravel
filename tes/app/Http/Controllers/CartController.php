<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;
use App\cart;
use App\cart_detail;
use App\Category;
use App\Kontak;
use App\User;
use App\Sosmed;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $product = Product::where('id', $id)->first();
        $category = Category::all();
        $kontak = Kontak::all();

        return redirect('konten.index', ['product'=>$product, 'cg'=>$category, 'contact'=>$kontak]);
    }
    
    public function cart_detail($id)
    {   
        $cart = cart::find($id);
        $product = Product::all();
        $cart_detail = cart_detail::all();
        $cart = cart::with([
            'user', 'product', 'cart_detail'
            ])->get();


        return view('admin.cart.detail', ['cart'=>$cart]);
    }
    
    public function cart()
    {
        $product = Product::all();
        $cart = cart::with([
            'user', 'product', 'cart_detail'
            ])->get();


        return view('admin.cart.index', ['cart'=>$cart]);
    }
    
    // public function hapus_cart($id)
    // {
    //     $cart = cart::find($id);
    //     $cart->delete();
    //     return redirect('/keranjang')->with('success','Cart Berhasil Dihapus');
    // }
    
    public function addtocart(Request $request, $id_produk)
    {
        // dd($request);
        $product = Product::where('id_produk', $id_produk)->first();
        $tanggal = Carbon::now();
        $kode_pesanan = mt_rand(100000, 999999);
        // cek stok
        if($request->qty > $product->stok){
            return redirect('/detail/'.$id_produk);
        }

        // cek cart
        $cek_cart = cart::where('user_id', Auth::user()->id)->where('status',0)->first();
        
        // save to cart
        if(empty($cek_cart)){    
            $cart = new cart;
            $cart->kode_pesanan = 'ORD-'.$kode_pesanan;
            $cart->user_id = Auth::user()->id;
            $cart->tanggal = $tanggal;
            $cart->total_harga = 0;
            $cart->status = 0;
            $cart->save();
        }
        
        
        $cart_baru = cart::where('user_id', Auth::user()->id)->where('status',0)->first();

        // cek cart detail
        $cek_cart_detail = cart_detail::where('id_produk', $product->id)->where('cart_id', $cart_baru->id)->first();
        if(empty($cek_cart_detail)){
            // save to cart detail
            $cart_detail = new cart_detail;
            $cart_detail->id_produk = $product->id_produk;
            $cart_detail->cart_id = $cart_baru->id;
            $cart_detail->jumlah = $request->qty;
                if($product->jenis_produk == 'promo'){
                    $cart_detail->jumlah_harga = $product->harga_diskon*$request->qty;
                }else{
                    $cart_detail->jumlah_harga = $product->harga*$request->qty;
                }
            $cart_detail->save();
        }else{
            $cart_detail = cart_detail::where('product_id', $product->id)->where('cart_id', $cart_baru->id)->first();
            $cart_detail->jumlah = $cart_detail->jumlah+$request->qty;

            // harga total baru
            $harga_total_baru = $product->harga*$request->qty;
                if($product->jenis_produk == 'promo'){
                    $cart_detail->jumlah_harga = $product->harga_diskon*$request->qty;
                }else{
                    $cart_detail->jumlah_harga = $product->harga*$request->qty;
                }
            $cart_detail->jumlah_harga = $cart_detail->jumlah_harga+$product->harga*$request->qty;
            $cart_detail->update();
        }

        // jumlah total
        $cart = cart::where('user_id', Auth::user()->id)->where('status',0)->first();
            if($product->jenis_produk == 'promo'){
                    $jumlah_harga = $product->harga_diskon*$request->qty;
                }else{
                    $jumlah_harga = $product->harga*$request->qty;
                }
        $cart->total_harga = $cart->total_harga+$jumlah_harga*$request->qty;
        $cart->update();
        
        Alert::success('Berhasil Ditambahkan ke dalam Keranjang', 'Success');
        return redirect('/cart_view');
    } 

    public function cart_view()
    {
        $cart = cart::where('user_id', Auth::user()->id)->where('status',0)->first();
        if(!empty($cart))
        {
            $cart_detail = cart_detail::where('cart_id', $cart->id)->get();
        }
        // dd($cart_detail);
        $category = Category::all();
        $kontak = Kontak::all();
        $sosmed = Sosmed::all();
        return view('konten.cart', ['cart'=> $cart, 'cart_detail'=>$cart_detail, 'cg'=>$category, 'contact'=>$kontak, 'sosmed'=>$sosmed]);
    } 

    public function delete($id)
    {
        $cart_detail = cart_detail::where('id', $id)->first();
        $cart = cart::where('id', $cart_detail->cart_id)->first();
        $cart->total_harga =  $cart->total_harga-$cart_detail->jumlah_harga;
        $cart->update();

        $cart_detail->delete();
        Alert::success('Produk Berhasil Dihapus', 'Success');
        return redirect('cart_view');
    }

    public function createorder(Request $request)
    {
        // dd($request->all());
        $id_cart = $request->cart_id;
        $cart = cart::where('id', $id_cart)->first();
        $cart->status = 1;
        $cart->update();

        $cart_detail = cart_detail::where('cart_id', $id_cart)->get();
        foreach($cart_detail as $cart_detail)
        {
            $product = Product::where('id_produk', $cart_detail->id_produk)->first();
            $product->stok = $product->stok-$cart_detail->jumlah;
            $product->update(); 
        }

        Alert::success('Berhasil membuat order', 'Success');
        return redirect('/');
    }
}
