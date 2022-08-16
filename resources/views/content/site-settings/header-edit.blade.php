
@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Header Details')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
@endsection

@section('content')
<!-- Validation -->
<section class="bs-validation">
    <!-- Bootstrap Validation -->


    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Header Details</h4>
        </div>
        <div class="card-body">



		@if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                </div>
            </div>
        @endif

						<div class="divider-primary divider">
            				<div class="divider-text">Board Of Directors</div>
          				</div>
          <form class="needs-validation" novalidate action="{{route('site-settings-general-api')}}" enctype="multipart/form-data" method="POST">
		  @csrf
				<div class="row">
						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="bod-title">Title</label>

						<input
							type="text"
							id="bod-title"
							name="bod-title"
							class="form-control"
							value =""
							placeholder="bod-title"
							aria-label="bod-title"
							aria-describedby="bod-title"
							required
						/>
						</div>

						<div class="mb-1">
						<label class="d-block form-label" for="bod-short-description">Short Description</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="bod-short-description"
							rows="3"
							required
						></textarea>
						</div>

						<div class="divider-primary divider">
            				<div class="divider-text">News Center Division</div>
          				</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="ncd-title">Title</label>

						<input
							type="text"
							id="ncd-title"
							name="ncd-title"
							class="form-control"
							value =""
							placeholder="ncd-title"
							aria-label="ncd-title"
							aria-describedby="ncd-title"
							required
						/>
						</div>

						<div class="mb-1">
						<label class="d-block form-label" for="ncd-short-description">Short Description</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="ncd-short-description"
							rows="3"
							required
						></textarea>
						</div>

						<div class="divider-warning divider">
            				<div class="divider-text">News Center :: Correspondence by Disctrict</div>
          				</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="ncd-cbd-title">Title</label>

						<input
							type="text"
							id="ncd-cbd-title"
							name="ncd-cbd-title"
							class="form-control"
							value =""
							placeholder="ncd-cbd-title"
							aria-label="ncd-cbd-title"
							aria-describedby="ncd-cbd-title"
							required
						/>
						</div>

						<div class="mb-1">
						<label class="d-block form-label" for="ncd-cbd-short-description">Short Description</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="ncd-cbd-short-description"
							rows="3"
							required
						></textarea>
						</div>

						<div class="divider-warning divider">
            				<div class="divider-text">News Center :: Correspondence by Sub-Disctrict</div>
          				</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="ncd-cbsd-title">Title</label>

						<input
							type="text"
							id="ncd-cbsd-title"
							name="ncd-cbsd-title"
							class="form-control"
							value =""
							placeholder="ncd-cbsd-title"
							aria-label="ncd-cbsd-title"
							aria-describedby="ncd-cbsd-title"
							required
						/>
						</div>

						<div class="mb-1">
						<label class="d-block form-label" for="ncd-cbsd-short-description">Short Description</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="ncd-cbsd-short-description"
							rows="3"
							required
						></textarea>
						</div>


				</div>
				<div class="col-12 text-center mt-2 pt-50">
            		<button type="submit" class="btn btn-primary">Update</button>
				</div>
          </form>
        </div>
      </div>
    </div>
    <!-- /Bootstrap Validation -->

    <!-- jQuery Validation -->

    <!-- /jQuery Validation -->

</section>
<!-- /Validation -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-validation-company-page.js')) }}"></script>
@endsection
