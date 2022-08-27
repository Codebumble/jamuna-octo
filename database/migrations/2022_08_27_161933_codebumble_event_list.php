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
        Schema::dropIfExists('codebumble_event_list');
        Schema::create('codebumble_event_list', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('category')->nullable();
            $table->string('time_data')->nullable();
            $table->longText('detail')->nullable();
            $table->string('json_data')->nullable();
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
        Schema::dropIfExists('codebumble_event_list');
    }
};
