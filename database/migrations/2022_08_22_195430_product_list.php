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
        Schema::dropIfExists('codebumble_product_list');
        Schema::create('codebumble_product_list', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->string('image');
            $table->string('minimum_order')->nullable();
            $table->string('estimated_delivery')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('price')->nullable();
            $table->string('stock')->nullable();
            $table->longText('json_data')->nullable();
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
        Schema::dropIfExists('codebumble_product_list');
    }
};
