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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('is_admin')->default(0);
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('ref_link')->nullable();
            $table->timestamp('last_sign_in_at')->nullable();
            $table->timestamp('last_sign_out_at')->nullable();           
            $table->mediumInteger('acBal')->default(0);
            $table->mediumInteger('doBal')->default(0);
            $table->double('acROI',9, 2)->default(0);  
            $table->double('totBal',9,2)->default(0);    
            $table->integer('percent')->default(0);
            $table->boolean('is_paused')->default(0);
            $table->enum('status',['dormant','active','earning','not_earning'])->default('dormant');          
            $table->integer('counter')->default(0);           
            $table->boolean('is_banned')->default(0);
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
        Schema::dropIfExists('users');
    }
};
