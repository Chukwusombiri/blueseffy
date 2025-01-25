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
        Schema::create('referral_incomes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('amount');
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            $table->uuid('downline_id')->nullable();
            $table->foreign('downline_id')->references('id')->on('users')->nullOnDelete();
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
        Schema::dropIfExists('referral_incomes');
    }
};
