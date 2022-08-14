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
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('email_verified_at')->nullable();
            $table->string('designation');
            $table->string('company')->nullable();
            $table->string('password');
            $table->string('role');
            $table->string('avatar')->nullable();
            $table->text('json_data');
            $table->string('under_ref')->nullable();
            $table->rememberToken();
            $table->string('updated_at')->nullable();
            $table->string('created_at')->nullable();
        });

        DB::table('users')->insert(
            array(
                'name' => 'Shakil Ahmed',
                'username' => 'codebumble',
                'email' => 'codebumble@gmail.com',
                'email_verified_at' => time(),
                'designation' => 'IT Head',
                'company' => 'Codebumble Inc',
                'password' => '$2a$12$f.nGEpISk41Imi/Zgw.RR.TMBbxOVPIO.r2ZB6f/t2j5C2WXW9ATu', #codebumble_admin
                'role' => 'admin',
                'json_data' => '{"status":"Active","phone_number":"+8801000000000","gender":"Male","date_of_birth":"20220420","city":"Dhaka","country":"Bangladesh (BD)","address":"Dhaka, Bangladesh"}',
                'under_ref' => 'init',
                'updated_at' => time(),
                'created_at' => time()
            )
        );
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