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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->timestamp('tgl_pesan');
            $table->timestamp('tgl_diambil')->nullable();
            $table->integer('total_harga');
            $table->integer('total_dibayar')->nullable();
            $table->boolean('status_transaksi');
            $table->timestamps();
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
