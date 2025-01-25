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
        Schema::create('fiat_withdrawals', function (Blueprint $table) {           
            $table->uuid('id')->primary();
            $table->mediumInteger('amount');
            $table->boolean('is_approved')->default(0);
            $table->boolean('is_verified')->default(0);
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->bigInteger('account_no');
            $table->string('account_name');
            $table->string('bank_name');
            $table->integer('routing_no');
            $table->string('description',225);            
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
        Schema::dropIfExists('fiat_withdrawals');
    }
};
