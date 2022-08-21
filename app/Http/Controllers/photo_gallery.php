<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Auth;

class photo_gallery extends Controller
{
    public function add_image(Request $request){

        $new= $request->new;
        $a = [];


        foreach ($new as $key => $value) {
            if($file1 = $request->hasFile('new.'.$key.'.image')){

            $file2 = $request->file('new.'.$key.'.image') ;
            $fileName2 = time().'-images.'.$file2->getClientOriginalExtension() ;
            $destinationPath2 = public_path().'/images/photo-gallery' ;
            $file2->move($destinationPath2,$fileName2);



            $f = [
                "src" => "/images/photo-gallery/".$fileName2,
            ];

            array_push($a,$f);
        }

        }

    }

    public function delete_image ($id){

    }

    public function view_image(){

    }
}
