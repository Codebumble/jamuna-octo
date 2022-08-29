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
        Schema::dropIfExists('codebumble_applicant_list');
        Schema::create('codebumble_applicant_list', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->string('email');
            $table->string('phone');
            $table->string('division')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('qualifications')->nullable();
            $table->string('experience')->nullable();
            $table->string('university')->nullable();
            $table->string('expo_salary')->nullable();
            $table->string('cv_link')->nullable();
            $table->string('json_data')->nullable();
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
        Schema::dropIfExists('codebumble_applicant_list');
    }
};
