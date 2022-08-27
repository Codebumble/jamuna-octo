
@extends('layouts/contentLayoutMaster')

@section('title', 'Add Event')

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
          <h4 class="card-title">Add New Event</h4>
        </div>
        <div class="card-body">



		@if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                </div>
            </div>
        @endif










          <form action="{{route('add_event')}}" class="invoice-repeater" enctype="multipart/form-data" method="POST">
		  @csrf
            <div data-repeater-list="new">
				<div data-repeater-item>

					<div class="row d-flex align-items-end">

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="name">Event Name</label>
								<input
									type="name"
									class="form-control"
									id="name"
									name="name"
									placeholder="Meeting is Going on!"
									aria-describedby="name" required
								/>
							</div>
						</div>

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="image">Event Image</label>
								<input
									type="file"
									class="form-control"
									id="image"
									name="image"
									aria-describedby="image"required
								/>
							</div>
						</div>

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="location">Location</label>
								<input
									type="text"
									class="form-control"
									id="location"
									name="location"
									placeholder="Dhaka, Bangladesh"
									aria-describedby="location" required
								/>
							</div>
						</div>

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="category">Category</label>
								<input
									type="text"
									class="form-control"
									id="category"
									name="category"
									placeholder="Event"
									value="Event"
									aria-describedby="event" required
								/>
							</div>
						</div>

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="time_data">Date</label>
								<input
									type="date"
									class="form-control"
									id="time_data"
									name="time_data"
									placeholder="mm/dd/yyyy"
									aria-describedby="time_data" required
								/>
							</div>
						</div>

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="company">Under Company</label>
								<select class="form-select" name="company" id="company" required>

								@foreach($companies as $company)
							<option value="{{$company->id}}">{{$company->name}}</option>
								@endforeach

								</select>
							</div>
						</div>


						<div class="mb-50">
							<div class="mb-1">
								<label class="form-label" for="detail">Description</label>
								<textarea
									type="text"
									class="form-control"
									id="detail"
									name="detail" required
								></textarea>
							</div>
						</div>


					</div>
					<hr/>


				</div>

            </div>
            <div class="row">
              <div class="col-12">
				        <button class="btn btn-icon btn-success m-1" type="submit">
                  <i data-feather="check" class="me-25"></i>
                  <span>Update</span>
                </button>
              </div>
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
  <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-validation-company-page.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-repeater-front-page.js')) }}"></script>


@endsection
