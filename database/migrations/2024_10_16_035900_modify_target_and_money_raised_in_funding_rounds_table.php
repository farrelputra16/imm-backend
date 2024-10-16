<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTargetAndMoneyRaisedInFundingRoundsTable extends Migration
{
    public function up()
    {
        Schema::table('funding_rounds', function (Blueprint $table) {
            $table->integer('target')->nullable()->change(); // Mengubah target menjadi integer nullable
            $table->integer('money_raised')->nullable()->change(); // Mengubah money_raised menjadi integer nullable
        });
    }

    public function down()
    {
        Schema::table('funding_rounds', function (Blueprint $table) {
            $table->decimal('target', 15, 2)->nullable()->change(); // Mengembalikan ke tipe decimal
            $table->decimal('money_raised', 15, 2)->nullable()->change(); // Mengembalikan ke tipe decimal
        });
    }
}
