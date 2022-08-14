<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::table('users')->insert(
            array(
                'name' => Str::random(10),
                'username' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'email_verified_at' => time(),
                'designation' => 'Test User',
                'company' => 'Codebumble Inc',
                'password' => bcrypt(Str::random(10)), #codebumble_admin
                'role' => 'subscriber',
                'json_data' => '{"status":"Pending","phone_number":"+8801000000000","gender":"Male","date_of_birth":"20220420","city":"Dhaka","country":"Bangladesh (BD)","address":"Dhaka, Bangladesh"}',
                'under_ref' => 'codebumble',
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
        //
    }
};
