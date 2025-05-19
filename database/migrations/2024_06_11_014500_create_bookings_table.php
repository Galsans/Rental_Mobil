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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_unik', 5)->unique();
            $table->string('name');
            $table->string('email');
            $table->string('no_wa');
            $table->bigInteger('nik');
            $table->string('ktp');
            $table->text('alamat');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->enum('status_payment', ['sudah bayar', 'belum bayar'])->default('belum bayar');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('kendaraan_id')->references('id')->on('kendaraans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
