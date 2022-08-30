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

class applicant extends Controller
{
	public function from_receive(Request $request)
	{
		// return $request->post();
		$new = $request->new;
		// return json_encode($new);
		foreach ($new as $key => $value) {
			if ($key != 'university') {
                if($key != 'file_upload'){
				if ($request->new[$key] == '' || $request->new[$key] == null) {
					return json_encode(['key' => $key]); //field required all
				}
            }
			}
		}

		$db_check = DB::select(
			'select * from codebumble_applicant_list where email=? and job_id =?',
			[$new['email'], $new['job_id']]
		);
		if (isset($db_check[0])) {
			return json_encode([
				'error' =>
					'You have already applied on this job using this Email Address',
				'data' => 0,
			]);
		}

		$db_check = DB::select(
			'select * from codebumble_applicant_list where phone=? and job_id =?',
			[$new['phone'], $new['job_id']]
		);
		if (isset($db_check[0])) {
			return json_encode([
				'error' =>
					'You have already applied on this job using this Phone Number',
				'data' => 0,
			]);
		}



		if ($file2 = $request->hasFile('new.file_upload')) {
			$vale1 = $request->validate([
				'new.file_upload.*' => 'mimes:pdf,doc,docx|max:10080',
			]);

			$user2 = Str::random(5);
			$file2 = $request->file('new.file_upload');
			$fileName2 =
				time() .
				'-' .
				$user2 .
				'.' .
				$file2->getClientOriginalExtension();
			$destinationPath2 = storage_path() . '/app/securefolder';
			$file2->move($destinationPath2, $fileName2);

			$new['cv_link'] = $fileName2;
		} else {
			return json_encode(['error' => 'No CV Found.', 'data' => 0]);
		}
		$new['created_at'] = time();
		unset($new['file_upload']);
		$new['json_data'] = json_encode([
			'age' => $new['age'],
			'gender' => $new['gender']
		]);



		unset($new['age']);
		unset($new['gender']);
		$db = DB::table('codebumble_applicant_list')->insert($new);



		return json_encode(['data' => 1]);
	}

	public function applicant_list_api()
	{
		check_auth();
		check_power('manager');

		$data = DB::table('codebumble_applicant_list')->get();

		return json_encode(['data' => $data]);
	}
}
