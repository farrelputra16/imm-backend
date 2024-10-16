<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveLeadInvestorFromFundingRoundsTable extends Migration
{
    /**
     * Jalankan migration untuk menghapus kolom lead_investor.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funding_rounds', function (Blueprint $table) {
            if (Schema::hasColumn('funding_rounds', 'lead_investor')) {
                $table->dropColumn('lead_investor'); // Menghapus kolom lead_investor
            }
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
            $table->string('lead_investor')->nullable(); // Menambahkan kembali kolom lead_investor jika di-rollback
        });
    }
}

