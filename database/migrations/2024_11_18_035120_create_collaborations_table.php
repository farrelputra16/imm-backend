<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaborationsTable extends Migration
{
    public function up()
    {
        Schema::create('collaborations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade'); // Relasi ke tabel companies
            $table->string('title');
            $table->string('image')->nullable(); // Untuk menyimpan path gambar
            $table->text('description')->nullable();
            $table->text('position'); // Menyimpan posisi dalam format teks, dipisah dengan koma
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('collaborations');
    }
}

