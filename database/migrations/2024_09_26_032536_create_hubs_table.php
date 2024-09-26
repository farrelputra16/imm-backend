<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHubsTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Nama hub
            $table->string('provinsi', 255);  // Provinsi hub
            $table->string('kota', 255);  // Kota hub
            $table->integer('rank');  // Ranking hub
            $table->string('top_investor_types')->nullable();  // Tipe investor teratas
            $table->string('top_funding_types')->nullable();  // Tipe pendanaan teratas
            $table->text('description')->nullable();  // Deskripsi hub
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hubs');
    }
}
