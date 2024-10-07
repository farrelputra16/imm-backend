<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNumberOfInvestmentsInInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investors', function (Blueprint $table) {
            // Mengubah kolom number_of_investments menjadi nullable dan default null
            $table->integer('number_of_investments')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investors', function (Blueprint $table) {
            // Mengembalikan perubahan (jika diperlukan)
            $table->integer('number_of_investments')->default(0)->change();
        });
    }
}
