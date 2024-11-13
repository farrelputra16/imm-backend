<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkillsToPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->string('skills')->nullable()->after('gmail');
            // Menambahkan FULLTEXT INDEX pada kolom 'skills'
            $table->fullText('skills');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('people', function (Blueprint $table) {
            // Menghapus FULLTEXT INDEX
            $table->dropFullText('skills');

            // Menghapus kolom 'skills'
            $table->dropColumn('skills');
        });
    }
}
