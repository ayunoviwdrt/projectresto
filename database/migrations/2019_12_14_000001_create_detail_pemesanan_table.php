<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('detail_pemesanan', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pemesanan_id');
        $table->unsignedBigInteger('menu_id');
        $table->integer('jumlah')->nullable();
        $table->integer('total_bayar');
        $table->timestamps();
    
        $table->foreign('pemesanan_id')->references('id')->on('pemesanan')->onDelete('cascade');
        $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
    });
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pemesanan');
    }
};
