<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('Index');

Route::get('/shop_page', 'HomeController@shop_page')->name('shop_page');

Route::get('/tentang_kami', 'HomeController@tentang_kami');

Route::get('hubungi_kami', 'HomeController@hubungi_kami');

Route::get('cara_pesan', 'HomeController@pemesanan');

Route::post('buat_penawaran','HomeController@buat_penawaran')->name('buat_penawaran');

Route::post('message','HomeController@message')->name('message');

Route::post('/buatpenawaran','CartController@createorder');

Route::get('/search', 'HomeController@search')->name('search');
Route::get('/search_kategori/{id_kategori}', 'HomeController@search_kategori')->name('search_kategori');

Route::get('/detail/{id_produk}', 'HomeController@detail');
Route::get('cart/{id}', 'CartController@index')->name('cart');
Route::post('addtocart/{id_produk}','CartController@addtocart');
Route::get('cart_view', 'CartController@cart_view')->name('cart_view');
Route::delete('cart_view/{id}', 'CartController@delete');

Route::get('/login', 'LoginController@getLogin' )->name('login');
Route::post('/login', 'LoginController@postLogin')->name('sukses');
Route::get('/registrasi', 'LoginController@getRegister')->name('registrasi');
Route::post('/registrasi', 'LoginController@postRegister')->name('register');


// Logout
Route::get('/logout', 'LoginController@logout')->middleware('auth')->name('logout');


