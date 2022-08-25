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
                    <h4 class="card-title">Edit Front Page Details</h4>
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
                                <a class="nav-link active" href="{{ route('front_page_view') }}">
                                    <i data-feather="user" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">General Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front_page_slider_view') }}">
                                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Sliders</span>
                                </a>
                            </li>

                        </ul>
                    </div>


                    <form class="needs-validation" novalidate action="{{ route('front_page_api') }}"
                        enctype="multipart/form-data" method="POST">

                        <div class="divider-primary divider">
                            <div class="divider-text">Concern Details</div>
                        </div>
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="cn-title">Title</label>

                                <input id="cn-title" type="text" name="cn-title" class="form-control"
                                    value="{{ $concern->heading }}" placeholder="cn-title" aria-label="cn-title"
                                    aria-describedby="cn-title" required />
                            </div>

                            <div class="mb-1">
                                <label class="d-block form-label" for="validationBioBootstrap">Description</label>
                                <textarea id="validationBioBootstrap" class="form-control" name="cn-description" rows="3" required>{{ $concern->description }}</textarea>
                            </div>





                            <div class="divider-primary divider">
                                <div class="divider-text">About Our Business Section</div>
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="d-block form-label" for="s-title">Title</label>
                                <input id="s-title" type="text" name="s-title" class="form-control"
                                    value="{{ $short->title }}" placeholder="s-title" aria-label="s-title"
                                    aria-describedby="s-title" required />
                            </div>

                            <div class="mb-1">
                                <label class="d-block form-label" for="s-description">Description</label>
                                <textarea id="validationBioBootstrap" class="form-control" name="s-description" rows="3" required>{{ $short->description }}</textarea>
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="d-block form-label" for="s-lt">Button Text</label>
                                <input id="s-lt" type="text" name="s-lt" class="form-control"
                                    value="{{ $short->linkText }}" placeholder="s-lt" aria-label="s-lt"
                                    aria-describedby="s-lt" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="d-block form-label" for="validationBioBootstrap">Button link</label>
                                <input id="s-l" type="text" name="s-l" class="form-control"
                                    value="{{ $short->link }}" placeholder="s-l" aria-label="s-l" aria-describedby="s-l"
                                    required />
                            </div>


                        </div>
                        <div class="col-12 pt-50 mt-2 text-center">
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
