<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrixReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrix_reports', function (Blueprint $table) {
            $table->id(); // Kolom 'id' sebagai primary key dengan auto increment
            $table->unsignedBigInteger('project_id'); // Kolom 'project_id' dengan tipe bigint unsigned
            $table->unsignedBigInteger('metric_id'); // Kolom 'metric_id' dengan tipe bigint unsigned
            $table->text('evaluation')->nullable(); // Kolom 'evaluation' dengan tipe text, nullable
            $table->text('analysis')->nullable(); // Kolom 'analysis' dengan tipe text, nullable
            $table->timestamps(); // Kolom 'created_at' dan 'updated_at'

            // Foreign key constraint untuk project_id
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade') // Menghapus laporan jika project dihapus
                ->onUpdate('restrict'); // Membatasi update pada project_id

            // Foreign key constraint untuk metric_id
            $table->foreign('metric_id')
                ->references('id')
                ->on('metrics')
                ->onDelete('cascade') // Menghapus laporan jika metric dihapus
                ->onUpdate('restrict'); // Membatasi update pada metric_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matrix_reports'); // Menghapus tabel 'matrix_reports'
    }
}

