<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // Add new columns
            $table->string('allowed_participants')->nullable()->after('description');
            $table->integer('expected_participants')->nullable()->after('allowed_participants');
            $table->enum('fee_type', ['Free', 'Paid'])->after('expected_participants');
            $table->string('organizer_name')->after('fee_type');
            $table->string('email')->after('organizer_name');
            $table->string('nomor_tlpn')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            // Drop new columns
            $table->dropColumn('allowed_participants');
            $table->dropColumn('expected_participants');
            $table->dropColumn('fee_type');
            $table->dropColumn('organizer_name');
            $table->dropColumn('email');
            $table->dropColumn('nomor_tlpn');
        });
    }
}
