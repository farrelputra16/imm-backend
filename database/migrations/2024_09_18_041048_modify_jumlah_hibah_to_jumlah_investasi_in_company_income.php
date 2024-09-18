<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyJumlahHibahToJumlahInvestasiInCompanyIncome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_income', function (Blueprint $table) {
            // ubah nama kolum yang tadinya jumlah hibah menjadi jumlah investasi
            $table->renameColumn('jumlah_hibah', 'jumlah');
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
            // kembalikan nama kolum yang tadinya jumlah investasi menjadi jumlah hibah
            $table->renameColumn('jumlah', 'jumlah_hibah');
        });
    }
}
