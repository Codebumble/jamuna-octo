<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Auth;

class TestOutput extends Controller
{
    public function test_post(Request $request){
        return $request->post();
    }

    public function test_get(){
    }
}
