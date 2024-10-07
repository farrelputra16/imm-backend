<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNumberOfContactsInInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investors', function (Blueprint $table) {
            // Mengubah kolom number_of_contacts menjadi nullable
            $table->integer('number_of_contacts')->nullable()->change();
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
            // Mengembalikan perubahan jika perlu
            $table->integer('number_of_contacts')->nullable(false)->change();
        });
    }
}
