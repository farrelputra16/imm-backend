<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people', function (Blueprint $table) {
            // Mengubah primary_job_title menjadi nullable
            $table->string('primary_job_title')->nullable()->change();

            // Mengubah primary_organization menjadi nullable dan foreign key ke tabel companies
            $table->unsignedBigInteger('primary_organization')->nullable()->change();
            $table->foreign('primary_organization')->references('id')->on('companies')->onDelete('set null');

            // Mengubah location menjadi nullable
            $table->string('location')->nullable()->change();

            // Mengubah regions menjadi nullable
            $table->string('regions')->nullable()->change();

            // Mengubah gender menjadi enum('Laki-laki', 'Perempuan'

            // Mengubah phone_number menjadi nullable
            $table->string('phone_number')->nullable()->change();

            // Mengubah gmail menjadi nullable
            $table->string('gmail')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('people', function (Blueprint $table) {
            // Mengembalikan perubahan jika migrasi dibatalkan
            $table->string('primary_job_title')->nullable(false)->change();
            $table->dropForeign(['primary_organization']);
            $table->unsignedBigInteger('primary_organization')->nullable(false)->change();
            $table->string('location')->nullable(false)->change();
            $table->string('regions')->nullable(false)->change();
            $table->string('phone_number')->nullable(false)->change();
            $table->string('gmail')->nullable(false)->change();
        });
    }
}
