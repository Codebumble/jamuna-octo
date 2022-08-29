
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

						/>
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please enter a valid email.</div>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="ceo_of_the_company">Name of The CEO</label>
						<input type="text" class="form-control" value="{{ json_decode($company->json_data)->ceo_of_the_company }}" name="ceo_of_the_company" id="ceo_of_the_company" />
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please enter a valid CEO Name.</div>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="address">Address</label>
						<input type="text" class="form-control" value="{{ json_decode($company->json_data)->address }}" name="address" id="address"  />
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please enter a valid Address.</div>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="establish_date">Establish Date</label>
						<input type="date" class="form-control picker" value="{{ $company->establish_date }}" name="establish_date" id="establish_date"  />
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="products">Products</label>
						<input type="text" class="form-control" name="products" value="{{ $company->products }}" id="products" />
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="production_cap">Production Capacity</label>
						<input type="text" class="form-control" name="production-cap" value="{{ $company->production_cap }}" id="production_cap"  />
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="manpower">Man Power</label>
						<input type="number" class="form-control" name="manpower" value="{{ $company->manpower }}" id="manpower"  />
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="support_phone_number">Support Phone Number</label>
						<input type="text" class="form-control" value="{{ json_decode($company->json_data)->support_phone_number }}" name="support_phone_number" id="support_phone_number"  />
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label for="image" class="form-label">Company Logo</label>
						<input class="form-control" type="file" id="image" name="image"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label for="dfile" class="form-label">Document</label>
						<input class="form-control" type="file" id="dfile" name="dfile"  />
						</div>

						<div class="mb-1 col-12 col-md-6" x-data="{ count: 0 }" x-init="count = $refs.countme.value.length">
						<label class="form-label" for="short-details">Short Details (It will be placed top of the page after the page title.)</label>
						<textarea rows="1" class="form-control" name="short-details" id="short-details" maxlength="200" x-ref="countme" x-on:keyup="count = $refs.countme.value.length" >{{ $company->short_details }}</textarea>
						<span x-html="count"></span> / <span x-html="$refs.countme.maxLength"></span>
						</div>


						<div class="mb-1">
						<label class="d-block form-label" for="validationBioBootstrap">Company Discription</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="description"
							rows="3"

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
						<input type="text" class="form-control" value="{{ json_decode($company->json_data)->website }}" name="website" id="website" />
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
						<label class="form-label" for="linkedin">Linkedin</label>
						<input type="text" class="form-control" name="linkedin" value="{{ json_decode($company->json_data)->linkedin }}" id="linkedin"/>
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

						<div class="mb-1 col-12 col-md-6 mt-2">
                    	<div class="form-check form-check-secondary">
                      	<input type="checkbox" class="form-check-input" id="new_center" name="new_center" value="yes"
						@if(isset(json_decode($company->json_data)->new_center) && json_decode($company->json_data)->new_center == "yes")
						checked
						@endif

						/>
                      	<label class="form-check-label" for="new_center">Add as New Center</label>
                    	</div>
                  		</div>
						@php

						$dn = "";

						if(!isset(json_decode($company->json_data)->new_center) || json_decode($company->json_data)->new_center == "no"){
							$dn = "d-none";

						}


						@endphp

						<div class="mb-1 col-12 col-md-6 {{$dn}}" id="yv_link">
						<label class="form-label" for="yv_link">Youtube Video Link</label>
						<input type="text" class="form-control" name="yv_link"
						@if(!isset(json_decode($company->json_data)->new_center) || json_decode($company->json_data)->new_center == "no")
						value=""
						@else
						value="{{json_decode($company->json_data)->yv_link}}"
						@endif

						/>
						</div>

						<div class="mb-1 col-12 col-md-6 {{$dn}}" id="p_header">
						<label class="form-label" for="p_header">Page Header</label>
						<input type="text" class="form-control" name="p_header"
						@if(!isset(json_decode($company->json_data)->new_center) || json_decode($company->json_data)->new_center == "no")
						value=""
						@else
						value="{{json_decode($company->json_data)->p_header}}"
						@endif
						/>
						</div>

						<div class="mb-1 col-12 col-md-6 {{$dn}}" id="ct_title">
						<label class="form-label" for="ct_title">Correspondence Title</label>
						<input type="text" class="form-control" name="ct_title"
						@if(!isset(json_decode($company->json_data)->new_center) || json_decode($company->json_data)->new_center == "no")
						value=""
						@else
						value="{{json_decode($company->json_data)->ct_title}}"
						@endif
						/>
						</div>

						<div class="mb-1 col-12 col-md-6 {{$dn}}" id="ct_desc">
						<label class="form-label" for="ct_desc">Correspondence Description</label>
						<input type="text" class="form-control" name="ct_desc"
						@if(!isset(json_decode($company->json_data)->new_center) || json_decode($company->json_data)->new_center == "no")
						value=""
						@else
						value="{{json_decode($company->json_data)->ct_desc}}"
						@endif
						/>
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

	<div class="divider-primary divider">
            <div class="divider-text">Uploaded Image</div>
        </div>

        <div class="col-12">

            <div class="row match-height">
                @php
                    $counter = 0;
                @endphp

                @foreach ($imgs as $value)
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img-top" style="height: 15rem; object-fit: cover; max-width: 100%"
                                src="{{ asset($value->src) }}" alt="{{$value->name}}" />

                            <div class="card-body">

                                <a href="{{ route('delete_company_image', ['id' => $counter, 'company_id' => $company->id]) }}"
                                    class="btn btn-outline-danger col-md-6">Delete</a>
                            </div>
                        </div>
                    </div>

                    @php
                        $counter += 1;
                    @endphp
                @endforeach



            </div>

        </div>

    <!-- jQuery Validation -->

    <!-- /jQuery Validation -->

</section>
<!-- /Validation -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('js/app.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-validation-company-page.js')) }}"></script>
  <script>

  const checkbox = document.getElementById('new_center')
  const yt_link = document.getElementById('yv_link')
  const p_header = document.getElementById('p_header')
  const ct_title = document.getElementById('ct_title')
  const ct_desc = document.getElementById('ct_desc')


	checkbox.addEventListener('change', (event) => {
	if (event.currentTarget.checked) {
		yt_link.classList.remove("d-none");
		p_header.classList.remove("d-none");
		ct_title.classList.remove("d-none");
		ct_desc.classList.remove("d-none");
	} else {
		yt_link.classList.add("d-none");
		p_header.classList.add("d-none");
		ct_title.classList.add("d-none");
		ct_desc.classList.add("d-none");
	}
	})



  </script>
@endsection
