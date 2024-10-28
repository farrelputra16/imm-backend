<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyFinance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_finance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            // Menambahkan kolom untuk laporan keuangan
            $table->decimal('total_pendapatan', 15, 2); // Total Pendapatan
            $table->decimal('laba_kotor', 15, 2); // Laba Kotor
            $table->decimal('laba_usaha', 15, 2); // Laba Usaha
            $table->decimal('laba_sebelum_pajak', 15, 2); // Laba Sebelum Pajak
            $table->decimal('laba_bersih_tahun_berjalan', 15, 2); // Laba Bersih Tahun Berjalan
            $table->enum('status_quarter', ['Q1', 'Q2', 'Q3', 'Q4']); // Status Q1, Q2, Q3, Q4
            $table->string('tahun');
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
        Schema::dropIfExists('company_finance');
    }
}
