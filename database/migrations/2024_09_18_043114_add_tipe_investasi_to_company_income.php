<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipeInvestasiToCompanyIncome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_income', function (Blueprint $table) {
            /**
             * Funding type ini bisa berupa pre_seed Funding
             * Seed Funding
             * Series A Funding
             * Series B Funding
             * Series C Funding
             * Series D Funding
             * Series E Funding
             * Debt Funding
             * Equity Funding
             * Convertible Debt
             * Grants
             * Revenue-Based Financing
             * Private Equity
             * Initial Public Offering (IPO)
             */
            $table->string('funding_type')->nullable()->after('jumlah_hibah');
            /**
             * Tipe investasi ini bisa berupa
             * Venture Capital
             * Angel Investment
             * Crowdfunding
             * Government Grant
             * Foundation Grant
             * Buyout
             * Growth Capital
             */
            $table->string('tipe_investasi')->nullable()->after('funding_type');
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
            $table->dropColumn('tipe_investasi');
            $table->dropColumn('funding_type');
        });
    }
}
