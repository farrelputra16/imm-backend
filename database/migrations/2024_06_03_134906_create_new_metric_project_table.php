<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewMetricProjectTable extends Migration
{
    public function up()
    {
        Schema::create('metric_project', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade')->index()->name('fk_metric_project_project_id');
            $table->foreignId('metric_id')->constrained('metrics')->onDelete('cascade')->index()->name('fk_metric_project_metric_id');
            $table->string('value')->nullable();
            $table->integer('report_month')->nullable();
            $table->integer('report_year')->nullable();
            $table->foreignId('metric_project_id')->nullable()->constrained('metric_project')->onDelete('cascade')->index()->name('fk_metric_project_metric_project_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('metric_project');
    }
}
