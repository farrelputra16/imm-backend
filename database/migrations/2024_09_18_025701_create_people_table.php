<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key ke tabel users

            $table->string('name'); // Nama orang tersebut
            $table->enum('role', ['mentor', 'pekerja', 'konsultan']); // Role untuk people
            $table->string('primary_job_title'); // Jabatan utama
            $table->string('primary_organization'); // Organisasi atau perusahaan utama
            $table->string('location'); // Lokasi
            $table->string('regions'); // Wilayah atau regional
            $table->enum('gender', ['male', 'female', 'other']); // Gender atau jenis kelamin
            $table->string('linkedin_link')->nullable(); // Tautan LinkedIn
            $table->text('description')->nullable(); // Deskripsi orang tersebut
            $table->string('phone_number'); // Nomor telepon
            $table->string('gmail'); // Email

            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key constraint untuk menghubungkan dengan tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Hapus tabel people
        Schema::dropIfExists('people');
    }
}
