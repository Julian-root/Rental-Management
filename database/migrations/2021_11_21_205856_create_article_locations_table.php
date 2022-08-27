<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_locations', function (Blueprint $table) {
            $table->foreignId('location_id')->constrained();
            $table->foreignId('article_id')->constrained();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_locations', function(Blueprint $table){
            $table->dropForeign('location_id');
            $table->dropForeign('article_id');
        });
        
        Schema::dropIfExists('article_locations');
    }
}
