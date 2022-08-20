
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
  <div class="row match-height">
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
            <h1 class="mb-1 text-white">Welcome Back {{Auth::user()->name}}</h1>
            <p class="card-text m-auto w-75">
              I hope you're doing well today. I'm sure you've been busy. Let's get started with some quick stats.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Greetings Card ends -->

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
    </div>
    <!-- Subscribers Chart Card ends -->

    <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start">
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i data-feather="anchor" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">27</h2>
          <p class="card-text">Total Business</p>
        </div>
      </div>
    </div>
    <!-- Orders Chart Card ends -->

    <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start">
          <div class="avatar bg-light-success p-50 m-0">
            <div class="avatar-content">
              <i data-feather="smile" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">20k</h2>
          <p class="card-text">Total Job Candidates</p>
        </div>
      </div>
    </div>
    <!-- Orders Chart Card ends -->

    <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start">
          <div class="avatar bg-light-info p-50 m-0">
            <div class="avatar-content">
              <i data-feather="list" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">10</h2>
          <p class="card-text">Available Job Circular</p>
        </div>
      </div>
    </div>
    <!-- Orders Chart Card ends -->
  </div>

  <!-- List DataTable -->
  <div class="row">
    <div class="col-12">
      <div class="card invoice-list-wrapper">
        <div class="card-datatable table-responsive">
          <table class="invoice-list-table table">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                <th><i data-feather="trending-up"></i></th>
                <th>Client</th>
                <th>Total</th>
                <th class="text-truncate">Issued Date</th>
                <th>Balance</th>
                <th>Invoice Status</th>
                <th class="cell-fit">Actions</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
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
  <script src="{{ asset(mix('js/scripts/pages/dashboard-analytics.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-invoice-list.js')) }}"></script>
@endsection
