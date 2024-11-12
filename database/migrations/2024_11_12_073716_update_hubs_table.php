<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hubs', function (Blueprint $table) {
            // Drop columns
            $table->dropColumn(['top_investor_types', 'top_funding_types']);

            // Add new columns (all nullable)
            $table->string('type_of_service')->nullable();
            $table->text('purpose')->nullable();
            $table->enum('target_scale', ['local', 'national', 'international'])->nullable();
            $table->string('location_size')->nullable();
            $table->string('operating_hours')->nullable();
            $table->text('market_and_promotion_plan')->nullable();
            $table->string('target_participant')->nullable();
            $table->integer('estimated_user')->nullable();
            $table->text('benefit')->nullable();
            $table->decimal('estimated_setup_cost', 15, 2)->nullable();
            $table->text('funding_sources')->nullable();

            // Add foreign key for Investor table
            $table->unsignedBigInteger('investor_id')->nullable();
            $table->foreign('investor_id')->references('id')->on('investors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hubs', function (Blueprint $table) {
            // Revert foreign key and drop the new columns
            $table->dropForeign(['investor_id']);
            $table->dropColumn([
                'type_of_service', 'purpose', 'target_scale', 'location_size',
                'operating_hours', 'market_and_promotion_plan', 'target_participant',
                'estimated_user', 'benefit', 'estimated_setup_cost', 'funding_sources',
                'investor_id'
            ]);

            // Re-add dropped columns
            $table->string('top_investor_types')->nullable();
            $table->string('top_funding_types')->nullable();
        });
    }
}
