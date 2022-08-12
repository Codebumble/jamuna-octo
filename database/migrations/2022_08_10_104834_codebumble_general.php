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
        Schema::dropIfExists('codebumble_general');
        Schema::create('codebumble_general', function (Blueprint $table) {
            $table->id();
            $table->string('code_name');
            $table->longText('value');
            $table->string('updated_at')->nullable();
            $table->string('created_at')->nullable();
        });

        DB::table('codebumble_general')->insert(
            array(
                'code_name' => 'site_name',
                'value' => env('APP_NAME'),
                'updated_at' => time(),
                'created_at' => time()
            )
        );

        DB::table('codebumble_general')->insert(
            array(
                'code_name' => 'sections',
                'value' => '[{"name":"Media & Advertisement","description":"Demo Section Add Media & Advertisement"},{"name":"Marketplace","description":"Demo MarketPlace"},{"name":"Demo","description":"Demo Discription"}]',
                'updated_at' => time(),
                'created_at' => time()
            )
        );

        DB::table('codebumble_general')->insert(
            array(
                'code_name' => 'social_media',
                'value' => '{"facebook":"https://facebook.com","instagram":"https://instagram.com","youtube":"https://youtube.com","linkedin":"https://linkedin.com"}',
                'updated_at' => time(),
                'created_at' => time()
            )
        );

        DB::table('codebumble_general')->insert(
            array(
                'code_name' => 'site_moto',
                'value' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae id dolor voluptas obcaecati.',
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
        Schema::dropIfExists('codebumble_general');
    }
};
