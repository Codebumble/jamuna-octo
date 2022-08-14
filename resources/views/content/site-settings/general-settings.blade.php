
@extends('layouts/contentLayoutMaster')

@section('title', 'Edit General Details')

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
          <h4 class="card-title">Edit General Site Details</h4>
        </div>
        <div class="card-body">



		@if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-danger" role="alert">
                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                </div>
            </div>
        @endif

		<div class="d-flex row mt-1 mr-1">
			<img id="logoPreview" style="display: block; margin-left: auto; margin-right: auto;width: 50%;" src="{{$site_logo}}" width="250" height="150">
		</div>


          <form class="needs-validation" novalidate action="" enctype="multipart/form-data" method="POST">
		  @csrf
				<div class="row">
						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">Site Name</label>

						<input
							type="text"
							id="name"
							name = "name"
							class="form-control"
							value ="{{ $site_name}}"
							placeholder="Name"
							aria-label="Name"
							aria-describedby="name"
							required
						/>
						</div>


						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="support_email">Logo (500 x 300)</label>
						<input
							type="file"
							id="logo"
							name="logo"
							class="form-control"
							onchange="loadFile(event)"
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="siteUrl">Site URL</label>

						<input
							type="text"
							id="siteUrl"
							name = "siteUrl"
							class="form-control"
							value ="{{$site_url}}"
							aria-label="siteUrl"
							aria-describedby="siteUrl"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">Site Email</label>

						<input
							type="text"
							id="name"
							name = "siteEmail"
							class="form-control"
							value ="{{$support_email}}"
							placeholder="siteEmail"
							aria-label="siteEmail"
							aria-describedby="siteEmail"
							required
						/>
						</div>


						<div class="mb-1">
						<label class="d-block form-label" for="validationBioBootstrap">Company Moto</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="description"
							rows="3"
							required
						>{{$site_moto}}</textarea>
						</div>





						<div class="divider-primary divider">
            				<div class="divider-text">Additional Information</div>
          				</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="longitute">Facebook</label>
						<input type="text" class="form-control" value="{{$social_media->facebook}}" name="longitute" id="longitute"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="latitude">Instagram</label>
						<input type="text" class="form-control" value="{{$social_media->instagram}}" name="latitude" id="latitude"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="website">Linkedin</label>
						<input type="text" class="form-control" value="{{$social_media->linkedin}}" name="website" id="website" required/>
						</div>



						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="instagram">Youtube</label>
						<input type="text" class="form-control" name="instagram" value="{{$social_media->youtube}}" id="instagram"/>
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
  <script>
  var loadFile = function(event) {
    var output = document.getElementById('logoPreview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
@endsection
