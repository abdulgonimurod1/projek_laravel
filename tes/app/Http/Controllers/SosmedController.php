<?php

namespace App\Http\Controllers;

use App\Sosmed;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosmeds = Sosmed::all();
        return view('admin.sosmed.index', compact('sosmeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.sosmed.tambah');
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
        $destinationPath = public_path('images/sosmed');
        $img = Image::make($data->path());
        
        // --------- [ Resize Image ] ---------------
        $img->resize(72, 72, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$new_name);
        
        // ----------- [ Uploads Image in Original Form ] ----------
        
        $destinationPath        =        public_path('images/sosmed_asli');
        
        $data->move($destinationPath, $new_name);

        $form_data = array(
            'nama_sosmed' => $request->nama_sosmed,
            'link'     => $request->ling,
            'tampilkan'     => $request->tampilkan,
            'gambar'        => $new_name
        );

        Sosmed::create($form_data); 
        return redirect()->route('sosmed.simpan')->with('success','Sosial Media Berhasil Ditambahkan');
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
    public function edit($id)
    {
        $sosmed = Sosmed::find($id);
        return view('admin.sosmed.edit', compact('sosmed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
            $img = Image::make($gambar->path());
        
        // --------- [ Resize Image ] ---------------
        $img->resize(72, 72, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$image_name);
        
        // ----------- [ Uploads Image in Original Form ] ----------
        
        $destinationPath        =        public_path('images/sosmed_asli');
        
        $data->move($destinationPath, $image_name);
        }

        $form_data = array(
            'nama_sosmed' => $request->nama_sosmed,
            'gambar' => $image_name,
            'link' => $request->ling,
            'tampilkan' =>$request->tampilkan
        ); 
        Sosmed::whereId($id)->update($form_data);
        return redirect()->route('sosmed.index')->with('success','Sosial Media Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sosmed = Sosmed::findOrFail($id);
        $sosmed->delete();
        return redirect('/sosmed')->with('success','Sosial Media Berhasil Dihapus');
    }
}
