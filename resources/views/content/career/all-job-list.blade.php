@extends('layouts/contentLayoutMaster')

@section('title', 'All Job List')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
<!-- users list start -->
<section class="app-user-list">

  <!-- list and filter start -->
  <div class="card">
    <div class="card-body border-bottom">
      <h4 class="card-title">Details of All The JOb</h4>
      @if (isset($_GET['status']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-success" role="alert">
                <div class="alert-body"><strong>{{$_GET['status']}}</strong></div>
                </div>
            </div>
        @endif

		@if (isset($_GET['error']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-danger" role="alert">
                <div class="alert-body"><strong>Wrong @{id} . Try Again. (Possible Reason: Company Exist with this section. Delete those to Delete This Section.)</strong></div>
                </div>
            </div>
        @endif
    </div>
    <div class="card-datatable table-responsive pt-0">
      <table class="user-list-table table">
        <thead class="table-light">
          <tr>
            <th></th>
			<th>ID</th>
            <th>Job Title</th>
			<th>Post Time</th>
			<th>Response</th>
            <th>Actions</th>
          </tr>
        </thead>
		<tbody>

		<tr class="odd">
			<td></td>
			<td>1</td>
            <td>Employee For Jamuna TV</td>
			<td>10-08-2022 10:13PM</td>
			<td>137</td>
            <td>
			<div class="btn-group">
			<a href="#" style="text-decoration: none;" class="m-1"><i data-feather='users'></i> </a>
			<a href="#" style="text-decoration: none;" class="m-1"> <i data-feather='edit-2'></i> </a>
			<a href="#" style="text-decoration: none;" class="m-1"> <i data-feather='trash-2'></i> </a>
			<div>

			</td>

		</tr>

		<tr class="odd">
			<td></td>
			<td>2</td>
            <td>Driver</td>
			<td>08-08-2022 01:50PM</td>
			<td>241</td>
            <td>
			<div class="btn-group">
			<a href="#" style="text-decoration: none;" class="m-1"><i data-feather='users'></i> </a>
			<a href="#" style="text-decoration: none;" class="m-1"> <i data-feather='edit-2'></i> </a>
			<a href="#" style="text-decoration: none;" class="m-1"> <i data-feather='trash-2'></i> </a>
			<div>

			</td>

		</tr>

		<tr class="odd">
			<td></td>
			<td>3</td>
            <td>Office Staff</td>
			<td>08-06-2022 02:56PM</td>
			<td>241</td>
            <td>
			<div class="btn-group">
			<a href="#" style="text-decoration: none;" class="m-1"><i data-feather='users'></i> </a>
			<a href="#" style="text-decoration: none;" class="m-1"> <i data-feather='edit-2'></i> </a>
			<a href="#" style="text-decoration: none;" class="m-1"> <i data-feather='trash-2'></i> </a>
			<div>

			</td>

		</tr>


		</tbody>
      </table>
    </div>
    <!-- Modal to add new user starts-->

    <!-- Modal to add new user Ends-->
  </div>
  <!-- list and filter end -->
</section>
<!-- users list ends -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
@endsection
