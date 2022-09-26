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

	public function tender_front_view($id)
	{
		$data = DB::select('select * from codebumble_tender_list where id=?', [
			$id,
		]);

		if (isset($data[0])) {
			$data[0]->_token = csrf_token();

			return json_encode($data[0]);
		} else {
			return "{'data':'No data found'}";
		}
	}

	public function tender_front_view_short()
	{
		$data = DB::select('select * from codebumble_tender_list');

		$companys = DB::table('codebumble_company_list')
			->select('name', 'image')
			->get();

		$new = [];
		if (isset($data[0])) {
			foreach ($data as $key => $value) {
				foreach ($companys as $key1 => $value1) {
					if ($value1->name == $value->comp_name) {
						$new[$key]['comp_image'] =
							'/company-images/' . $value1->image;
						$new[$key]['title'] = $value->title;
						$new[$key]['location'] = $value->location;
						$new[$key]['publish_date'] = $value->publish_date;
						$new[$key]['last_date'] = $value->last_date;
						$new[$key]['proc_method'] = $value->proc_method;
						$new[$key]['id'] = $value->id;
					}
				}
			}

			return json_encode($new);
		} else {
			return json_encode(['data' => 'No tender Found']);
		}
	}

	public function add_tender(Request $r)
	{
		check_auth();
		check_power('admin');
		$new = $r->new;

		foreach ($new as $key => $value) {
			if ($r->new[$key] == '' || $r->new[$key] == null) {
				return json_encode(['key' => $key]); //field required all
			}
		}

		$new['created_at'] = time();
		$new['updated_at'] = time();

		$data = DB::table('codebumble_tender_list')->insert($new);

		return redirect()->route('add_a_tender_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'E-Tender Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
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
		check_auth();
		check_power('admin');
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

	public function tender_list_view()
	{
		return view('/content/e-tender/tender-applicants');
	}
}
