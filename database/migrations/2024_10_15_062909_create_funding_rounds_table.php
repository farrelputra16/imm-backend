<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundingRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funding_rounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('name');
            $table->decimal('target', 15, 2)->nullable(); // Target funding amount
            $table->date('announced_date')->nullable();  // Date the funding round was announced
            $table->decimal('money_raised', 15, 2)->default(0); // Money raised so far
            $table->boolean('lead_investor')->default(false); // If this company is the lead investor
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
        Schema::dropIfExists('funding_rounds');
    }
}
