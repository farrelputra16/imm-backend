<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCategoryIdColumnPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop the foreign key constraint first
        Schema::table('posts', function (Blueprint $table) {
            // Drop foreign key
            $table->dropForeign('posts_category_id_foreign');

            // Now drop the column
            $table->dropColumn('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Recreate the column and foreign key constraint
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            
            // Recreate foreign key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}