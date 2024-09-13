<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('profile');
            $table->string('tipe');
            $table->string('nama_pic');
            $table->string('posisi_pic');
            $table->string('telepon');
            $table->string('negara');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->integer('jumlah_karyawan');
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
        Schema::dropIfExists('companies');
    }
}
