<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeRentangUsiaNullableInTargetPelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target_pelanggans', function (Blueprint $table) {
            $table->string('rentang_usia')->nullable()->change();
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
            $table->string('rentang_usia')->nullable(false)->change();
        });
    }
}
