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
        Schema::dropIfExists('codebumble_job_list');
        Schema::create('codebumble_job_list', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->string('sector');
            $table->string('b_image')->nullable();
            $table->string('a_information')->nullable();
            $table->string('age')->nullable();
            $table->string('me_req')->nullable();
            $table->string('gender')->nullable();
            $table->string('h_number')->nullable();
            $table->string('s_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('h_email')->nullable();
            $table->string('l_date')->nullable();
            $table->string('salary')->nullable();
            $table->string('min_expo')->nullable();
            $table->string('emp_type')->nullable();
            $table->string('added_by')->nullable();
            $table->string('w_location')->nullable();
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
        Schema::dropIfExists('codebumble_job_list');
    }
};
