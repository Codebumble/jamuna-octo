
@extends('layouts/contentLayoutMaster')

@section('title', 'Add Products')

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
          <h4 class="card-title">Add New Products</h4>
        </div>
        <div class="card-body">



		@if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                </div>
            </div>
        @endif










          <form action="{{route('add_product')}}" class="invoice-repeater" enctype="multipart/form-data" method="POST">
		  @csrf
            <div data-repeater-list="new">
				<div data-repeater-item>

					<div class="row d-flex align-items-end">

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="name">Name</label>
								<input
									type="name"
									class="form-control"
									id="image"
									name="name"
									placeholder="T-shirt"
									aria-describedby="name" required
								/>
							</div>
						</div>

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="image">Product Image</label>
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
								<label class="form-label" for="minimum_order">Minimum Order</label>
								<input
									type="text"
									class="form-control"
									id="minimum_order"
									name="minimum_order"
									placeholder="7 lot in number Or 100 pis"
									aria-describedby="minimum_order" required
								/>
							</div>
						</div>

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="estimated_delivery">Estimated Delivery</label>
								<input
									type="text"
									class="form-control"
									id="estimated_delivery"
									name="estimated_delivery"
									placeholder="7-8 Days"
									aria-describedby="estimated_delivery" required
								/>
							</div>
						</div>

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="company">Under Company</label>
								<select class="form-select" name="company" id="company" required>

								@foreach($companies as $company)
							<option value="{{$company->name}}">{{$company->name}}</option>
								@endforeach

								</select>
							</div>
						</div>


						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="short_description">Short Description</label>
								<input
									type="text"
									class="form-control"
									id="short_description"
									name="short_description"
									placeholder="A future changing quality with Codebumble"
									aria-describedby="short_description"required
								/>
							</div>
						</div>

						<div class="col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="short_description">Long Description</label>
								<textarea
									class="form-control"
									id="description"
									name="description"
									placeholder="7-8 Days"
									aria-describedby="short_description"required
								></textarea>
							</div>
						</div>

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="price">Price</label>
								<input
									type="text"
									class="form-control"
									id="price"
									name="price"
									placeholder="509 /- tk per Item"
									aria-describedby="short_description"required
								/>
							</div>
						</div>

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="short_description">Stock</label>
								<select class="form-select" id="stock" name="stock" required>

								<option value="Available">Available </option>
								<option value="Out of Stock">Out of Stock</option>

								</select>
							</div>
						</div>



						<div class="col-md-6 col-12 mb-50">
						<div class="mb-1">
						<button class="btn btn-outline-danger text-nowrap px-1" type="button" data-repeater-delete >
							<i data-feather="x" class="me-25"></i>
							<span>Delete</span>
						</button>
						</div>
					</div>

					</div>
					<hr/>


				</div>

            </div>
            <div class="row">
              <div class="col-12">
                <button class="btn btn-icon btn-warning" type="button" data-repeater-create>
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add New</span>
                </button>
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
