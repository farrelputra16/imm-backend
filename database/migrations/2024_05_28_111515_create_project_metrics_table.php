<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMetricsTable extends Migration
{
    public function up()
    {
        Schema::create('metric_project', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('metric_id')->constrained()->onDelete('cascade');
            $table->primary(['project_id', 'metric_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('metric_project');
    }
}
