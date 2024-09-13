<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class MigrateDataToNewMetricProjectTable extends Migration
{
    public function up()
    {
        DB::table('metric_project_old')->orderBy('project_id')->orderBy('metric_id')->chunk(100, function ($oldMetricProjects) {
            foreach ($oldMetricProjects as $oldMetricProject) {
                DB::table('metric_project')->insert([
                    'project_id' => $oldMetricProject->project_id,
                    'metric_id' => $oldMetricProject->metric_id,
                    'value' => null,
                    'report_month' => null,
                    'report_year' => null,
                    'metric_project_id' => null,
                    'created_at' => $oldMetricProject->created_at,
                    'updated_at' => $oldMetricProject->updated_at,
                ]);
            }
        });
    }

    public function down()
    {
        DB::table('metric_project')->truncate();
    }
}
