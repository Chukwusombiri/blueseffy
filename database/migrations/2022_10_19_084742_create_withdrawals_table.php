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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->mediumInteger('amount');
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_verified')->default(true);
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->uuid('user_wallet_id')->nullable();
            $table->foreign('user_wallet_id')->references('id')
            ->on('user_wallets')->nullOnDelete();
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
        Schema::dropIfExists('withdrawals');
    }
};
