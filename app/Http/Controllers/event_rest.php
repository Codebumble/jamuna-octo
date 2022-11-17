<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class event_rest extends Controller
{
    public function auth_add_event(){
        check_auth();
		check_power('manager');

        $companys = DB::table('codebumble_company_list')
			->select('name', 'id')
			->get();

        $pageConfigs = ['pageHeader' => false];
        return view('/content/event/add-event', ['pageConfigs' => $pageConfigs, 'companies' => $companys]);
    }

    public function auth_edit_event($id){
        check_auth();
		check_power('manager');

        $dbcheck = DB::select('select * from codebumble_event_list where id = ?', [$id]);

        if(!isset($dbcheck[0])){
                return redirect()->route('misc-not-authorized');
                exit();
        }

        $companys = DB::table('codebumble_company_list')
			->select('name', 'id')
			->get();

        $pageConfigs = ['pageHeader' => false];
        return view('/content/event/edit-event', ['pageConfigs' => $pageConfigs, 'companies' => $companys, 'd' => $dbcheck[0]]);


    }

    public function auth_all_event(){
        check_auth();
		check_power('manager');

        $pageConfigs = ['pageHeader' => false];
        return view('/content/event/all-event', ['pageConfigs' => $pageConfigs]);
    }

    public function auth_all_event_api(){
        check_auth();
		check_power('manager');

        if(Auth::user()->role == 'admin' || Auth::user()->role == 'super-admin'){
            $data = DB::select('select * from codebumble_event_list');

        } else {
            $data = DB::select(
                "select * from codebumble_event_list where json_data like '%\"added_by\":\"" .
                    Auth::user()->username .
                    "\"%'");
        }

        //$data->author = json_decode($data[0]->json_data, true)->added_by;
        foreach ($data as $key => $value) {
            $data2 = DB::select('select * from codebumble_company_list where id=?', [$data[$key]->company]);

        $data[$key]->author = json_decode($data[$key]->json_data)->added_by;

        $data[$key]->company = $data2[0]->name;
            
        }



        return json_encode(['data' =>$data]);
    }

    public function add_event(Request $r){
        check_auth();
		check_power('manager');

        $new = $r->new[0];

        if ($file2 = $r->hasFile('new.0.image')) {
            $file2 = $r->file('new.0.image');
            $fileName2 =
                time() .
                '-' .
                Str::random(5) .
                '-event-images.' .
                $file2->getClientOriginalExtension();
            $destinationPath2 = public_path() . '/images/event-image';
            $file2->move($destinationPath2, $fileName2);
            unset($new['image']);

            $new['image'] = '/images/event-image/' . $fileName2;
        }

        $new['created_at'] = time();

        $new['json_data'] = json_encode(['added_by' => Auth::user()->username]);

        $db = DB::table('codebumble_event_list')->insert($new);


        return redirect()->route('auth_add_event', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Event Updated!! This Event is now Visible in The website.',
			'hasher_ip' => Str::random(10),
		]);

    }

    public function edit_event(Request $r, $id){

        check_auth();
		check_power('manager');

        $dbcheck = DB::select('select * from codebumble_event_list where id = ?', [$id]);

        if(!isset($dbcheck[0])){
                return redirect()->route('misc-not-authorized');
                exit();
        }

        $new = $r->new[0];

        if ($file2 = $r->hasFile('new.0.image')) {
            $file2 = $r->file('new.0.image');
            $fileName2 =
                time() .
                '-'.Str::random(5).
                '-event-images.' .
                $file2->getClientOriginalExtension();
            $destinationPath2 = public_path() . '/images/event-image';
            $file2->move($destinationPath2, $fileName2);
            unset($new['image']);

            $new['image'] = '/images/event-image/' . $fileName2;

            $unlink_path = public_path().''.$dbcheck[0]->image;
            $unlink_path = str_replace("/", "\\", $unlink_path);
            if(file_exists($unlink_path)){
                unlink($unlink_path);
                }
        }

        $new['updated_at'] = time();


        $db = DB::table('codebumble_event_list')->where('id', $id)->update($new);

        $new['json_data'] = [
            'added_by' => json_decode($dbcheck[0]->json_data)->added_by,
            'last_edited_by' => Auth::user()->username
        ];


        return redirect()->route('auth_edit_event', [
            'id' => $id,
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Event Updated!! This Event is now Visible in The website.',
			'hasher_ip' => Str::random(10),
		]);

    }

    public function delete_event($id){
        check_auth();
		check_power('manager');

        if(Auth::user()->role == 'admin' || Auth::user()->role == 'super-admin'){
            $data = DB::select('select * from codebumble_event_list where id=?', [$id]);

        } else {
            $data = DB::select(
                "select * from codebumble_event_list where json_data like '%\"added_by\":\"" .
                    Auth::user()->username .
                    "\"%' and id=?", [$id]);
        }

        if(isset($data[0])){
            $b = DB::table('codebumble_event_list')->where('id', $id)->delete();

            return redirect()->route('auth_all_event', [
                'hasher' => Str::random(40),
                'time' => time(),
                'exist' =>
                    'Event Updated!! This Event is now Visible in The website.',
                'hasher_ip' => Str::random(10),
            ]);

        } else {

        }

    }

    public function frontpage_event_list(){

        $db= DB::select('select * from codebumble_event_list');

        return json_encode($db);

    }

    public function frontpage_single_event_view($id){

        $db= DB::select('select * from codebumble_event_list where id=?', [$id]);

        if(isset($db[0])){
        return json_encode($db[0]);
        } else {
            return json_encode($db);
        }

    }



}
