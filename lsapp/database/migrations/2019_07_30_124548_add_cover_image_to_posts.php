<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoverImageToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // This adds a column named cover_image with a data type of string
        Schema::table('posts', function (Blueprint $table) {
            $table->string('cover_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // This will delete the column cover_image when the 
        // php artisan migrate:rollback
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('cover_image');
        });p
    }
}
