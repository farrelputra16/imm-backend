<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectIdToCompanyIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_income', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->after('company_id')->nullable();

            // Set up the foreign key constraint
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_income', function (Blueprint $table) {
            // Drop foreign key constraint first
            $table->dropForeign(['project_id']);
            // Then drop the column
            $table->dropColumn('project_id');
        });
    }
}
