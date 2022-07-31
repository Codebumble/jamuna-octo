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
        Schema::dropIfExists('codebumble_login_table');
        Schema::create('codebumble_login_table', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('ip');
            $table->string('browser')->nullable();
            $table->string('browser_full')->nullable();
            $table->string('os')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('updated_at')->nullable();
            $table->string('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
