<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class applicant extends Controller
{
    public function from_receive(Request $request){
        foreach($request->new as $key=>$value){
            if($request->new[$key] == "" || $request->new[$key] == null){
                return redirect()->route('edit_a_job_view',[ 'id'=> $dev['id'],'hasher' => Str::random(40), 'time' => time(), 'exist'=> 'Field black Detected.', 'hasher_ip' => Str::random(10)]);
            }
        }
    }
}
