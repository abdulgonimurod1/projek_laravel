<?php

namespace App\Http\Controllers;

use App\About_Us;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_us = About_Us::all();
        return view('admin.about_us.index', compact('about_us'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $about_us = About_Us::all();
        return view ('admin.about_us.tambah', compact('about_us'));
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
            'gambar' => 'image',
        ]);

        if ($request->hasFile('gambar1')) {
        $data = $request->file('gambar');

        $new_name = rand() . '.' . $data->getClientOriginalExtension();
        $data->move(public_path('images/Tentang_Kami'), $new_name);
        }else{
            $new_name = "null";
        }
        $form_data = array(
            'deskripsi'     => $request->deskripsi,
            'tampilkan'     => $request->tampilkan,
            'gambar'        => $new_name
        );

        About_Us::create($form_data);
        return redirect()->route('about_us.simpan')->with('success','About Us Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About_Us  $about_Us
     * @return \Illuminate\Http\Response
     */
    public function show(About_Us $about_Us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About_Us  $about_Us
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about_us = About_Us::find($id);
        return view('admin.about_us.edit', compact('about_us'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About_Us  $about_Us
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $gambar = $request->file('gambar');
        if($gambar != '')
        {
            $request->validate([
                'gambar'        => 'image'
            ]);
            $image_name = rand() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/Tentang_Kami'), $image_name);
        }

        $form_data = array(
            'deskripsi' => $request->deskripsi,
            'gambar'    => $image_name,
            'tampilkan' => $request->tampilkan
        ); 
        About_Us::whereId($id)->update($form_data);
        return redirect()->route('about_us.index')->with('success','About Us Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About_Us  $about_Us
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about_us = About_Us::find($id);
        $about_us->delete();
        return redirect('/about_us')->with('success','About Us Berhasil Dihapus');
    }
}
