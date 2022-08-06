
@extends('layouts/contentLayoutMaster')

@section('title', 'Add Company')

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
          <h4 class="card-title">Insert Company Details</h4>
        </div>
        <div class="card-body">
          <form class="needs-validation" novalidate action="" enctype="multipart/form-data">
				<div class="row">
						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">Company Name</label>

						<input
							type="text"
							id="name"
							class="form-control"
							name="name"
							placeholder="Name"
							aria-label="Name"
							aria-describedby="name"
							required
						/>
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please enter your name.</div>
						</div>
						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="section">Section</label>
						<input
							type="text"
							id="section"
							class="form-control"
							name="section"
							placeholder="Media Section"
							aria-label="Media Section"
							required
						/>
						<div class="valid-feedback"></div>
						<div class="invalid-feedback"></div>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="support_email">Support Email</label>
						<input
							type="email"
							id="support_email"
							name="support_email"
							class="form-control"
							placeholder="support@codebumble.net"
							required
						/>
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please enter a valid email.</div>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="ceo_of_the_company">Name of The CEO</label>
						<input type="text" class="form-control picker" name="ceo_of_the_company" id="ceo_of_the_company" required />
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="address">Address</label>
						<input type="text" class="form-control picker" name="address" id="address" required />
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="establish_date">Establish Date</label>
						<input type="date" class="form-control picker" name="establish_date" id="establish_date" required />
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="support_phone_number">Support Phone Number</label>
						<input type="date" class="form-control picker" name="support_phone_number" id="support_phone_number" required />
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label for="image" class="form-label">Company Logo</label>
						<input class="form-control" type="file" id="image" required />
						</div>


						<div class="mb-1">
						<label class="d-block form-label" for="validationBioBootstrap">Company Discription</label>
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
						<label class="form-label" for="longitute">Location: longitute</label>
						<input type="text" class="form-control picker" name="longitute" id="longitute"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="latitude">Location: latitude</label>
						<input type="text" class="form-control picker" name="latitude" id="latitude"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="website">Website</label>
						<input type="text" class="form-control picker" name="website" id="website"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="facebook">Facebook</label>
						<input type="text" class="form-control picker" name="facebook" id="facebook"/>
						</div>

						<div class="mb-1 col-12">
						<label class="form-label" for="instagram">Instagram</label>
						<input type="text" class="form-control picker" name="instagram" id="instagram"/>
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
  <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>
@endsection