//  Bagian Admin
Route::group(['middleware' => ['auth', 'admin:admin']], function () {
    Route::get('dashboard', 'AdminController@index');
    
    // Pengunjung
    Route::get('pengunjung', 'AdminController@pengunjung')->name('pengunjung');

    //user
    Route::get('user', 'UserController@index')->name('user.index');
    Route::get('user/hapus/{id}', 'UserController@destroy');
    Route::get('user/edit/{id}', 'UserController@edit');
    Route::patch('/user/edit/{id}', 'UserController@update');

    // Cara Pemesanan
    Route::get('cara_pemesanan', 'CaraPemesananController@index')->name('cara_pemesanan.index');
    Route::get('cara_pemesanan/tambah', 'CaraPemesananController@create')->name('cara_pemesanan.tambah');
    Route::post('cara_pemesanan', 'CaraPemesananController@store')->name('cara_pemesanan.simpan');
    Route::get('cara_pemesanan/hapus/{id}', 'CaraPemesananController@destroy');
    Route::get('cara_pemesanan/edit/{id}', 'CaraPemesananController@edit');
    Route::patch('/cara_pemesanan/edit/{id}', 'CaraPemesananController@update');

    // Penawaran
    Route::get('penawaran', 'PenawaranController@index')->name('penawaran.index');

    // Cetak
    Route::get('report', 'Produk@cetak');
    Route::get('report/exportPdf', 'Produk@exportPdf')->name('produk.cetak');
    
    // Kategori
    Route::get('kategori', 'Kategori@index')->name('kategori.index');
    Route::post('kategori', 'Kategori@store')->name('kategori.simpan');
    Route::get('kategori/hapus/{id_kategori}', 'Kategori@destroy');
    Route::get('kategori/edit/{id_kategori}', 'Kategori@edit');
    Route::patch('/kategori/edit/{id_kategori}', 'Kategori@update');

    // Slider
    Route::get('slider', 'SliderController@index')->name('slider.index');
    Route::get('slider/tambah', 'SliderController@create')->name('slider.tambah');
    Route::post('slider', 'SliderController@store')->name('slider.simpan');
    Route::get('slider/hapus/{id}', 'SliderController@destroy');
    Route::get('slider/edit/{id}', 'SliderController@edit');
    Route::patch('/slider/edit/{id}', 'SliderController@update');
    
    // Banner
    Route::get('banner', 'BannerController@index')->name('banner.index');
    Route::get('banner/tambah', 'BannerController@create')->name('banner.tambah');
    Route::post('banner', 'BannerController@store')->name('banner.simpan');
    Route::get('banner/hapus/{id}', 'BannerController@destroy');
    Route::get('banner/edit/{id}', 'BannerController@edit');
    Route::patch('/banner/edit/{id}', 'BannerController@update');
   
    // Kontak
    Route::get('kontak', 'KontakController@index')->name('kontak.index');
    Route::get('kontak/tambah', 'KontakController@create')->name('kontak.tambah');
    Route::post('kontak', 'KontakController@store')->name('kontak.simpan');
    Route::get('kontak/hapus/{id}', 'KontakController@destroy');
    Route::get('kontak/edit/{id}', 'KontakController@edit');
    Route::patch('/kontak/edit/{id}', 'KontakController@update');
   
   // Sosial Media
    Route::get('sosmed', 'SosmedController@index')->name('sosmed.index');
    Route::get('sosmed/tambah', 'SosmedController@create')->name('sosmed.tambah');
    Route::post('sosmed', 'SosmedController@store')->name('sosmed.simpan');
    Route::get('sosmed/hapus/{id}', 'SosmedController@destroy');
    Route::get('sosmed/edit/{id}', 'SosmedController@edit');
    Route::patch('/sosmed/edit/{id}', 'SosmedController@update');
   
    // Owner
    Route::get('owner', 'OwnerController@index')->name('owner.index');
    Route::get('owner/tambah', 'OwnerController@create')->name('owner.tambah');
    Route::post('owner', 'OwnerController@store')->name('owner.simpan');
    Route::get('owner/hapus/{id}', 'OwnerController@destroy');
    Route::get('owner/edit/{id}', 'OwnerController@edit');
    Route::patch('/owner/edit/{id}', 'OwnerController@update');

    // Produk
    Route::get('produk', 'Produk@index')->name('produk.index');
    Route::get('produk/tambah', 'Produk@create')->name('produk.tambah');
    Route::post('produk', 'Produk@store')->name('produk.simpan');
    Route::get('produk/detail/{id_produk}', 'Produk@show');
    Route::get('produk/hapus/{id_produk}', 'Produk@destroy');
    Route::get('produk/edit/{id_produk}', 'Produk@edit');
    Route::patch('/produk/edit/{id_produk}', 'Produk@update');

    // Sub Kategori
    Route::get('sub_kategori', 'Sub_Kategori@index')->name('sub_kategori.index');
    Route::get('sub_kategori/tambah', 'Sub_Kategori@create')->name('sub_kategori.tambah');
    Route::post('sub_kategori', 'Sub_Kategori@store')->name('sub_kategori.simpan');
    Route::get('sub_kategori/hapus/{id_sub_kategori}', 'Sub_Kategori@destroy');
    Route::get('sub_kategori/edit/{id_sub_kategori}', 'Sub_Kategori@edit');
    Route::patch('/sub_kategori/edit/{id_sub_kategori}', 'Sub_Kategori@update');

    // About Us
    Route::get('about_us', 'AboutUsController@index')->name('about_us.index');
    Route::get('about_us/tambah', 'AboutUsController@create')->name('about_us.tambah');
    Route::post('about_us', 'AboutUsController@store')->name('about_us.simpan');
    Route::get('about_us/hapus/{id}', 'AboutUsController@destroy');
    Route::get('about_us/edit/{id}', 'AboutUsController@edit');
    Route::patch('/about_us/edit/{id}', 'AboutUsController@update');

    // // Cart
    // Route::get('order', 'CartController@cart')->name('admin.cart');
    // Route::get('order_detail', 'CartController@cart_detail')->name('admin.cart_detail');
    // Route::get('order/edit/{id}', 'CartController@edit');
    // Route::patch('/order/edit/{id}', 'CartController@update');

    // // Order
    // Route::get('order', 'OrderController@index')->name('order.index');
    // Route::get('order/tambah', 'OrderController@create')->name('order.tambah');
    // Route::post('order', 'OrderController@store')->name('order.simpan');
    // Route::get('order/hapus/{order_id}', 'OrderController@destroy');
    // Route::get('order/edit/{order_id}', 'OrderController@edit');
    // Route::patch('/order/edit/{order_id}', 'OrderController@update');

    // // Order Detail
    // Route::get('order_detail', 'OrderDetailController@index')->name('order_detail.index');
    // Route::get('order_detail/tambah', 'OrderDetailController@create')->name('order_detail.tambah');
    // Route::post('order_detail', 'OrderDetailController@store')->name('order_detail.simpan');
    // Route::get('order_detail/hapus/{order_id}', 'OrderDetailController@destroy');
    // Route::get('order_detail/edit/{order_id}', 'OrderDetailController@edit');
    // Route::patch('/order_detail/edit/{order_id}', 'OrderDetailController@update');

    
   


});
