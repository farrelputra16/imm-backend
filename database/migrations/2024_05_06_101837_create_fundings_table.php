<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundingsTable extends Migration
{
    public function up()
    {
        Schema::create('fundings', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            $table->decimal('jumlah', 10, 2);
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fundings');
    }
}
