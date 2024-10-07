<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investor_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('project_id'); // Project yang dipilih investor
            $table->decimal('amount', 15, 2); // Jumlah investasi
            $table->date('investment_date'); // Tanggal investasi
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status investasi
            $table->string('pengirim');
            $table->string('bank_asal');
            $table->string('bank_tujuan');
            $table->string('funding_type');
            $table->string('tipe_investasi');
            $table->timestamps();
        
            // Foreign key constraints
            $table->foreign('investor_id')->references('id')->on('investors')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('investments');
    }
}
