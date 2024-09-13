<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationCodesTable extends Migration
{
    public function up()
    {
        Schema::create('verification_codes', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('telepon');
            $table->string('code');
            $table->timestamp('expires_at');
            $table->timestamps(); // This adds the created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('verification_codes');
    }
}
