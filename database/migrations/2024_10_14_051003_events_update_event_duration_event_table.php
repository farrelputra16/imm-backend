<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventsUpdateEventDurationEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // Ubah tipe data 'event_duration' jika sudah ada
            if (Schema::hasColumn('events', 'event_duration')) {
                $table->string('event_duration')->change();
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
        // Ubah tipe data 'event_duration' jika sudah ada
        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'event_duration')) {
                $table->dateTime('event_duration')->change();
            }
        });
    }
}
