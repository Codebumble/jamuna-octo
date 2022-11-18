
@extends('layouts/contentLayoutMaster')

@section('title', 'Edit This Event')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap" rel="stylesheet">
@endsection

@section('content')
<!-- Validation -->
<section class="bs-validation">
    <!-- Bootstrap Validation -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit This Event</h4>
        </div>
        <div class="card-body">



		@if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                </div>
            </div>
        @endif










          <form action="{{route('edit_event', ['id' => $d->id])}}" class="invoice-repeater" enctype="multipart/form-data" method="POST" id="event-edit">
		  @csrf
            <div data-repeater-list="new">
				<div data-repeater-item>

					<div class="row d-flex align-items-end">

						<div class="col-md-6 col-12 mb-50">
							<div class="mb-1">
								<label class="form-label" for="name">Event Name</label>
								<input type="hidden" name="id" value="{{$d->id}}"/>
								<input
									type="name"
									class="form-control"
									id="name"
									name="name"
									value="{{$d->name}}"
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
									aria-describedby="image"
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
									value="{{$d->location}}"
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
									value="{{$d->category}}"
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
									value="{{$d->time_data}}"
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
								@if( $company->id == $d->company)
									<option value="{{$company->id}}" selected>{{$company->name}}</option>
								@else
									<option value="{{$company->id}}" selected>{{$company->name}}</option>
								@endif
								@endforeach

								</select>
							</div>
						</div>


						<div class="mb-1">
							<div class="col-sm-12">
								<label class="form-label" for="description">Description</label>
									<div id="full-wrapper">
										<div id="full-container">
											<div class="editor" id="ql-editor" spellcheck="false">
												{!!$d->detail!!}
											</div>

										</div>
									</div>
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

  <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-validation-company-page.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-repeater-front-page.js')) }}"></script>

  <script>
	(function (window, document, $) {
		'use strict';

		var Font = Quill.import('formats/font');
		Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
		Quill.register(Font, true);

		// Bubble Editor



		// Snow Editor



		// Full Editor



		var fullEditor = new Quill('#full-container .editor', {
		  bounds: '#full-container .editor',
		  modules: {
			formula: true,
			syntax: true,
			toolbar: [
			  [
				{
				  font: []
				},
				{
				  size: []
				}
			  ],
			  ['bold', 'italic', 'underline', 'strike'],
			  [
				{
				  color: []
				},
				{
				  background: []
				}
			  ],
			  [
				{
				  script: 'super'
				},
				{
				  script: 'sub'
				}
			  ],
			  [
				{
				  header: '1'
				},
				{
				  header: '2'
				},
				'blockquote',
				'code-block'
			  ],
			  [
				{
				  list: 'ordered'
				},
				{
				  list: 'bullet'
				},
				{
				  indent: '-1'
				},
				{
				  indent: '+1'
				}
			  ],
			  [
				'direction',
				{
				  align: []
				}
			  ],
			  ['link', 'image', 'video', 'formula'],
			  ['clean']
			]
		  },
		  theme: 'snow'
		});

		$("#event-edit").on("submit", function () {
			var hvalue = $('#ql-editor').html();
			$(this).append("<textarea name='new[0][detail]' style='display:none' spellcheck='false'>"+fullEditor.root.innerHTML.trim()+"</textarea>");

		   });



		var editors = [fullEditor];
	  })(window, document, jQuery);





	   </script>


@endsection
