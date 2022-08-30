@extends('layouts/contentLayoutMaster')

@section('title', 'Meta Settings')

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
                    <h4 class="card-title">Meta Settings</h4>
                </div>
                <div class="card-body">



                    @if (isset($_GET['exist']))
                        <div class="demo-spacing-0 mb-2">
                            <div class="alert alert-warning" role="alert">
                                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                            </div>
                        </div>
                    @endif

                    <form class="needs-validation" novalidate action="{{ route('meta-settings-api') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="bod-title">Title</label>

                                <input id="bod-title" type="text" name="bod-title" class="form-control" value=""
                                    placeholder="Title" aria-label="bod-title" aria-describedby="title" />
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="bod-title">Social Sharing Image URL</label>

                                <input id="bod-title" type="text" name="bod-title" class="form-control" value=""
                                    placeholder="Social Sharing Image URL" aria-label="sharing-title"
                                    aria-describedby="sharing-image" />
                            </div>

                            <div class="mb-1">
                                <label class="d-block form-label" for="description">Short Description</label>
                                <textarea id="validationBioBootstrap" class="form-control" name="description" rows="3"></textarea>
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
@endsection
