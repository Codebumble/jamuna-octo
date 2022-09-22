<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DashboardController extends Controller
{
  // Dashboard - Analytics
  public function dashboardAnalytics()
  {
    check_auth();
    $datam_1 = DB::select("select count(*) as mobile from codebumble_login_table where username=? and os like '%Android%'", [Auth::user()->username]);
    $datam_2 = DB::select("select count(*) as total from codebumble_login_table where username=?", [Auth::user()->username]);
    $applicant = DB::select("select count(*) as applicant from codebumble_applicant_list");
    $company = DB::select("select count(*) as company from codebumble_company_list");
    $user = DB::select("select count(*) as user from users");
    $job = DB::select("select l_date from codebumble_job_list");

    $b =[];
    $b['job'] = 0;

    foreach ($job as $key => $value) {
      if(str_replace('-','',$value->l_date) > date('Ymd')){
        $b['job'] += 1;

      }
    }


    $b['mobile'] = round(($datam_1[0]->mobile/$datam_2[0]->total)*100);
    $b['desktop'] = round((($datam_2[0]->total - $datam_1[0]->mobile)/$datam_2[0]->total)*100);
    $b['applicant'] = $applicant[0]->applicant;
    $b['company'] = $company[0]->company;
    $b['user'] = $user[0]->user;

    $pageConfigs = ['pageHeader' => false];

    return view('/content/dashboard/dashboard-analytics', ['pageConfigs' => $pageConfigs, 'b' => $b]);
  }

  // Dashboard - Ecommerce
  public function dashboardEcommerce()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/dashboard/dashboard-ecommerce', ['pageConfigs' => $pageConfigs]);
  }
}
