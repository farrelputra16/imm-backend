<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFacilitiesProgramsAlumniToHubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hubs', function (Blueprint $table) {
            $table->text('facilities')->nullable()->after('user_id');
            $table->text('programs')->nullable()->after('facilities');
            $table->text('alumni')->nullable()->after('programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hubs', function (Blueprint $table) {
            $table->dropColumn(['facilities', 'programs', 'alumni']);
        });
    }
}
