<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Product_rest extends Controller
{
	public function add_product(Request $request)
	{
		check_auth();
		check_power('employee');

		$new = $request->new;

		foreach ($new as $key => $value) {
			$file2 = $request->file('new.' . $key . '.image');
			$fileName2 =
				time() .
				'-' .
				$value['name'] .
				'-product-images.' .
				$file2->getClientOriginalExtension();
			$destinationPath2 = public_path() . '/images/product-image';
			$file2->move($destinationPath2, $fileName2);

			unset($value['images']);

			$value['image'] = '/images/product-image/' . $fileName2;

			$value['json_data'] = json_encode([
				'type' => $value['type'],
				'custom_url' => $value['link'],
				'added_by' => Auth::user()->username,
			]);

			$value['created_at'] = time();

			unset($value['type']);
			unset($value['link']);

			$insert = DB::table('codebumble_product_list')->insert($value);
		}

		return redirect()->route('auth_add_product_page', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Product Updated!! This Product is now Visible in The website.',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function edit_product(Request $request)
	{
		check_auth();
		check_power('employee');

		$new = $request->new;

		$id = '';

		foreach ($new as $key => $value) {
			if (
				Auth::user()->role == 'admin' ||
				Auth::user()->role == 'super-admin'
			) {
				$data = DB::select(
					'select * from codebumble_product_list where id = ?',
					[$value['id']]
				);
			} else {
				$data = DB::select(
					"select * from codebumble_product_list where json_data like '%\"added_by\":\"" .
						Auth::user()->username .
						"\"%' and id=?",
					[$value['id']]
				);
			}

			if (!isset($data[0])) {
				return redirect()->route('misc-not-authorized');
				exit();
			}

			if ($file2 = $request->hasFile('new.' . $key . '.image')) {
				$file2 = $request->file('new.' . $key . '.image');
				$fileName2 =
					time() .
					'-' .
					$value['name'] .
					'-product-images.' .
					$file2->getClientOriginalExtension();
				$destinationPath2 = public_path() . '/images/product-image';
				$file2->move($destinationPath2, $fileName2);

				$link = public_path() . '' . $data[0]->image;
				$link = str_replace('/', '\\', $link);
				if (file_exists($link)) {
					unlink($link);
				}
				unset($value['images']);

				$value['image'] = '/images/product-image/' . $fileName2;
			} else {
				unset($value['images']);
			}

			$value['json_data'] = json_encode([
				'type' => $value['type'],
				'custom_url' => $value['link'],
				'added_by' => json_decode($data[0]->json_data)->added_by,
				'edited_by' => Auth::user()->username,
			]);

			$value['updated_at'] = time();

			unset($value['type']);
			unset($value['link']);
			$id = $data[0]->id;
			unset($value['id']);
			unset($value['name']);

			$insert = DB::table('codebumble_product_list')
				->where('id', $data[0]->id)
				->update($value);
		}

		return redirect()->route('auth_edit_product_page', [
			'id' => $id,
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Product Added!! This Product is now Visible in The website.',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function delete_product($id)
	{
		check_auth();
		check_power('employee');

		if (
			Auth::user()->role == 'admin' ||
			Auth::user()->role == 'super-admin'
		) {
			$data = DB::select(
				'select * from codebumble_product_list where id = ?',
				[$id]
			);
		} else {
			$data = DB::select(
				"select * from codebumble_product_list where json_data like '%\"added_by\":\"" .
					Auth::user()->username .
					"\"%' and id=?",
				[$id]
			);
		}

		if (!isset($data[0])) {
			return redirect()->route('misc-not-authorized');
			exit();
		}

		$link = public_path() . '' . $data[0]->image;
		$link = str_replace('/', '\\', $link);
		if (file_exists($link)) {
			unlink($link);
		}

		$delete = DB::table('codebumble_product_list')
			->where('id', $data[0]->id)
			->delete();

		return redirect()->route('auth_all_product_page', [
			'hasher' => Str::random(40),
			'time' => time(),
			'exist' =>
				'Product Added!! This Product is now Visible in The website.',
			'hasher_ip' => Str::random(10),
		]);
	}

	public function product_slider_api()
	{
	}

	public function auth_add_product_page()
	{
		check_auth();
		check_power('employee');

		$companys = DB::table('codebumble_company_list')
			->select('name')
			->get();

		$pageConfigs = ['pageHeader' => false];
		return view('/content/products/add_products', [
			'pageConfigs' => $pageConfigs,
			'companies' => $companys,
		]);
	}

	public function auth_edit_product_page($id)
	{
		check_auth();
		check_power('employee');

		$companys = DB::table('codebumble_company_list')
			->select('name')
			->get();

		if (
			Auth::user()->role == 'admin' ||
			Auth::user()->role == 'super-admin'
		) {
			$data = DB::select(
				'select * from codebumble_product_list where id = ?',
				[$id]
			);
		} else {
			$data = DB::select(
				"select * from codebumble_product_list where json_data like '%\"added_by\":\"" .
					Auth::user()->username .
					"\"%' and id=?",
				[$id]
			);
		}

		if (!isset($data[0])) {
			return redirect()->route('misc-not-authorized');
		}

		$pageConfigs = ['pageHeader' => false];
		return view('/content/products/edit_products', [
			'pageConfigs' => $pageConfigs,
			'companies' => $companys,
			'data' => $data[0],
		]);
	}

	public function auth_all_product_page()
	{
		check_auth();
		check_power('employee');

		if (
			Auth::user()->role == 'admin' ||
			Auth::user()->role == 'super-admin'
		) {
			$data = DB::select('select * from codebumble_product_list');
		} else {
			$data = DB::select(
				"select * from codebumble_product_list where json_data like '%\"added_by\":\"" .
					Auth::user()->username .
					"\"%'"
			);
		}

		if (!isset($data[0])) {
			return redirect()->route('misc-not-authorized');
		}

		$pageConfigs = [
			'contentLayout' => 'content-detached-left-sidebar',
			'pageClass' => 'ecommerce-application',
		];

		$breadcrumbs = [
			['link' => '/', 'name' => 'Home'],
			['link' => 'javascript:void(0)', 'name' => 'Company'],
			['name' => 'All Product'],
		];
		return view('/content/products/all_products', [
			'pageConfigs' => $pageConfigs,
			'breadcrumbs' => $breadcrumbs,
			'data' => $data,
		]);
	}

	public function front_all_product_page()
	{
		$data = DB::select('select * from codebumble_product_list');
		$b = [];

		foreach ($data as $key => $value) {
			$a = [
				'imgSrc' => $value->image,
				'alt' => $value->name,
				'linkText' => 'View Details',
			];

			if (json_decode($value->json_data)->type == 'Default') {
				$data = DB::select(
					'select * from codebumble_company_list where name=?',
					[$value->company]
				);

				$a += [
					'webLink' =>
						'/companies/' .
						$data[0]->id .
						'/' .
						str_replace(' ', '-', $data[0]->name),
				];
			} else {
				$a += ['webLink' => json_decode($alue->json_data)->custom_url];
			}

			array_push($b, $a);
		}

		return json_encode($b);
	}
}
