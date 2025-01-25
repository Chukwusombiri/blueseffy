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
        Schema::create('investment_deposits', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('amount');
            $table->boolean('is_approved')->default(0);
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('plan_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->foreignUuid('wallet_id')->nullable()->constrained()->nullOnDelete()->onUpdate('cascade');
            $table->string('receipt')->nullable();
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
        Schema::dropIfExists('investment_deposits');
    }
};
