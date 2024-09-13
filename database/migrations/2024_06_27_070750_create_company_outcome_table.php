<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyOutcomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_outcome', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('jumlah_biaya', 15, 2);
            $table->string('keterangan');
            $table->string('bukti')->nullable();
            $table->unsignedBigInteger('project_id');
            $table->timestamps();

            // Set up the foreign key constraint
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_outcome');
    }
}
