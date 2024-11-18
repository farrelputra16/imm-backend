<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaborationApplicantsTable extends Migration
{
    public function up()
    {
        Schema::create('collaboration_applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collaboration_id')->constrained('collaborations')->onDelete('cascade'); // Relasi ke tabel collaborations
            $table->foreignId('people_id')->constrained('people')->onDelete('cascade'); // Relasi ke tabel people
            $table->string('name'); // Nama applicant
            $table->string('position'); // Posisi yang dilamar
            $table->string('resume'); // Path file resume
            $table->enum('status', ['Accept', 'Reject'])->nullable(); // Status kolaborasi
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('collaboration_applicants');
    }
}
