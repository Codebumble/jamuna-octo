<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class photo_gallery extends Controller
{
    public function add_gallery_photo(Request $request){

        $new= $request->new;
        $data_get = DB::select('select value from codebumble_front_page where code_name=?',['gallery']);
        $a = json_decode($data_get[0]->value);
        $counter = 1;

        foreach ($new as $key => $value) {

            $file2 = $request->file('new.'.$key.'.image') ;
            $fileName2 = time().'-0'.$counter.'0-images.'.$file2->getClientOriginalExtension() ;
            $destinationPath2 = public_path().'/images/photo-gallery' ;
            $file2->move($destinationPath2,$fileName2);



            $f = [
                "src" => "/images/photo-gallery/".$fileName2,
            ];

            array_push($a,$f);
            $counter +=1;

        }

        $ok = DB::table('codebumble_front_page')->where('code_name','gallery')->update(['value' => json_encode($a),'updated_at' => time()]);

        return redirect()->route('photo_gallery_view',[ 'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Image added to the Gallery. People Can view this image now. Thank You', 'hasher_ip' => Str::random(10)]);

    }

    public function delete_image ($id){
        $data_get = DB::select('select value from codebumble_front_page where code_name=?',['gallery']);
        $a = json_decode($data_get[0]->value);
        $b = [];
        foreach ($a as $key => $value) {
            if( $key == $id){
            $unlink_path = public_path().''.$value->src;
            $unlink_path = str_replace("/", "\\", $unlink_path);
            unlink($unlink_path);

            } else {
                array_push($b, $value);
            }
        }
        $ok = DB::table('codebumble_front_page')->where('code_name','gallery')->update(['value' => json_encode($b),'updated_at' => time()]);

        return redirect()->route('photo_gallery_view',[ 'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Image deleted from the Gallery. Thank You', 'hasher_ip' => Str::random(10)]);

    }

    public function view_image(){

    }
}
