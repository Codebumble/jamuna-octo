
@extends('layouts/contentLayoutMaster')

@section('title', 'Post A Tender')

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
          <h4 class="card-title">Post A Tender</h4>
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
						<label class="form-label" for="name">Tender Name/Title</label>

						<input
							type="text"
							id="title"
							name="new[title]"
							class="form-control"
							aria-label="title"
							aria-describedby="title"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="company">Company Name</label>

						<select class="form-select" name="new[comp_name]" id="company" required>

								@foreach($companies as $company)
							<option value="{{$company->name}}">{{$company->name}}</option>
								@endforeach

								</select>
						</div>

					<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="s_description">Location</label>

						<input
							type="text"
							id="name"
							name="new[location]"
							class="form-control"
							aria-label="location"
							aria-describedby="location"
							required
						/>
						</div>



						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="s_description">Tender Ref. No.</label>

						<input
							type="text"
							id="name"
							name="new[ref_no]"
							class="form-control"
							aria-label="ref_no"
							aria-describedby="ref_no"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="proc_method">Procurement Method</label>

						<input
							type="text"
							id="proc_method"
							name="new[proc_method]"
							class="form-control"
							aria-label="proc_method"
							aria-describedby="proc_method"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="work_name">Work Name</label>

						<input
							type="text"
							id="work_name"
							name = "new[work_name]"
							class="form-control"
							aria-label="work_name"
							aria-describedby="work_name"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="me_req">Address</label>

						<input
							type="text"
							id="address"
							name = "new[address]"
							class="form-control"
							aria-label="address"
							aria-describedby="address"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="publish_date">Publication Date</label>

						<input
							type="date"
							id="publish_date"
							name = "new[publish_date]"
							class="form-control"
							aria-label="publish_date"
							aria-describedby="publish_date"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="last_date">Last Selling Date</label>

						<input
							type="date"
							id="last_date"
							name = "new[last_date]"
							class="form-control"
							aria-label="last_date"
							aria-describedby="last_date"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="crdt">Closing and Receiving Date and Time</label>

						<input
							type="text"
							id="crdt"
							name = "new[crdt]"
							class="form-control"
							aria-label="crdt"
							aria-describedby="crdt"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="crdt">Pre-Tender Meeting</label>

						<input
							type="text"
							id="pre_t_meeting"
							name = "new[pre_t_meeting]"
							class="form-control"
							aria-label="pre_t_meeting"
							aria-describedby="pre_t_meeting"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="t_open_date">Tender Opening Date and Time</label>

						<input
							type="text"
							id="t_open_date"
							name = "new[t_open_date]"
							class="form-control"
							aria-label="t_open_date"
							aria-describedby="t_open_date"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="t_open_date">Location of Supply/Works</label>

						<input
							type="text"
							id="supply_location"
							name = "new[supply_location]"
							class="form-control"
							aria-label="supply_location"
							aria-describedby="supply_location"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="schedule_submission">Schedule Submission At</label>

						<input
							type="text"
							id="schedule_submission"
							name = "new[schedule_submission]"
							class="form-control"
							aria-label="schedule_submission"
							aria-describedby="schedule_submission"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="schedule_submission">Source of Fund</label>

						<input
							type="text"
							id="fund_source"
							name = "new[fund_source]"
							class="form-control"
							aria-label="fund_source"
							aria-describedby="fund_source"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="schedule_submission">Price of Schedule</label>

						<input
							type="text"
							id="price_schedule"
							name = "new[price_schedule]"
							class="form-control"
							aria-label="price_schedule"
							aria-describedby="price_schedule"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="security_amount">Tender Security Amount</label>

						<input
							type="text"
							id="price_schedule"
							name = "new[security_amount]"
							class="form-control"
							aria-label="security_amount"
							aria-describedby="security_amount"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="req_time">Time Required For Completion</label>

						<input
							type="text"
							id="price_schedule"
							name = "new[req_time]"
							class="form-control"
							aria-label="req_time"
							aria-describedby="req_time"
							required
						/>
						</div>

						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="req_time">Attachment </label>

						<input
							type="text"
							id="price_schedule"
							name = "new[req_time]"
							class="form-control"
							aria-label="req_time"
							aria-describedby="req_time"
							required
						/>
						</div>


						<div class="mb-1 col-12 col-md-6">
						<label class="form-label" for="req_time">Package Details</label>

						<input
							type="hidden"
							name = "new[package_details]"
							value=""
							id="package_details"
							required
						/>

						<input
							type="file"
							id="package_uploader"
							class="form-control"
							required
						/>
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
  <script>
  
  </script>

@endsection
