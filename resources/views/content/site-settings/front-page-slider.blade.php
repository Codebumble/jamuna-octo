
@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Front Page Details')

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
          <h4 class="card-title">Add Slider Details</h4>
        </div>
        <div class="card-body">



		@if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                </div>
            </div>
        @endif

		<div class="col-xl-12 col-lg-12 col-md-12 order-0 order-md-1">
      <!-- User Pills -->
      <ul class="nav nav-pills mb-2">
        <li class="nav-item">
          <a class="nav-link" href="{{route('front_page_view')}}">
            <i data-feather="user" class="font-medium-3 me-50"></i>
            <span class="fw-bold">General Details</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('front_page_slider_view')}}">
            <i data-feather="lock" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Sliders</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('front_page_chairperson_view')}}">
            <i data-feather="bookmark" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Chairperson Speech</span>
          </a>
        </li>

      </ul>
	</div>



		<div class="divider-primary divider">
            				<div class="divider-text">Sliders Images</div>
          				</div>




          <form action="#" class="invoice-repeater">
            <div data-repeater-list="invoice">

				<div data-repeater-item>
					<div class="row d-flex align-items-end">

					<div class="col-md-2 col-12 mb-50">
						<div class="mb-1">
						<label class="form-label" for="itemcost">Image</label>
							<input type="file" name="slider"
							class="form-control" id="slider"accept="image/png, image/jpeg, .jpg"/>


						</div>
					</div>

					<div class="col-md-2 col-12 mb-50">
						<div class="mb-1">
						<label class="form-label" for="itemcost">Header</label>
						<input
							type="text"
							class="form-control"
							id="itemcost"
							value="Top Header"
							aria-describedby="itemcost"
							placeholder="32"
						/>
						</div>
					</div>

					<div class="col-md-2 col-12 mb-50">
						<div class="mb-1">
						<label class="form-label" for="itemquantity">Short Description</label>
						<input
							type="text"
							class="form-control"
							id="itemquantity"
							value="123asdfghj"
							aria-describedby="itemquantity"
							placeholder="1"
						/>
						</div>
					</div>

					<div class="col-md-2 col-12 mb-50">
						<div class="mb-1">
						<label class="form-label" for="staticprice">Button Text</label>
						<input type="text" value="Button" class="form-control" id="staticprice" />
						</div>
					</div>

					<div class="col-md-2 col-12 mb-50">
						<div class="mb-1">
						<label class="form-label" for="staticprice">Button URL</label>
						<input type="text" value="https://google.com/now" class="form-control" id="staticprice" />
						</div>
					</div>

					<div class="col-md-2 col-12 mb-50">
						<div class="mb-1">
						<button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
							<i data-feather="x" class="me-25"></i>
							<span>Delete</span>
						</button>
						</div>
					</div>



					</div>
					<hr />
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

	<div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Slider Details</h4>
        </div>
        <div class="card-body">


	<div class="invoice-repeater">
	<?php $counter=0; ?>
		@foreach ($imgs as $img)

			<div>

				<div>
					<div class="row d-flex align-items-end">

					<div class="col-md-2 col-12">
						<div class="mb-1">

							<label for="slider" style="display:block;">

							<img id="imagePreview_1" style="border-radius:6px;" src="{{$img->src}}" width="120" height="70">
						</label>
						</div>
					</div>

					<div class="col-md-2 col-12 mb-50">
						<div class="mb-1">
						<label class="form-label" for="itemcost">Header</label>
						<input
							type="text"
							class="form-control"
							id="itemcost"
							value="{{$img->heading}}"
							aria-describedby="itemcost"
							placeholder="32" readonly
						/>
						</div>
					</div>

					<div class="col-md-2 col-12 mb-50">
						<div class="mb-1">
						<label class="form-label" for="itemquantity">Short Description</label>
						<input
							type="text"
							class="form-control"
							id="itemquantity"
							value="{{$img->description}}"
							aria-describedby="itemquantity"
							placeholder="1" readonly
						/>
						</div>
					</div>

					<div class="col-md-2 col-12 mb-50">
						<div class="mb-1">
						<label class="form-label" for="staticprice">Button Text</label>
						<input type="text" value="{{$img->buttonText}}" class="form-control" id="staticprice" readonly
						/>
						</div>
					</div>

					<div class="col-md-2 col-12 mb-50">
						<div class="mb-1">
						<label class="form-label" for="staticprice">Button URL</label>
						<input type="text" value="{{$img->link}}" class="form-control" id="staticprice" readonly
						/>
						</div>
					</div>

					<div class="col-md-2 col-12 mb-50">
						<div class="mb-1">
						<button class="btn btn-outline-danger text-nowrap px-1" type="button" disabled data-repeater-delete onclick="deleted('{{$counter}}');">
							<i data-feather="x" class="me-25"></i>
							<span>Delete</span>
						</button>
						</div>
					</div>

					</div>
					<hr />
				</div>




            </div>
			<?php $counter +=1; ?>
		@endforeach




		</div>
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
  <script>
  var deleted= function(event) {
    console.log(event);

	var data = new FormData();
	var a= document.getElementByName('csrf-token').value;
data.append('_token', a);
console.log(document.getElementByName('csrf-token').value);
var xhr = new XMLHttpRequest();
xhr.open('GET', '/codebumble/delete-slider/'+event, true);
xhr.onload = function () {
    // do something to response
    if (this.status == 200) {
              location.reload();
            };
};
xhr.send(data);
  };
</script>

@endsection
