<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Product_rest extends Controller
{
    public function add_product(Request $request){

        return json_encode($request->new);

    }

    public function edit_product(Request $request){

    }

    public function delete_product(Request $request){

    }

    public function product_slider_api(){

    }

    public function auth_add_product_page(){

        check_auth();
        check_power('employee');

        $companys = DB::table('codebumble_company_list')->select('name')->get();

        $pageConfigs = ['pageHeader' => false];
        return view('/content/products/add_products', ['pageConfigs' => $pageConfigs, 'companies' => $companys]);


    }

}
