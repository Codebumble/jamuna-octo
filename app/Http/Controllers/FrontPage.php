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
}
