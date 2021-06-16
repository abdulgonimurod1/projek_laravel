<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id_produk');
            $table->string('nama_produk', 50);
            $table->text('deskripsi')->nullable();
            $table->string('stok', 25);
            $table->string('harga', 50);
            $table->string('harga_diskon', 50)->nullable();
            $table->string('gambar1');
            $table->string('gambar2');
            $table->string('gambar3');
            $table->integer('id_kategori');
            $table->set('tampilkan', ['ya', 'tidak'])->default('ya');
            $table->string('jenis_produk', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
