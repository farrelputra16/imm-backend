<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyAmountColumnInInvestmentsTable extends Migration
{
    public function up()
    {
        Schema::table('investments', function (Blueprint $table) {
            // Mengubah kolom amount menjadi integer
            $table->integer('amount')->change();
        });
    }

    public function down()
    {
        Schema::table('investments', function (Blueprint $table) {
            // Kembalikan tipe kolom amount menjadi tipe sebelumnya (misal decimal)
            $table->decimal('amount', 15, 2)->change();
        });
    }
}
