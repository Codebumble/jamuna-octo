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

        check_auth();
        check_power('employee');

        $new = $request->new;

        foreach ($new as $key => $value) {

            $file2 = $request->file('new.'.$key.'.image') ;
            $fileName2 = time().'-'.$value['name'].'-product-images.'.$file2->getClientOriginalExtension() ;
            $destinationPath2 = public_path().'/images/product-image' ;
            $file2->move($destinationPath2,$fileName2);

            unset($value['images']);

            $value['image'] = "/images/product-gallery/".$fileName2;

            $value['json_data'] = json_encode(['type' => $value['type'], 'custom_url' => $value['link']]);


            $value['created_at']= time();

            unset($value['type']);
            unset($value['link']);

            $insert = DB::table('codebumble_product_list')->insert($value);





        }

        return redirect()->route('auth_add_product_page',[ 'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Product Added!! This Product is now Visible in The website.', 'hasher_ip' => Str::random(10)]);

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

    public function auth_edit_product_page($id){

        check_auth();
        check_power('employee');

        $companys = DB::table('codebumble_company_list')->select('name')->get();

        $data = DB::select('select * from codebumble_product_list where id = ?', [$id]);

        if(!isset($data[0])){
            return redirect()->route('misc-not-authorized');
        }

        $pageConfigs = ['pageHeader' => false];
        return view('/content/products/edit_products', ['pageConfigs' => $pageConfigs, 'companies' => $companys, 'data' => $data[0]]);


    }

}
