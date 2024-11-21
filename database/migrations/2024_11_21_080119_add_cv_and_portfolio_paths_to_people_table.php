<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCvAndPortfolioPathsToPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->string('cv_path')->nullable(); // Kolom untuk menyimpan path CV
            $table->string('portfolio_path')->nullable(); // Kolom untuk menyimpan path Portofolio
        });
    }

    public function down()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('cv_path'); // Menghapus kolom cv_path jika rollback
            $table->dropColumn('portfolio_path'); // Menghapus kolom portfolio_path jika rollback
        });
    }
}
