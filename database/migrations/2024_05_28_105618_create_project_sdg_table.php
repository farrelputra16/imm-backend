<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectSdgTable extends Migration
{
    public function up()
    {
        Schema::create('project_sdg', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('sdg_id')->constrained()->onDelete('cascade');
            $table->primary(['project_id', 'sdg_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_sdg');
    }
}
