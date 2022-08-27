
@extends('layouts/contentLayoutMaster')

@section('title', 'Post A Job')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">

  <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap" rel="stylesheet">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
@endsection

@section('content')
<!-- Validation -->
<section class="bs-validation">
    <!-- Bootstrap Validation -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Post A Job</h4>
        </div>
        <div class="card-body">



		@if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                </div>
            </div>
        @endif





          <form class="needs-validation" novalidate action="{{route('add_new_job')}}" enctype="multipart/form-data" id="job-post" method="POST">
		  @csrf
				<div class="row">
						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="name">Job Name</label>

						<input
							type="text"
							id="name"
							name="new[name]"
							class="form-control"
							aria-label="Name"
							aria-describedby="name"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="company">Company Name</label>

						<select class="form-select" name="new[company]" id="company" required>

								@foreach($companies as $company)
							<option value="{{$company->name}}">{{$company->name}}</option>
								@endforeach

								</select>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="sector">Job Sector</label>

						<select class="form-select" name="new[sector]" id="sector" required>

								@foreach($categories as $category)
							<option value="{{$category->name}}">{{$category->name}}</option>
								@endforeach

								</select>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="s_description">Short Description</label>

						<input
							type="text"
							id="name"
							name="new[s_description]"
							class="form-control"
							aria-label="s_description"
							aria-describedby="s_description"
							required
						/>
						</div>


						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="backgroud_poster">Background Poster</label>
						<input
							type="file"
							id="logo"
							name="new[b_image]"
							class="form-control"
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="a_information">Essential Information & Instruction (.pdf .docx)</label>
						<input
							type="file"
							id="a_information"
							name="new[a_information]"
							class="form-control"
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="age">Age</label>

						<input
							type="text"
							id="siteUrl"
							name = "new[age]"
							class="form-control"
							aria-label="age"
							aria-describedby="siteUrl"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="me_req">Educational Requirement (Minimum)</label>

						<input
							type="text"
							id="me_req"
							name = "new[me_req]"
							class="form-control"
							aria-label="me_req"
							aria-describedby="siteUrl"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="gender">Gender</label>

						<select class="form-select" name="new[gender]">
							<option value="Male"> Male Only </option>
							<option value="Women"> Women Only </option>
							<option value="Anyone Can Apply"> Anyone Can Apply </option>
						</select>
						</div>


						<div class="mb-1">
						<div class="col-sm-12">
						<label class="form-label" for="description">Description</label>
							<div id="full-wrapper">
								<div id="full-container">
									<div class="editor" id="ql-editor" spellcheck="false">
									</div>

								</div>
							</div>
							</div>
						</div>





						<div class="divider-primary divider">
            				<div class="divider-text">Additional Information</div>
          				</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="salary">Salary</label>
						<input type="text" class="form-control"  name="new[salary]" id="salary"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="min_expo">Experience (Minimum)</label>
						<input type="text" class="form-control"  name="new[min_expo]" id="min_expo"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="emp_type">Employment Type</label>
						<select id="emp_type" name="new[emp_type]" class="form-select">
							<option value="part-time">Part Time</option>
							<option value="full-time">Full Time</option>
						</select>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="w_location">Working Location</label>
						<input type="text" class="form-control"  name="new[w_location]" id="w_location"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="h_number">Helpline Number</label>
						<input type="text" class="form-control"  name="new[h_number]" id="h_number"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="h_email">Helpline Email</label>
						<input type="text" class="form-control" name="new[h_email]" id="h_email"/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="linkedin">Last Date of Application</label>
						<input type="date" class="form-control" name="new[l_date]" id="linkedin" required/>
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
  <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-validation-job-page.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/job-post-quill.js')) }}"></script>

@endsection
