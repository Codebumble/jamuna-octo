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
        Schema::dropIfExists('codebumble_user_report_list');
        Schema::create('codebumble_user_report_list', function (Blueprint $table) {
            $table->id();
            $table->string('from_user');
            $table->string('from_email');
            $table->string('to_user');
            $table->string('status');
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
        Schema::dropIfExists('codebumble_user_report_list');
    }
};
