<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFundingStageAndDescriptionToFundingRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funding_rounds', function (Blueprint $table) {
            // Menambahkan kolom funding_stage dan description
            $table->string('funding_stage')->nullable(); // Funding stage (nullable jika bisa kosong)
            $table->text('description')->nullable(); // Deskripsi tentang funding round
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funding_rounds', function (Blueprint $table) {
            // Menghapus kolom funding_stage dan description jika rollback
            $table->dropColumn('funding_stage');
            $table->dropColumn('description');
        });
    }
}
