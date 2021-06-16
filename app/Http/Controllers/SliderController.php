<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slide.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.tambah');
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
        $destinationPath = public_path('images/slider');
        $img = Image::make($data->path());
        
        // --------- [ Resize Image ] ---------------
        $img->resize(1920, 790, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$new_name);
        
        // ----------- [ Uploads Image in Original Form ] ----------
        
        $destinationPath        =        public_path('images/slider_asli');
        
        $data->move($destinationPath, $new_name);

        $form_data = array(
            'gambar' => $new_name,
            'tampilkan' => $request->tampilkan
        );

        Slider::create($form_data); 
        return redirect()->route('slider.simpan')->with('sukses', 'Slider Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider, $id)
    {
        $sliders = Slider::find($id);
        return view('admin.slide.edit', compact('sliders'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider, $id)
    {
        $image_name = $request->hidden_image;
        $gambar = $request->file('gambar');
        if($gambar != '')
        {
            $request->validate([
                'tampilkan'     => 'required',
                'gambar'        => 'image|max:4096'
            ]);
            $image_name = rand() . '.' . $gambar->getClientOriginalExtension();
             $destinationPath = public_path('images/slider');
            $img = Image::make($gambar->path());
            
            // --------- [ Resize Image ] ---------------
            $img->resize(1920, 790, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);
            
            // ----------- [ Uploads Image in Original Form ] ----------
            
            $destinationPath        =        public_path('images/slider_asli');
            
            $gambar->move($destinationPath, $image_name);
        }else{
            $request->validate([
                'tampilkan'     => 'required',
            ]);
        }

        $form_data = array(
            'tampilkan' => $request->tampilkan,
            'gambar' => $image_name
        ); 
        Slider::whereId($id)->update($form_data);
        return redirect()->route('slider.index')->with('sukses', 'Slider Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect('/slider')->with('sukses', 'Slider Berhasil Dihapus');
    }
}
