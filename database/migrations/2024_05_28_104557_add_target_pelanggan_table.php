<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTargetPelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target_pelanggans', function (Blueprint $table) {
            $table->string('deskripsi_pelanggan')->nullable()->after('rentang_usia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('target_pelanggans', function (Blueprint $table) {
            $table->dropColumn('deskripsi_pelanggan');
        });
    }
}
