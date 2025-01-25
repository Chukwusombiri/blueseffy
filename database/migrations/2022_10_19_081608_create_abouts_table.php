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
        Schema::create('abouts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('about_title');
            $table->text('about_body');
            $table->text('about_list');
            $table->string('entry_image');
            $table->text('vision_body');
            $table->string('vision_img');
            $table->text('closing_title');
            $table->text('closing_body');
            $table->string('closing_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
};
