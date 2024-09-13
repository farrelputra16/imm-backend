<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_income', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('pengirim');
            $table->string('bank_asal');
            $table->string('bank_tujuan');
            $table->decimal('jumlah_hibah', 15, 2);
            $table->unsignedBigInteger('company_id');
            $table->timestamps();

            // Set up the foreign key constraint
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_income');
    }
}
