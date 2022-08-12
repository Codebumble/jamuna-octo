<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Validator;
use File;
use DB;

class FrontPage extends Controller
{
    public function slider_view(){
        $data_get = DB::select('select value from codebumble_front_page where code_name=?',['sliders_data']);

        return $data_get[0]->value;

    }

    public function chairpersson_speech(){
        $data_get = DB::select('select value from codebumble_front_page where code_name=?',['chairpersson_speech']);

        return $data_get[0]->value;

    }

    public function all_company_view(){
        $data_get = DB::select('select * from codebumble_company_list');

        $all_data = [];

        foreach( $data_get as $datam){
            $b = json_decode($datam->json_data);
            $a = [
                'imgSrc' => '/company-images/'.$datam->image,
                'alt' => $datam->name,
                'title' => $datam->name,
                'webLink' => $b->website,
                'linkText' => 'View Details'
            ];

            array_push($all_data,$a);
        }

        $data_get_b = DB::select('select value from codebumble_front_page where code_name=?',['company_slider_title']);


        return json_encode(['images' => $all_data, 'galary_data' => json_decode($data_get_b[0]->value)]);

    }

    public function shortBrief(){
        $data_get = DB::select('select value from codebumble_front_page where code_name=?',['shortBrief']);

        return $data_get[0]->value;

    }

    public function footer_component(){
        $data_get = DB::select('select value from codebumble_general where code_name=?',['social_media']);
        $data_get_name = DB::select('select value from codebumble_general where code_name=?',['site_name']);
        $data_get_moto = DB::select('select value from codebumble_general where code_name=?',['site_moto']);

        return json_encode(['social_media' => json_decode($data_get[0]->value), 'footer_about' => ['heading' => $data_get_name[0]->value, 'description' => $data_get_moto[0]->value]]);

    }
}
