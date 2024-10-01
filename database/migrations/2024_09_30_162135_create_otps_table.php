<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otps', function (Blueprint $table) {
            $table->id(); // Kolom 'id' dengan AUTO_INCREMENT
            $table->string('identifier', 255); // Kolom 'identifier'
            $table->string('token', 255); // Kolom 'token'
            $table->integer('validity'); // Kolom 'validity'
            $table->tinyInteger('valid')->default(1); // Kolom 'valid' dengan default 1
            $table->timestamps(); // Kolom 'created_at' dan 'updated_at'
            
            // Tambahkan index jika perlu
            $table->index('identifier'); // Menambahkan index untuk kolom 'identifier'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otps');
    }
}
