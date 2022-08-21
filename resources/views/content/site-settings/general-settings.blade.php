
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
          <h4 class="card-title">Edit General Site Details</h4>
        </div>
        <div class="card-body">



		@if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                </div>
            </div>
        @endif

		<div class="d-flex row mt-1 mr-1">
			<img id="logoPreview" style="display: block; margin-left: auto; margin-right: auto;width: 50%;" src="{{$site_logo}}" width="250" height="150">
		</div>


          <form class="needs-validation" novalidate action="{{route('site-settings-general-api')}}" enctype="multipart/form-data" method="POST">
		  @csrf
				<div class="row">
						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">Site Name</label>

						<input
							type="text"
							id="name"
							name="name"
							class="form-control"
							value ="{{ $site_name }}"
							placeholder="Name"
							aria-label="Name"
							aria-describedby="name"
							required
						/>
						</div>


						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="logo">Logo with Name (500 x 300) (.png .svg)</label>
						<input
							type="file"
							id="logo"
							name="logo"
							class="form-control"
							onchange="loadFile(event)"
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="short-logo">Logo without Name (35 x 35) (.png .svg)</label>
						<input
							type="file"
							id="short-logo"
							name="short-logo"
							class="form-control"
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="short-logo">Logo Icon File(favicon.ico)</label>
						<input
							type="file"
							id="favicon-logo"
							name="favicon-logo"
							class="form-control"
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
						<label class="form-label" for="name">Support Email</label>

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

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">Support Email (Backup)</label>

						<input
							type="text"
							id="name"
							name = "siteEmailBackUp"
							class="form-control"
							value ="{{$support_email_backup}}"
							placeholder="siteEmailBackUp"
							aria-label="siteEmailBackUp"
							aria-describedby="siteEmailBackUp"
							required
						/>
						</div>


						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">Support Phone</label>
						<input
							type="text"
							id="name"
							name = "sitePhoneNumber"
							class="form-control"
							value ="{{$support_phone}}"
							placeholder="+880170000000"
							aria-label="+880170000000"
							aria-describedby="+880170000000"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">Support Phone (Backup)</label>
						<input
							type="text"
							id="name"
							name = "sitePhoneNumberBackup"
							class="form-control"
							value ="{{$support_phone_backup}}"
							placeholder="+880170000000"
							aria-label="+880170000000"
							aria-describedby="+880170000000"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">Google Map Key</label>
						<input
							type="text"
							id="name"
							name = "siteGMapKey"
							class="form-control"
							value ="{{$gmapkey}}"
							placeholder="GDGHfjdfgHSdDJDKDEJGD"
							aria-label="GDGHfjdfgHSdDJDKDEJGD"
							aria-describedby="GDGHfjdfgHSdDJDKDEJGD"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">Address</label>
						<input
							type="text"
							id="name"
							name = "address"
							class="form-control"
							value ="{{$address}}"
							placeholder="Moonshine St. 14/05 Light City"
							aria-label="Moonshine St. 14/05 Light City"
							aria-describedby="Moonshine St. 14/05 Light City"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">City & Country</label>
						<input
							type="text"
							id="name"
							name = "citycountry"
							class="form-control"
							value ="{{$cityCountry}}"
							placeholder="London, UK"
							aria-label="London, UK"
							aria-describedby="London, UK"
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
						<label class="form-label" for="facebook">Latitude</label>
						<input type="text" class="form-control" value="{{$location->latitude}}" name="latitude" id="latitude"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="longitude">Longitude</label>
						<input type="text" class="form-control" value="{{$location->longitude}}" name="longitude" id="longitude"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="facebook">Facebook</label>
						<input type="text" class="form-control" value="{{$social_media->facebook}}" name="facebook" id="facebook"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="instagram">Instagram</label>
						<input type="text" class="form-control" value="{{$social_media->instagram}}" name="instagram" id="instagram"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="linkedin">Linkedin</label>
						<input type="text" class="form-control" value="{{$social_media->linkedin}}" name="linkedin" id="linkedin" required/>
						</div>



						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="youtube">Youtube</label>
						<input type="text" class="form-control" name="youtube" value="{{$social_media->youtube}}" id="youtube"/>
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
