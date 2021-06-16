<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class Kategori extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.kategori.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'gambar' => 'image'
        ]);
        $data = $request->file('gambar');

        $new_name = rand() . '.' . $data->getClientOriginalExtension();
        $data->move(public_path('images/kategori'), $new_name);

        $form_data = array(
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
            'gambar'        => $new_name
        );

        Category::create($form_data); 
        return redirect()->route('kategori.simpan')->with('success','Kategori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kategori)
    {
        $kategori = Category::find($id_kategori);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kategori)
    {
        $image_name = $request->hidden_image;
        $gambar = $request->file('gambar');
        if($gambar != '')
        {
            $request->validate([
                'gambar'        => 'image|max:4096'
            ]);
            $image_name = rand() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/kategori'), $image_name);
        }

        $form_data = array(
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $image_name
        ); 
        Category::whereId_kategori($id_kategori)->update($form_data);
        return redirect()->route('kategori.index')->with('success','Kategori Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kategori)
    {
        $kategori = Category::findOrFail($id_kategori);
        $kategori->delete();
        return redirect('/kategori')->with('success','Kategori Berhasil Dihapus');
    }
}
