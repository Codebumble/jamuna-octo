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
        Schema::dropIfExists('codebumble_front_page');
        Schema::create('codebumble_front_page', function (Blueprint $table) {
            $table->id();
            $table->string('code_name');
            $table->text('value');
            $table->string('updated_at')->nullable();
            $table->string('created_at')->nullable();
        });

        DB::table('codebumble_front_page')->insert(
            array(
                'code_name' => 'sliders_data',
                'value' => '[{"src":"/frontend/images/slider/2.jpg","alt":"logo","heading":"demo text","description":"something","buttonText":"button","button":true,"buttonAlt":false,"link":"google.com","showDescription":true,"showButton":true,"overlay":true},{"src":"/frontend/images/slider/3.jpg","alt":"logo","heading":"overlay, button, description disabled here","description":"something","buttonText":"button","button":false,"buttonAlt":true,"link":"google.com","showDescription":false,"showButton":false,"overlay":false},{"src":"/frontend/images/slider/4.jpg","alt":"logo","heading":"demo text","description":"something","buttonText":"button","button":false,"buttonAlt":true,"link":"google.com","showDescription":true,"showButton":true,"overlay":true}]',
                'updated_at' => time(),
                'created_at' => time()
            )
        );

        DB::table('codebumble_front_page')->insert(
            array(
                'code_name' => 'chairpersson_speech',
                'value' => '{"imgSrc":"/frontend/images/contents/banner.jpg","imgAlt":"meaw","title":"What our Chairperson Said","description":"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut in vitae quibusdam culpa. Non veniam perspiciatis numquam sunt itaque. Dolorem velit at voluptatibus optio praesentium. Velit, natus deleniti. Commodi neque impedit cupiditate odio excepturi consequuntur molestiae harum corporis, quas ullam, eius vel inventore modi velit ea quia? Perspiciatis distinctio laudantium, sed voluptas placeat excepturi obcaecati necessitatibus saepe deleniti, dolores ut?","linkText":"Read More","link":"#","linkVisibility":true}',
                'updated_at' => time(),
                'created_at' => time()
            )
        );

        DB::table('codebumble_front_page')->insert(
            array(
                'code_name' => 'company_slider_title',
                'value' => '{"title":"Our Group Companies","description":"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit dolorem, nemo maiores debitis quod distinctio repellendus. Dolore ipsam veritatis voluptas.","descVisibility":true}',
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
        Schema::dropIfExists('codebumble_front_page');
    }
};
