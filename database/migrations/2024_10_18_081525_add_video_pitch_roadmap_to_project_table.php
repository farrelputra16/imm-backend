<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoPitchRoadmapToProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('video_pitch')->after('jumlah_pendanaan')->nullable();
            $table->string('pitch_deck')->after('video_pitch')->nullable();
            $table->string('roadmap')->after('pitch_deck')->nullable();

            // Menghapus tanggal penyelesaian
            $table->dropColumn('tanggal_penyelesaian'); // Menghapus kolom tanggal_penyelesaian dari tabel projects
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['video_pitch', 'pitch_deck', 'roadmap']);
            $table->string('tanggal_penyelesaian')->after('roadmap')->nullable();
        });
    }
}
