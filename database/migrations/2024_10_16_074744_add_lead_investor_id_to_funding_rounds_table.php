<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLeadInvestorIdToFundingRoundsTable extends Migration
{
    /**
     * Jalankan migration untuk menambahkan kolom lead_investor_id ke tabel funding_rounds.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funding_rounds', function (Blueprint $table) {
            // Menambahkan kolom lead_investor_id
            $table->unsignedBigInteger('lead_investor_id')->nullable()->after('money_raised');

            // Menambahkan foreign key untuk lead_investor_id yang mengacu ke tabel investors
            $table->foreign('lead_investor_id')->references('id')->on('investors')->onDelete('set null');
        });
    }

    /**
     * Batalkan perubahan (rollback).
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funding_rounds', function (Blueprint $table) {
            // Hapus foreign key dan kolom lead_investor_id
            $table->dropForeign(['lead_investor_id']);
            $table->dropColumn('lead_investor_id');
        });
    }
}

