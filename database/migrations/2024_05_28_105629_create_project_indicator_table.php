<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectIndicatorTable extends Migration
{
    public function up()
    {
        Schema::create('project_indicator', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('indicator_id')->constrained()->onDelete('cascade');
            $table->primary(['project_id', 'indicator_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_indicator');
    }
}
