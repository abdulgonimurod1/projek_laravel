<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Image;

class Produk extends Controller
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
        ])->get();
        return view('admin.produk.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view ('admin.produk.tambah', [
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar1'       => 'image',
            'gambar2'       => 'image',
            'gambar3'       => 'image',
            
        ]);
        
        
        if ($request->hasFile('gambar1')) {
        $gambar1 = $request->file('gambar1');
        $gambar1_name = rand() . '.' . $gambar1->getClientOriginalExtension();
        $destinationPath = public_path('images/produk');
        $img = Image::make($gambar1->path());
        
        // --------- [ Resize Image ] ---------------
        $img->resize(255, 255, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$gambar1_name);
        
        // ----------- [ Uploads Image in Original Form ] ----------
        
        $destinationPath        =        public_path('images/produk_asli');
        
        $gambar1->move($destinationPath, $gambar1_name);
        }else{
            $gambar1_name = "null";
        }
        
        if ($request->hasFile('gambar2')) {
        $gambar2 = $request->file('gambar2');
        $gambar2_name = rand() . '.' . $gambar2->getClientOriginalExtension();
        
        $destinationPath = public_path('images/produk');
        $img = Image::make($gambar2->path());
        
        // --------- [ Resize Image ] ---------------
        $img->resize(255, 255, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$gambar2_name);
        
        // ----------- [ Uploads Image in Original Form ] ----------
        
        $destinationPath        =        public_path('images/produk_asli');
        
        $gambar2->move($destinationPath, $gambar2_name);
        
        }
        else{
            $gambar2_name = "null";
        }
        if ($request->hasFile('gambar3')) {
        $gambar3 = $request->file('gambar3');
        $gambar3_name = rand() . '.' . $gambar3->getClientOriginalExtension();
        $destinationPath = public_path('images/produk');
        $img = Image::make($gambar3->path());
        
        // --------- [ Resize Image ] ---------------
        $img->resize(255, 255, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$gambar3_name);
        
        // ----------- [ Uploads Image in Original Form ] ----------
        
        $destinationPath        =        public_path('images/produk_asli');
        
        $gambar3->move($destinationPath, $gambar3_name);
        }else{
            $gambar3_name = "null";
        }
        
        

        $form_data = array(
            'nama_produk'   => $request->nama_produk,
            'deskripsi'     => $request->deskripsi,
            'stok'          => $request->stok,
            'harga'         => $request->harga,
            'link_instagram'   => $request->link_instagram,
            'link_facebook'   => $request->link_facebook,
            'link_bukalapak'   => $request->link_bukalapak,
            'link_lazada'   => $request->link_lazada,
            'link_tokopedia'=> $request->link_tokopedia,
            'link_shopee'   => $request->link_shopee,
            'id_kategori'   => $request->id_kategori,
            'tampilkan'     => $request->tampilkan,
            'gambar1'        => $gambar1_name,
            'gambar2'        => $gambar2_name,
            'gambar3'        => $gambar3_name,
            
        );
        Product::create($form_data);
        return redirect()->route('produk.simpan')->with('success','Data Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_produk)
    {
        $product = Product::with([
            'category'
        ])->get()->find($id_produk);
            
            return view('admin.produk.show', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_produk)
    {
        $category =  Category::all();
        $product = Product::find($id_produk);
        return view('admin.produk.edit', compact('product'),[
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_produk)
    {

        $image_name = $request->hidden_image1;
        $gambar1 = $request->file('gambar1');

        if($gambar1 != '')
        {
            $request->validate([

                'gambar1'       => 'image',
                'gambar2'       => 'image',
                'gambar3'       => 'image',

            ]);
            $image_name = rand() . '.' . $gambar1->getClientOriginalExtension();
            $destinationPath = public_path('images/produk');
            $img = Image::make($gambar1->path());
            
            // --------- [ Resize Image ] ---------------
            $img->resize(255, 255, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);
            
            // ----------- [ Uploads Image in Original Form ] ----------
            
            $destinationPath        =        public_path('images/produk_asli');
            
            $gambar1->move($destinationPath, $image_name);
        }

        $image_name2 = $request->hidden_image2;
        $gambar2 = $request->file('gambar2');

        if($gambar2 != '')
        {
            $request->validate([
                
                'gambar1'       => 'image',
                'gambar2'       => 'image',
                'gambar3'       => 'image',
            ]);
            $image_name2 = rand() . '.' . $gambar2->getClientOriginalExtension();
            $img = Image::make($gambar2->path());
            
            // --------- [ Resize Image ] ---------------
            $img->resize(255, 255, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name2);
            
            // ----------- [ Uploads Image in Original Form ] ----------
            
            $destinationPath        =        public_path('images/produk_asli');
            
            $gambar2->move($destinationPath, $image_name2);
        }

        $image_name3 = $request->hidden_image3;
        $gambar3 = $request->file('gambar3');
        if($gambar3 != '')
        {
            $request->validate([
                
                'gambar1'       => 'image',
                'gambar2'       => 'image',
                'gambar3'       => 'image',
                
            ]);
            $image_name3 = rand() . '.' . $gambar3->getClientOriginalExtension();
            $img = Image::make($gambar3->path());
            
            // --------- [ Resize Image ] ---------------
            $img->resize(255, 255, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name3);
            
            // ----------- [ Uploads Image in Original Form ] ----------
            
            $destinationPath        =        public_path('images/produk_asli');
            
            $gambar3->move($destinationPath, $image_name3);
        }
        

        $form_data = array(
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'link_instagram'   => $request->link_instagram,
            'link_facebook'   => $request->link_facebook,
            'link_bukalapak'   => $request->link_bukalapak,
            'link_lazada' => $request->link_lazada,
            'link_shopee' => $request->link_shopee,
            'link_tokopedia' => $request->link_tokopedia,
            'harga_diskon' => $request->harga_diskon,
            'id_kategori' => $request->id_kategori,
            'tampilkan' => $request->tampilkan,
            'jenis_produk'  => $request->jenis_produk,
            'gambar1' => $image_name,
            'gambar2' => $image_name2,
            'gambar3' => $image_name3,
        ); 
        Product::whereId_produk($id_produk)->update($form_data);
        return redirect()->route('produk.index')->with('success','Data Produk Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_produk)
    {
        $product = Product::find($id_produk);
        $product->delete();
        return redirect('/produk')->with('success','Data Produk Berhasil Dihapus');
    }
    
    public function cetak()
    {
        $product = DB::table('products')->select('nama_produk', 'dilihat', 'gambar1')->orderBy('dilihat', 'desc')->get();
        
        return view('admin.report.index', ['product' => $product]);
    }
    
    public function exportPdf(){
        $product = DB::table('products')->select('nama_produk', 'dilihat', 'gambar1')->orderBy('dilihat', 'desc')->get();
        $pdf = PDF::loadView('admin.report.view', [
            'produk' => $product
        ])->setPaper('a4', 'potrait');
        return $pdf->stream();
        /** return $pdf->download('Report-Produk.pdf'); */
    }
}
