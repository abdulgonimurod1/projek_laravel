<?php

namespace App\Http\Controllers;

use App\Sub_Category;
use App\Category;
use Illuminate\Http\Request;

class Sub_Kategori extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_category = Sub_Category::with([
            'category'
        ])->get();
        return view('admin.sub_kategori.index', compact('sub_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view ('admin.sub_kategori.tambah', [
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
            'id_kategori' => 'required',
            'sub_kategori' => 'required',
            ]);

        $data = $request->all();

        Sub_Category::create($data);
        return redirect()->route('sub_kategori.simpan')->with('success','Sub Kategori Berhasil Ditambahkan');
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
    public function edit($id_sub_kategori)
    {
        $category =  Category::all();
        $sub_kategori = Sub_Category::find($id_sub_kategori);
        return view('admin.sub_kategori.edit', compact('sub_kategori'),[
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
    public function update(Request $request, $id_sub_kategori)
    {
        $sub_category = Sub_Category::find($id_sub_kategori);

        $sub_category->id_kategori = $request->input('id_kategori');
        $sub_category->sub_kategori = $request->input('sub_kategori');

        $sub_category->save();
        return redirect()->route('sub_kategori.index')->with('success','Sub Category Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sub_kategori)
    {
        $sub_category = Sub_Category::find($id_sub_kategori);
        $sub_category->delete();
        return redirect('/produk')->with('success','Sub Category Berhasil Dihapus');
    }
}
