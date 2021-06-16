<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaraPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cara_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->string('judul', 100);
            $table->text('langkah1')->nullable();
            $table->text('langkah2')->nullable();
            $table->text('langkah3')->nullable();
            $table->text('langkah4')->nullable();
            $table->text('langkah5')->nullable();
            $table->text('langkah6')->nullable();
            $table->text('langkah7')->nullable();
            $table->text('langkah8')->nullable();
            $table->text('langkah9')->nullable();
            $table->text('langkah10')->nullable();
            $table->set('tampilkan', ['ya', 'tidak'])->default('ya');
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
        Schema::dropIfExists('cara_pembayarans');
    }
}
