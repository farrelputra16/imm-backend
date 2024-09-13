<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameProjectIdColumnTargetPelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target_pelanggans', function (Blueprint $table) {
            $table->renameColumn('projects_id', 'project_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('target_pelanggans', function (Blueprint $table) {
            $table->renameColumn('project_id', 'projects_id');
        });
    }
}
