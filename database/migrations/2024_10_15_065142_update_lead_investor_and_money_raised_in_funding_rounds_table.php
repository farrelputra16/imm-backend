<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLeadInvestorAndMoneyRaisedInFundingRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funding_rounds', function (Blueprint $table) {
            // Ubah kolom lead_investor dari boolean menjadi string yang nullable
            $table->string('lead_investor')->nullable()->change();

            // Ubah kolom money_raised menjadi nullable
            $table->decimal('money_raised', 15, 2)->nullable()->change();
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
            // Ubah kembali lead_investor menjadi boolean
            $table->boolean('lead_investor')->default(false)->change();

            // Ubah kembali money_raised menjadi tidak nullable
            $table->decimal('money_raised', 15, 2)->default(0)->change();
        });
    }
}
