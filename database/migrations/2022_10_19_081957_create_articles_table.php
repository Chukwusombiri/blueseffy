<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('cover_img');
            $table->text('main_content');            
            $table->string('author');
            $table->text('author_comment');
            $table->string('author_img');            
            $table->string('sub_title');
            $table->text('sub_content'); 
            $table->unsignedBigInteger('category_id')->nullable(); 
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            $table->timestamps();

            $table->index('title');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
