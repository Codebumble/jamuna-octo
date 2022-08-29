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
        Schema::dropIfExists('codebumble_company_list');
        Schema::create('codebumble_company_list', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('section')->nullable();
            $table->longText('description')->nullable();
            $table->string('establish_date')->nullable();
            $table->string('products')->nullable();
            $table->string('production-cap')->nullable();
            $table->string('manpower')->nullable();
            $table->longText('json_data')->nullable();
            $table->string('image')->nullable();
            $table->string('short_details')->nullable();
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
