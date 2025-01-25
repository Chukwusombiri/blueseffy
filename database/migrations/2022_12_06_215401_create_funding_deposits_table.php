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
        Schema::create('funding_deposits', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('amount');
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('wallet_id')->nullable()->constrained()->nullOnDelete()->onUpdate('cascade');
            $table->boolean('is_approved')->default(0);
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
        Schema::dropIfExists('funding_deposits');
    }
};
