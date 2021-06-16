<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner_promo.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner_promo.tambah');
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
        $data->move(public_path('images/banner'), $new_name);

        $form_data = array(
            'gambar' => $new_name,
            'tampilkan' => $request->tampilkan,
            'link_promo' => $request->link_promo,
        );

        Banner::create($form_data); 
        return redirect()->route('banner.simpan')->with('sukses', 'Banner Berhasil Ditambahkan');
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
    public function edit(Banner $banner, $id)
    {
        $banner = Banner::find($id);
        return view('admin.banner_promo.edit', compact('banner'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner, $id)
    {
        $image_name = $request->hidden_image;
        $gambar = $request->file('gambar');
        if($gambar != '')
        {
            $request->validate([
                'gambar'        => 'image|max:4096'
            ]);
            $image_name = rand() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/banner'), $image_name);
        }

        $form_data = array(
            'tampilkan' => $request->tampilkan,
            'gambar' => $image_name,
            'link_promo' => $request->link_promo,
        ); 
        Banner::whereId($id)->update($form_data);
        return redirect()->route('banner.index')->with('sukses', 'Banner Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return redirect('/banner')->with('sukses', 'Banner Berhasil Dihapus');
    }
}
