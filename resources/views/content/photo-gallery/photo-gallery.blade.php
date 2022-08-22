
@extends('layouts/contentLayoutMaster')

@section('title', 'Gallery - Image Uploader')

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
          <h4 class="card-title">Gallery Images</h4>
        </div>
        <div class="card-body">



		@if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                </div>
            </div>
        @endif










          <form action="{{route('add_gallery_photo')}}" class="invoice-repeater" enctype="multipart/form-data" method="POST">
		  @csrf
            <div data-repeater-list="new">
				<div data-repeater-item>

					<div class="row d-flex align-items-end">

						<div class="col-md-6 col-6 mb-50">
							<div class="mb-1">
								<label class="form-label" for="itemcost">Image</label>
								<input
									type="file"
									class="form-control"
									id="image"
									name="image"
									aria-describedby="image"
									placeholder="32" required
								/>
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
        <img class="card-img-top" src="{{asset($value->src)}}" alt="Card image cap" />
        <div class="card-body">

          <a href="{{route('delete_gallery_image', ['id' => $counter])}}" class="btn btn-outline-danger col-md-6">Delete</a>
        </div>
      </div>
    </div>

    @php
      $counter +=1;
    @endphp

  @endforeach



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
var xhr = new XMLHttpRequest();
xhr.open('GET', '/codebumble/delete-gallery-image/'+event, true);
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
