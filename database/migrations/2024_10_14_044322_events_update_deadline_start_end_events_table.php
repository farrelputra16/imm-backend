<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventsUpdateDeadlineStartEndEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // Drop the 'deadline' column
            $table->dropColumn('deadline');

            // Change 'start' column to 'date' type
            $table->date('start')->change();

            // Rename 'end' column to 'event_duration' and change to 'string' type
            // Pastikan kolom 'end' ada sebelum menggantinya
            if (Schema::hasColumn('events', 'end')) {
                // Rename 'end' column to 'event_duration'
                $table->renameColumn('end', 'event_duration');
            }
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
            // Add the 'deadline' column back
            $table->dateTime('deadline')->nullable();

            // Revert 'start' column back to 'dateTime' type
            $table->dateTime('start')->change();

            // Rename 'event_duration' back to 'end' and revert to 'dateTime' type
            // Pastikan kolom 'event_duration' ada sebelum menggantinya
            if (Schema::hasColumn('events', 'event_duration')) {
                // Rename 'event_duration' back to 'end'
                $table->renameColumn('event_duration', 'end');
            }

            // Ubah tipe data 'end' jika sudah ada
            if (Schema::hasColumn('events', 'end')) {
                $table->dateTime('end')->change();
            }
        });
    }
}
