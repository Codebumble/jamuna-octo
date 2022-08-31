
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard Analytics')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-invoice-list.css')) }}">
  @endsection

@section('content')
<!-- Dashboard Analytics Start -->
<section id="dashboard-analytics">
  <div class="row">


    <!-- Greetings Card starts -->
    <div class="col-12">
      <div class="card card-congratulations">
        <div class="card-body text-center">
          <img
            src="{{asset('images/elements/decore-left.png')}}"
            class="congratulations-img-left"
            alt="card-img-left"
          />
          <img
            src="{{asset('images/elements/decore-right.png')}}"
            class="congratulations-img-right"
            alt="card-img-right"
          />
          <div class="avatar avatar-xl bg-primary shadow">
            <div class="avatar-content">
              <img
                      class="round" style="object-fit: cover;"
                      <?php
                      if(!isset(Auth::user()->avatar)){ ?>
                      src="{{ Auth::user()->profile_photo_url }}"
                      <?php } else { ?>
                      src="/profile-images/{{Auth::user()->avatar}}"
                      <?php } ?>
                      height="30"
                      width="30"
                      alt="avatar"
                    >
            </div>
          </div>
          <div class="text-center">
            <h1 class="mb-1 text-white">Welcome Back, {{Auth::user()->name}}</h1>
            <p class="card-text m-auto w-75">
              I hope you're doing well today. I'm sure you've been busy. Let's get started with some quick stats.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Greetings Card ends -->

    <!-- Sessions Card -->
    <div class="col-md-6 col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
              <h4>Sessions By Device</h4>
              <div class="dropdown chart-dropdown">
                <button
                  class="btn btn-sm border-0 dropdown-toggle px-50"
                  type="button"
                  id="dropdownItem1"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  Last Few Logins
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownItem1">
                  <a class="dropdown-item" href="#">Last Few Logins</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div id="session-chart" class="my-1"></div>
              <div class="d-flex justify-content-between mb-1">
                <div class="d-flex align-items-center">
                  <i data-feather="monitor" class="font-medium-2 text-primary"></i>
                  <span class="fw-bold ms-75 me-25">Desktop</span>
                </div>
                <div>
                  <span>{{$b['desktop']}}%</span>
                </div>
              </div>
              <div class="d-flex justify-content-between mb-1">
                <div class="d-flex align-items-center">
                  <i data-feather="tablet" class="font-medium-2 text-warning"></i>
                  <span class="fw-bold ms-75 me-25">Mobile</span>
                </div>
                <div>
                  <span>{{$b['mobile']}}%</span>
                </div>
              </div>

            </div>
          </div>
    </div>

        <!-- Sessions Card End-->




    <!-- Subscribers Chart Card starts -->
    <div class="col-lg-3 col-12">

      <div class="card">
        <div class="card-header flex-column align-items-start">
          <div class="avatar bg-light-primary p-50 m-0">
            <div class="avatar-content">
              <i data-feather="users" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">10k</h2>
          <p class="card-text">Employee Gained</p>
        </div>
      </div>

      <div class="card">
        <div class="card-header flex-column align-items-start">
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i data-feather="anchor" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$b['company']}}</h2>
          <p class="card-text">Total Business</p>
        </div>
      </div>

    </div>
    <!-- Subscribers Chart Card ends -->

    <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start">
          <div class="avatar bg-light-success p-50 m-0">
            <div class="avatar-content">
              <i data-feather="smile" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$b['applicant']}}</h2>
          <p class="card-text">Total Applicant</p>
        </div>
      </div>

      <div class="card">
        <div class="card-header flex-column align-items-start">
          <div class="avatar bg-light-info p-50 m-0">
            <div class="avatar-content">
              <i data-feather="list" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$b['job']}}</h2>
          <p class="card-text">Available Job Circular</p>
        </div>
      </div>
    </div>

    </div>
    <!-- Orders Chart Card ends -->

    <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-12">

    </div>
    <!-- Orders Chart Card ends -->

    <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-12">

    <!-- Orders Chart Card ends -->
  </div>

  <!-- List DataTable -->
  <div class="card">
    <div class="card-body border-bottom">
      <h4 class="card-title">Search & Filter</h4>
      <div class="row">
        <div class="col-md-4 user_role"></div>
        <div class="col-md-4 user_plan"></div>
        <div class="col-md-4 user_status"></div>
      </div>
    </div>
    <div class="card-datatable table-responsive pt-0">
      <table class="user-list-table table">
        <thead class="table-light">
          <tr>
            <th></th>
            <th>Name</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
  <!--/ List DataTable -->
</section>
<!-- Dashboard Analytics end -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/pages/company-user-list.js')) }}"></script>
  <script>


  var $sessionChart = document.querySelector('#session-chart');
  var avgSessionChartOptions;
  var sessionChart;

  sessionChartOptions = {
    chart: {
      type: 'donut',
      height: 300,
      toolbar: {
        show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    series: [{{$b['desktop']}}, {{$b['mobile']}}],
    legend: { show: false },
    comparedResult: [1, 1],
    labels: ['Desktop', 'Mobile'],
    stroke: { width: 0 },
    colors: [window.colors.solid.warning, window.colors.solid.danger]
  };
  sessionChart = new ApexCharts($sessionChart, sessionChartOptions);
  sessionChart.render();


  </script>
@endsection
