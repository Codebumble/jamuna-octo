<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
	public function home(Request $request)
	{
		$data = \DB::select(
			'select value from codebumble_front_page where code_name=?',
			['meta']
		);

		server_time_set($request);

		return view('/frontend/home', [
			'meta' => json_decode($data[0]->value),
		]);
		// return view('frontend.home');
	}
}
