<?php

namespace App\Http\Controllers;

use App\cara_pemesanan;
use Illuminate\Http\Request;

class CaraPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $text = cara_pemesanan::all();
        return view('admin.cara_pemesanan.index', compact('text'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cara_pemesanan.tambah');
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
            'judul' => 'required',
            'tampilkan' => 'required',
            'gambar' => 'required|image|max:4096'
        ]);

        $data = $request->file('gambar');

        $new_name = rand() . '.' . $data->getClientOriginalExtension();
        $data->move(public_path('images/cara_pemesanan'), $new_name);

        $form_data = array(
            'judul'        => $request->judul,
            'tampilkan'    => $request->tampilkan,
            'langkah1'     => $request->step1,
            'langkah2'     => $request->step2,
            'langkah3'     => $request->step3,
            'langkah4'     => $request->step4,
            'langkah5'     => $request->step5,
            'langkah6'     => $request->step6,
            'langkah7'     => $request->step7,
            'langkah8'     => $request->step8,
            'langkah9'     => $request->step9,
            'langkah10'    => $request->step10,
            'gambar'       => $new_name,
        );

        cara_pemesanan::create($form_data);

        return redirect()->route('cara_pemesanan.simpan')->with('success','Cara Pemesanan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cara_pemesanan  $cara_pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(cara_pemesanan $cara_pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cara_pemesanan  $cara_pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(cara_pemesanan $cara_pemesanan, $id)
    {
        $cara = cara_pemesanan::find($id);
        return view('admin.cara_pemesanan.edit', compact('cara'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cara_pemesanan  $cara_pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cara_pemesanan $cara_pemesanan, $id)
    {
        $image_name = $request->hidden_image;
        $gambar = $request->file('gambar');
        if($gambar != '')
        {
            $request->validate([
                'judul'     => 'required',
                'tampilkan' => 'required',
                'gambar'    => 'image|max:4096'
            ]);
            $image_name = rand() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/cara_pemesanan'), $image_name);
        }else{
            $request->validate([
                'judul'     => 'required',
                'tampilkan' => 'required',
            ]);
        }

        $form_data = array(
            'judul'        => $request->judul,
            'tampilkan'    => $request->tampilkan,
            'langkah1'     => $request->step1,
            'langkah2'     => $request->step2,
            'langkah3'     => $request->step3,
            'langkah4'     => $request->step4,
            'langkah5'     => $request->step5,
            'langkah6'     => $request->step6,
            'langkah7'     => $request->step7,
            'langkah8'     => $request->step8,
            'langkah9'     => $request->step9,
            'langkah10'    => $request->step10,
            'gambar'       => $image_name
        ); 
        cara_pemesanan::whereId($id)->update($form_data);

        return redirect()->route('cara_pemesanan.index')->with('success','Cara Pemesanan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cara_pemesanan  $cara_pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(cara_pemesanan $cara_pemesanan, $id)
    {
        $cara = cara_pemesanan::find($id);
        $cara->delete();
        return redirect('/cara_pemesanan')->with('success','Cara Pemesanan Berhasil Dihapus');
    }
}
