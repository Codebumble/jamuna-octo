
@extends('layouts/contentLayoutMaster')

@section('title', 'Edit This Product')

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
          <h4 class="card-title">Edit This Product: <b>{{$data->name}}</b></h4>
        </div>
        <div class="card-body">



		@if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                </div>
            </div>
        @endif










          <form action="{{route('edit_product', ['id'=> $data->id])}}" class="invoice-repeater" enctype="multipart/form-data" method="POST">
		  @csrf
            <div data-repeater-list="new">
				<div data-repeater-item>

					<div class="row d-flex align-items-end">

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="name">Name</label>
								<input type="hidden" value="{{$data->id}}" name="id"/>
								<input
									type="name"
									class="form-control"
									id="image"
									name="name"
									value="{{$data->name}}"
									placeholder="T-shirt"
									aria-describedby="name" readonly
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
									aria-describedby="image"
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
									value="{{$data->minimum_order}}"
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
									value="{{$data->estimated_delivery}}"
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
								@if($company->name == $data->company)
									<option value="{{$company->name}}" selected>{{$company->name}}</option>
								@else
									<option value="{{$company->name}}">{{$company->name}}</option>
								@endif
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
									value="{{$data->short_description}}"
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
								>{{$data->short_description}}</textarea>
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
									value="{{$data->price}}"
									placeholder="৳ 509 /-"
									aria-describedby="short_description"required
								/>
							</div>
						</div>

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="short_description">Stock</label>
								<select class="form-select" id="stock" name="stock" required>
								@php
								$b ="";
								$c="";
								if($data->stock == "Available"){
									$b = "selected";
								} else {
									$c = "selected";
								}

								@endphp
								<option value="Available" {{$b}}>Available </option>
								<option value="Out of Stock" {{$c}}>Out of Stock</option>

								</select>
							</div>
						</div>

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="type">URL</label>
								<select class="form-select" id="type" name="type" required>

								@php
								$d ="";
								$e="";
								if(json_decode($data->json_data)->type == "Default"){
									$d = "selected";
								} else {
									$e = "selected";
								}

								@endphp

								<option value="Default" {{$d}}>Default </option>
								<option value="Custom URL" {{$e}}>Custom URL</option>

								</select>
							</div>
						</div>

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="link">Custom Link</label>
								<input
									type="text"
									class="form-control"
									id="link"
									name="link"
									value="{{json_decode($data->json_data)->custom_url}}"
									placeholder="https://google.com"
									aria-describedby="link"
								/>
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
