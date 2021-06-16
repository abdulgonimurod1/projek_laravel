<?php

namespace App\Http\Controllers;

use App\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Kontak::all();
        return view('admin.kontak.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kontak.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $kontak = $request->all();
        Kontak::create($kontak);
        
        return redirect()->route('kontak.simpan')->with('seccess', 'Kontak berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function show(Kontak $kontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function edit(Kontak $kontak, $id)
    {
        $kontak = Kontak::find($id);
        return view('admin.kontak.edit', compact('kontak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kontak $kontak, $id)
    {

        $kontak = Kontak::find($id);

        $kontak->judul     = $request->input('judul');
        $kontak->alamat    = $request->input('alamat');
        $kontak->telepon   = $request->input('telepon');
        $kontak->email     = $request->input('email');
        $kontak->wa        = $request->input('wa'); 
        $kontak->maps      = $request->input('maps'); 
        $kontak->tampilkan = $request->input('tampilkan'); 

        $kontak->save();
        return redirect()->route('kontak.index')->with('success', 'Kontak Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontak $kontak, $id)
    {
        $kontak = Kontak::find($id);
        $kontak->delete();

        return redirect('/kontak')->with('success', 'Kontak Berhasil Dihapus');
    }
}
