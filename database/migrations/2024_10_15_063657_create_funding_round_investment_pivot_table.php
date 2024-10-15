<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundingRoundInvestmentPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funding_round_investment', function (Blueprint $table) {
            $table->id();

            // Foreign key to funding_rounds
            $table->foreignId('funding_round_id')
                  ->constrained('funding_rounds')
                  ->onDelete('cascade');

            // Foreign key to investments
            $table->foreignId('investment_id')
                  ->constrained('investments')
                  ->onDelete('cascade');

            // Optionally, add other columns like `amount` to store extra data
            $table->decimal('amount', 15, 2)->nullable(); // Investment amount for this round

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funding_round_investment');
    }
}
