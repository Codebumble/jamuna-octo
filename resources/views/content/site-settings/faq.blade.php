
@extends('layouts/contentLayoutMaster')

@section('title', 'FAQ')

@section('content')
<section class="form-control-repeater">
  <div class="row">
    <!-- Invoice repeater -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Faq Information</h4>
        </div>
        <div class="card-body">
        @if (isset($_GET['exist']))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                </div>
            </div>
        @endif

          <form action="{{route('faq-edit-api')}}" class="invoice-repeater" method="POST">
          @csrf
            <div data-repeater-list="new">
            @foreach ($data as $datam)

            <div data-repeater-item>
                <div class="row d-flex align-items-end">

                  <div class="col-12 mb-1">
                    <div class="mb-1">
                      <label class="form-label" for="itemname">Questions</label>
                      <input
                        type="text"
                        class="form-control"
						            name="title"
						            value="{{$datam->title}}"
                        aria-describedby="title"
                        placeholder="title"
                      />
                      <input type="hidden" name="readMore" value="false"/>
                    </div>
                  </div>

				        <div class="mb-1">
                  <label class="d-block form-label" for="validationBioBootstrap">Answer</label>
                    <textarea
                      class="form-control"
                      id="content"
                      name="content"
                      rows="3"
                      required
                    >{{$datam->content}}</textarea>
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

            @endforeach




            </div>
            <div class="row">
              <div class="col-12">
                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
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
    <!-- /Invoice repeater -->
  </div>
</section>
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-repeater-growth-story.js')) }}"></script>
@endsection
