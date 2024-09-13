<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameMetricProjectTable extends Migration
{
    public function up()
    {
        Schema::rename('metric_project', 'metric_project_old');
    }

    public function down()
    {
        Schema::rename('metric_project_old', 'metric_project');
    }
}
