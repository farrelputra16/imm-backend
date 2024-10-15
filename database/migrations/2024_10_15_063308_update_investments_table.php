<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investments', function (Blueprint $table) {
            // Drop the foreign key and remove the project_id column
            $table->dropForeign(['project_id']);
            $table->dropColumn('project_id');

            // Add funding_round_id column
            $table->foreignId('funding_round_id')
                  ->nullable()
                  ->constrained('funding_rounds')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investments', function (Blueprint $table) {
            // Add back project_id and remove funding_round_id
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->dropForeign(['funding_round_id']);
            $table->dropColumn('funding_round_id');
        });
    }
}
