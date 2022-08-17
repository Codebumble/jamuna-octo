
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
          <h4 class="card-title">Edit Chairperson Details</h4>
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
          <a class="nav-link" href="{{route('front_page_slider_view')}}">
            <i data-feather="lock" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Sliders</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('front_page_chairperson_view')}}">
            <i data-feather="bookmark" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Chairperson Speech</span>
          </a>
        </li>

      </ul>
	</div>



		<div class="divider-primary divider">
            				<div class="divider-text">Chairperson Image</div>
          				</div>


		<form method="POST" enctype="multipart/form-data" action="{{ route('front_page_chairperson_api')}}">
            @csrf
              <input type="file" name="image" id="profile_image" style="display:none;" accept="image/png, image/jpeg, .jpg" onchange="loadFile(event)"/>
                <label for="profile_image" style="display:block;">

				  <img id="imagePreview" style="display: block; margin-left: auto; margin-right: auto;width: 20%;border-radius:6px; object-fit: cover;" src="{{$sph->imgSrc}}" width="250" height="300">
                </label>
              

		  <div class="divider-primary divider">
            				<div class="divider-text">Speech Details</div>
          				</div>
		  @csrf
				<div class="row">
						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="title">Title</label>

						<input
							type="text"
							id="title"
							name="title"
							class="form-control"
							value ="{{$sph->title}}"
							placeholder="title"
							aria-label="Name"
							aria-describedby="name"
							required
						/>
						</div>

						<div class="mb-1">
						<label class="d-block form-label" for="validationBioBootstrap">Speech of The Chairperson</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="description"
							rows="3"
							required
						>{{$sph->description}}</textarea>
						</div>


				</div>
				<div class="col-12 text-center mt-2 pt-50">
            		<button type="submit" class="btn btn-primary" >Update</button>
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
    var output = document.getElementById('imagePreview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
@endsection
