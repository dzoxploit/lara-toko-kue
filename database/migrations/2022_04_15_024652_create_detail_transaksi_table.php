<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_detail_transaksi');
            $table->bigInteger('id_kue')->unsigned();
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->bigInteger('id_transaksi')->unsigned();
            $table->integer('jumlah_kue');
            $table->timestamp('tanggal_sudah_jadi')->nullable();
            $table->integer('total_harga')->nullable();
            $table->boolean('status_jadi');
            $table->timestamps();
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
            $table->foreign('id_kue')->references('id_kue')->on('produk')->onDelete('cascade');
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
