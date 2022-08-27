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
    }

    public function auth_edit_event(){
        check_auth();
		check_power('manager');
    }

    public function auth_all_event(){
        check_auth();
		check_power('manager');
    }

    public function add_event(Request $r){
        check_auth();
		check_power('manager');

    }

    public function edit_event(Request $r, $id){
        check_auth();
		check_power('manager');

    }

    public function delete_event($id){
        check_auth();
		check_power('manager');

    }

    public function frontpage_event_list(){

    }

    public function frontpage_single_event_view($id){

    }



}
