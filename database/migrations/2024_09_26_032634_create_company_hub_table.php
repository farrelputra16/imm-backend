<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyHubTable extends Migration
{
    public function up()
    {
        Schema::create('company_hubs', function (Blueprint $table) {
            $table->unsignedBigInteger('hub_id');
            $table->unsignedBigInteger('company_id');

            $table->foreign('hub_id')->references('id')->on('hubs')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->primary(['hub_id', 'company_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_hub');
    }
}
