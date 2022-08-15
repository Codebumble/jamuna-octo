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

class siteGeneral extends Controller
{
    public function general_page_view(){

        $pageConfigs = ['pageHeader' => false];
        $db_data = DB::table('codebumble_general')->get();

        $site_name= null;
        $site_moto = null;
        $social_media = null;
        $site_url=null;
        $site_logo=null;
        $support_email=null;

        foreach($db_data as $datam){
            if($datam->code_name == "site_name"){
                $site_name = $datam->value;
            }

            if($datam->code_name == "site_moto"){
                $site_moto = $datam->value;
            }

            if($datam->code_name == "social_media"){
                $social_media = $datam->value;
            }

            if($datam->code_name == "site_url"){
                $site_url = $datam->value;
            }

            if($datam->code_name == "site_logo"){
                $site_logo = $datam->value;
            }

            if($datam->code_name == "support_email"){
                $support_email = $datam->value;
            }
        }



        // $site_name= null;
        // $site_moto = null;
        // $social_media = null;
        // $site_url=null;
        // $site_logo=null;
        // $support_email=null;

        return view('/content/site-settings/general-settings', ['pageConfigs' => $pageConfigs, 'site_name' => $site_name, 'site_moto' => $site_moto, 'social_media' => json_decode($social_media), 'site_url' => $site_url, 'site_logo' => $site_logo, 'support_email' => $support_email]);
    }

    public function site_settings_general_api(Request $request){
        $field = $request->validate([
            'name' => 'required|string',
            'siteUrl' => 'required|string',
            'siteEmail' => 'required|string',
            'description' => 'required|string',
        ]);

        $social_media= [];
        $social_media['facebook'] = $request['facebook'];
        $social_media['instagram'] = $request['instagram'];
        $social_media['linkedin'] = $request['linkedin'];
        $social_media['youtube'] = $request['youtube'];

        if($file1 = $request->hasFile('logo')) {
            $field1 = $request->validate([
                'logo.*' => 'mimes:png,svg|max:1080',
            ]);
            $file1 = $request->file('logo') ;
            $fileName1 = time().'-company-logo.'.$file1->getClientOriginalExtension() ;
            $destinationPath1 = public_path().'/images/logo' ;
            $file1->move($destinationPath1,$fileName1);

            $update_site_logo = DB::table('codebumble_general')->where('code_name', 'site_logo')->update(['value' => '/images/logo'.$fileName1, 'updated_at' => time()]);

        }

        if($file2 = $request->hasFile('short-logo')) {
            $field2 = $request->validate([
                'short-logo.*' => 'mimes:png,svg|max:1080',
            ]);
            $file2 = $request->file('short-logo') ;
            $fileName2 = time().'-company-short-logo.'.$file2->getClientOriginalExtension() ;
            $destinationPath2 = public_path().'/images/logo' ;
            $file2->move($destinationPath2,$fileName2);

            $update_site_logo = DB::table('codebumble_general')->where('code_name', 'site_short_logo')->update(['value' => '/images/logo'.$fileName2, 'updated_at' => time()]);

        }

        if($file3 = $request->hasFile('favicon-logo')) {
            $field3 = $request->validate([
                'favicon-logo.*' => 'mimes:ico|max:1080',
            ]);
            $file3 = $request->file('favicon-logo') ;
            $fileName3 = 'favicon.ico' ;
            $destinationPath3 = public_path() ;
            unlink(public_path().'favicon.ico');
            $file3->move($destinationPath3,$fileName3);

        }

        $update_site_name = DB::table('codebumble_general')->where('code_name', 'site_name')->update(['value' => $field['name'], 'updated_at' => time()]);

        $update_siteUrl = DB::table('codebumble_general')->where('code_name', 'site_url')->update(['value' => $field['siteUrl'], 'updated_at' => time()]);



        $update_site_email = DB::table('codebumble_general')->where('code_name', 'support_email')->update(['value' => $field['siteEmail'], 'updated_at' => time()]);

        $update_site_moto = DB::table('codebumble_general')->where('code_name', 'site_moto')->update(['value' => $field['description'], 'updated_at' => time()]);

        $update_social_media = DB::table('codebumble_general')->where('code_name', 'social_media')->update(['value' => json_encode($social_media), 'updated_at' => time()]);

        $path = base_path('.env');

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                'APP_NAME="'.env('APP_NAME').'"', 'APP_NAME="'.$field['name'].'"', file_get_contents($path)
            ));

            file_put_contents($path, str_replace(
                'APP_URL='.env('APP_URL'), 'APP_URL='.$field['siteUrl'], file_get_contents($path)
            ));

            file_put_contents($path, str_replace(
                'SUPPORT_HOST='.env('SUPPORT_HOST'), 'SUPPORT_HOST='.$field['siteEmail'], file_get_contents($path)
            ));
        }

        return redirect()->route('site-settings-general',[ 'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You', 'hasher_ip' => Str::random(10)]);
    }
}
