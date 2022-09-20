
@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Founder Page Details')

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
          <h4 class="card-title">Edit Founder Details</h4>
        </div>
        <div class="card-body">



		@if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                </div>
            </div>
        @endif

		<div class="d-flex row mt-1 mr-1 mb-1">
			<img id="logoPreview" style="display: block; margin-left: auto; margin-right: auto;width: 30%; height: 30%;border-radius: 20%" src="/profile-images/{{$quote->imgSrc}}" height="200">
		</div>


          <form class="needs-validation" novalidate action="{{route('founder-update-api')}}" enctype="multipart/form-data" method="POST">
		  @csrf
				<div class="row">


						<div class="divider-primary divider">
            				<div class="divider-text">Basic Information</div>
          				</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="title-FounderDetails">Heading of The description</label>

						<input
							type="text"
							id="title-FounderDetails"
							name="title-FounderDetails"
							class="form-control"
							value ="{{$FounderDetails->title}}"
							placeholder="title-FounderDetails"
							aria-label="title-FounderDetails"
							aria-describedby="title-FounderDetails"
							required
						/>
						</div>


						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="logo">Founder Image (500 x 300) (.png .jpg .jpeg )</label>
						<input
							type="file"
							id="logo"
							name="image"
							class="form-control"
							onchange="loadFile(event)"
						/>
						</div>

						<div class="mb-1">
						<label class="d-block form-label" for="description-FounderDetail">About Founder (Description)</label>
						<textarea
							class="form-control"
							id="description-FounderDetail"
							name="description-FounderDetail"
							rows="3"
							required
						>{{$FounderDetails->description}}</textarea>
						</div>

						<div class="divider-primary divider">
            				<div class="divider-text">Header Information</div>
          				</div>

						<div class="mb-1 col-12">
						<label class="form-label" for="title-breadcrumb">Header Title</label>

						<input
							type="text"
							id="title-breadcrumb"
							name = "title-breadcrumb"
							class="form-control"
							value ="{{ $breadcrumb->pageTitle }}"
							aria-label="title-breadcrumb"
							aria-describedby="title-breadcrumb"
							required
						/>
						</div>

						<div class="mb-1">
						<label class="d-block form-label" for="pageDesc-breadcrumb"> Header Short Description</label>
						<textarea
							class="form-control"
							id="pageDesc-breadcrumb"
							name="pageDesc-breadcrumb"
							rows="3"
							required
						>{{ $breadcrumb->pageDesc }}</textarea>
						</div>





						<div class="divider-primary divider">
            				<div class="divider-text">Quotation Box Details</div>
          				</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="quote-cite">Citation</label>
						<input type="text" class="form-control" value="{{$quote->cite}}" name="quote-cite" id="quote-cite"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="quote-status">Designation</label>
						<input type="text" class="form-control" value="{{$quote->status}}" name="quote-status" id="quote-status"/>
						</div>

						<div class="mb-1">
						<label class="d-block form-label" for="quote-quote">Quote</label>
						<textarea
							class="form-control"
							id="quote-quote"
							name="quote-quote"
							rows="3"
							required
						>{{ $quote->quote }}</textarea>
						</div>

						<div class="divider-primary divider">
            				<div class="divider-text">Front Page Quotation</div>
          				</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="fpq-header">Header</label>
						<input type="text" class="form-control" value="{{$fquote->header}}" name="fpq[header]" id="fpq-header"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="fpq-name">Name</label>
						<input type="text" class="form-control" value="{{$fquote->name}}" name="fpq[name]" id="fpq-name"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="fpq-designation">Designation</label>
						<input type="text" class="form-control" value="{{$fquote->designation}}" name="fpq[designation]" id="fpq-designation"/>
						</div>
						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="fpq-ylink">Youtube</label>
						<input type="text" class="form-control" value="{{$fquote->ylink}}" name="fpq[ylink]" id="fpq-ylink"/>
						</div>

						<div class="mb-1">
						<label class="d-block form-label" for="fpq-quote">Quote</label>
						<textarea
							class="form-control"
							id="fpq-quote"
							name="fpq[quote]"
							rows="3"
							required
						>{{ $fquote->quote }}</textarea>
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
