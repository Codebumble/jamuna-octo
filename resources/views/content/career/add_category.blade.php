@extends('layouts/contentLayoutMaster')

@section('title', 'Add Category')

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
                    <h4 class="card-title">Insert Category Details</h4>
                </div>
                <div class="card-body">
                    @if (isset($_GET['exist']))
                        <div class="demo-spacing-0 mb-2">
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body"><strong>Section Name Already Exist. Please Try Something
                                        Unique.</strong></div>
                            </div>
                        </div>
                    @endif

                    @if (isset($_GET['status']))
                        <div class="demo-spacing-0 mb-2">
                            <div class="alert alert-success" role="alert">
                                <div class="alert-body"><strong>Congratulation ! Section Added to the Server.</strong></div>
                            </div>
                        </div>
                    @endif
                    <form class="needs-validation" novalidate action="{{ route('add_new_category') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="name">Category Name</label>

                                <input id="name" type="text" class="form-control" name="name" placeholder="Name"
                                    aria-label="Name" aria-describedby="name" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter your name.</div>
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="select2-icons">Category Icon</label>

                                <input id="icon" type="text" class="form-control" name="icon"
                                    placeholder="fab fa-facebook" aria-label="icon" aria-describedby="icon" required />


                            </div>




                        </div>
                        <div class="col-12 pt-50 mt-2 text-center">
                            <a class="btn btn-warning me-2" href="https://fontawesome.com/v5/search" target="_blank">Icon
                                List</a>
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
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-validation-section-page.js')) }}"></script>

@endsection
