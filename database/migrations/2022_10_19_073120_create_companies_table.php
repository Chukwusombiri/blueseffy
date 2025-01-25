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
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('headoffice');                      
            $table->string('email');
            $table->string('tel');
            $table->text('phrase');           
            $table->text('other_office');
            $table->string('address');
            $table->text('about_us');
            $table->text('vision');
            $table->text('mission');
            $table->string('active_accounts');
            $table->string('daily_transactions');
            $table->integer('deposits');
            $table->integer('withdrawals');           
            $table->string('certificate')->nullable();   
            $table->string('pdf')->nullable();          
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
        Schema::dropIfExists('companies');
    }
};
