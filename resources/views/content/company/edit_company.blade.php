
@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Company')

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
          <h4 class="card-title">Edit Company Details</h4>
        </div>
        <div class="card-body">

		@if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-danger" role="alert">
                <div class="alert-body"><strong>Company Name Already Exist. Please Try to Edit That or Delete to Create a New.</strong></div>
                </div>
            </div>
        @endif


          <form class="needs-validation" novalidate action="{{route('edit-company-api',['id' => $company->id])}}" enctype="multipart/form-data" method="POST">
		  @csrf
				<div class="row">
						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">Company Name</label>

						<input
							type="text"
							id="name"
							class="form-control"
							readonly="readonly"
							value ="{{ $company->name }}"
							placeholder="Name"
							aria-label="Name"
							aria-describedby="name"
							required
						/>
						</div>
						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="section">Section</label>
						<select class="select2 form-control" id="section" name="section">
						<option value="{{ $company->section }}" selected>{{ $company->section }}</option>
							@foreach($sections as $section)
								@if($section->name != $company->section)
									<option value="{{$section->name}}">{{$section->name}}</option>
								@endif
							@endforeach
                        </select>

						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="support_email">Support Email</label>
						<input
							type="email"
							id="support_email"
							name="support_email"
							value="{{ json_decode($company->json_data)->support_email }}"
							class="form-control"
							placeholder="support@codebumble.net"
							required
						/>
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please enter a valid email.</div>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="ceo_of_the_company">Name of The CEO</label>
						<input type="text" class="form-control" value="{{ json_decode($company->json_data)->ceo_of_the_company }}" name="ceo_of_the_company" id="ceo_of_the_company" required />
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please enter a valid CEO Name.</div>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="address">Address</label>
						<input type="text" class="form-control" value="{{ json_decode($company->json_data)->address }}" name="address" id="address" required />
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please enter a valid Address.</div>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="establish_date">Establish Date</label>
						<input type="date" class="form-control picker" value="{{ $company->establish_date }}" name="establish_date" id="establish_date" required />
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="support_phone_number">Support Phone Number</label>
						<input type="text" class="form-control" value="{{ json_decode($company->json_data)->support_phone_number }}" name="support_phone_number" id="support_phone_number" required />
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label for="image" class="form-label">Company Logo</label>
						<input class="form-control" type="file" id="image" name="image"/>
						</div>


						<div class="mb-1">
						<label class="d-block form-label" for="validationBioBootstrap">Company Discription</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="description"
							rows="3"
							required
						>{{ $company->description }}</textarea>
						</div>

						<div class="divider-primary divider">
            				<div class="divider-text">Additional Information</div>
          				</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="longitute">Location: longitute</label>
						<input type="text" class="form-control" value="{{ json_decode($company->json_data)->longitute }}" name="longitute" id="longitute"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="latitude">Location: latitude</label>
						<input type="text" class="form-control" value="{{ json_decode($company->json_data)->latitude }}" name="latitude" id="latitude"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="website">Website</label>
						<input type="text" class="form-control" value="{{ json_decode($company->json_data)->website }}" name="website" id="website"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="facebook">Facebook</label>
						<input type="text" class="form-control" value="{{ json_decode($company->json_data)->facebook }}" name="facebook" id="facebook"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="instagram">Instagram</label>
						<input type="text" class="form-control" name="instagram" value="{{ json_decode($company->json_data)->instagram }}" id="instagram"/>
						</div>

						 <div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="ceo_username">CEO's Username</label>
						@php
						if(!isset(json_decode($company->json_data)->ceo_username)){
							$json_data_ceo_username = "N/A";
						} else {
							$json_data_ceo_username = json_decode($company->json_data)->ceo_username;
						}
						@endphp
						<input type="text" class="form-control" name="ceo_username" value="{{ $json_data_ceo_username }}" id="ceo_username"/>
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
