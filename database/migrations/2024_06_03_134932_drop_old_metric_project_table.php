<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropOldMetricProjectTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('metric_project_old');
    }

    public function down()
    {
        Schema::rename('metric_project', 'metric_project_old');
    }
}
