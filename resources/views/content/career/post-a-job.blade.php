
@extends('layouts/contentLayoutMaster')

@section('title', 'Post A Job')

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
          <h4 class="card-title">Post A Job</h4>
        </div>
        <div class="card-body">



		@if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                </div>
            </div>
        @endif

		<div class="demo-spacing-0 mb-2 d-none" id="faker">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>Data Updated ! It may take a little bit time to Update.</strong></div>
                </div>
            </div>



          <form class="needs-validation" novalidate action="{{route('site-settings-general-api')}}" enctype="multipart/form-data" method="POST">
		  @csrf
				<div class="row">
						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">Job Name</label>

						<input
							type="text"
							id="name"
							name="name"
							class="form-control"
							value ="IT Head Required!!"
							placeholder="Name"
							aria-label="Name"
							aria-describedby="name"
							required
						/>
						</div>


						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="logo">Poster</label>
						<input
							type="file"
							id="logo"
							name="logo"
							class="form-control"
							onchange="loadFile(event)"
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="short-logo">Essential Information & Instruction (.pdf .docx)</label>
						<input
							type="file"
							id="short-logo"
							name="short-logo"
							class="form-control"
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="siteUrl">Age</label>

						<input
							type="text"
							id="siteUrl"
							name = "siteUrl"
							class="form-control"
							value ="18-25 years at 21 January,2022"
							aria-label="siteUrl"
							aria-describedby="siteUrl"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="siteUrl">Educational Requirement (Minimum)</label>

						<input
							type="text"
							id="siteUrl"
							name = "siteUrl"
							class="form-control"
							value ="HSC Passed"
							aria-label="siteUrl"
							aria-describedby="siteUrl"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">Gender</label>

						<input
							type="text"
							id="name"
							name = "siteEmail"
							class="form-control"
							value ="Any Gender"
							placeholder="siteEmail"
							aria-label="siteEmail"
							aria-describedby="siteEmail"
							required
						/>
						</div>


						<div class="mb-1">
						<label class="d-block form-label" for="validationBioBootstrap">Job Details</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="description"
							rows="3"
							required
						></textarea>
						</div>





						<div class="divider-primary divider">
            				<div class="divider-text">Additional Information</div>
          				</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="facebook">Helpline Number</label>
						<input type="text" class="form-control" value="+8801828463829" name="facebook" id="facebook"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="instagram">Helpline Email</label>
						<input type="text" class="form-control" value="asjdhajh@gmail.com" name="instagram" id="instagram"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="linkedin">Last Date of Application</label>
						<input type="date" class="form-control" value="" name="linkedin" id="linkedin" required/>
						</div>



				</div>
				<div class="col-12 text-center mt-2 pt-50">
            		<button type="submit" class="btn btn-primary">Submit</button>
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
