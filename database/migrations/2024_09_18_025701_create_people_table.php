<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['mentor', 'pekerja', 'konsultan']);
            $table->string('primary_job_title');
            $table->string('primary_organization');
            $table->string('location');
            $table->string('regions');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('linkedin_link')->nullable();
            $table->text('description')->nullable();
            $table->string('phone_number');
            $table->string('gmail');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('people');
    }
}
