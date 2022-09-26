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

class tenderApplicant extends Controller
{
	public function from_receive(Request $request)
	{
		// return $request->post();
		$new = $request->new;
		// return json_encode($new);
		foreach ($new as $key => $value) {
			return json_encode(['key' => $key]); //field required all
		}

		$db_check = DB::select(
			'select * from codebumble_tender_applicant_list where email=? and tender_id =?',
			[$new['email'], $new['tender_id']]
		);
		if (isset($db_check[0])) {
			return json_encode([
				'error' =>
					'You have already applied on this tender using this Email Address',
				'data' => 0,
			]);
		}

		$db_check = DB::select(
			'select * from codebumble_tender_applicant_list where phone=? and tender_id =?',
			[$new['phone'], $new['tender_id']]
		);
		if (isset($db_check[0])) {
			return json_encode([
				'error' =>
					'You have already applied on this tender using this Phone Number',
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
			return json_encode([
				'error' => 'No File Found.',
				'data' => 0,
			]);
		}
		$new['created_at'] = time();
		unset($new['file_upload']);
		// $new['json_data'] = json_encode([
		// 	'age' => $new['age'],
		// 	'gender' => $new['gender'],
		// ]);

		// unset($new['age']);
		// unset($new['gender']);
		$db = DB::table('codebumble_tender_applicant_list')->insert($new);

		return json_encode(['data' => 1]);
	}

	public function applicant_list_api()
	{
		check_auth();
		check_power('manager');

		$data = DB::table('codebumble_tender_applicant_list')->get();

		return json_encode(['data' => $data]);
	}

	public function add_a_tender_view()
	{
		$pageConfigs = ['pageHeader' => false];
		$companys = DB::select('select name,id from codebumble_company_list');
		return view('/content/e-tender/add_tender', [
			'pageConfigs' => $pageConfigs,
			'companies' => $companys,
		]);
	}

	public function tender_docs_view()
	{
		return view('/content/e-tender/tender-docs');
	}
}
