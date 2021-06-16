<?php

namespace App\Http\Controllers;

use App\Owner;
use App\Top_Product;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::all();
        return view('admin.owner.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.owner.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->file('gambar');

        $new_name = rand() . '.' . $data->getClientOriginalExtension();
        $data->move(public_path('images/Owner'), $new_name);

        $form_data = array(
            'owner' => $request->owner,
            'deskripsi'     => $request->deskripsi,
            'tanpilkan'     => $request->tampilkan,
            'gambar'        => $new_name
        );

        Owner::create($form_data); 
        return redirect()->route('owner.index')->with('success', 'Owner Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner, $id)
    {
        $owners = Owner::find($id);
        return view('admin.owner.edit', compact('owners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner, $id)
    {
        $image_name = $request->hidden_image;
        $gambar = $request->file('gambar');
        if($gambar != '')
        {
            $image_name = rand() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/Owner'), $image_name);
        }

        $form_data = array(
            'owner' => $request->owner,
            'deskripsi' => $request->deskripsi,
            'tampilkan' => $request->tampilkan,
            'gambar' => $image_name
        ); 
        Owner::whereId($id)->update($form_data);
        return redirect()->route('owner.index')->with('success', 'Data Owner Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner, $id)
    {
        $owner = Owner::find($id);
        $owner->delete();

        return redirect('/owner')->with('success', 'Data Owner Berhasil Dihapus');
    }
}
