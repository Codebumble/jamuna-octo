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


                    <div class="divider-primary divider">
                        <div class="divider-text">Chairperson Image</div>
                    </div>


                    <form method="POST" enctype="multipart/form-data" action="{{ route('front_page_chairperson_api') }}">
                        @csrf
                        <input id="profile_image" type="file" name="image" style="display:none;"
                            accept="image/png, image/jpeg, .jpg" onchange="loadFile(event)" />
                        <label for="profile_image" style="display:block;">

                            <img id="imagePreview"
                                style="display: block; margin-left: auto; margin-right: auto;width: 20%;border-radius:6px; object-fit: cover;"
                                src="{{ $sph->imgSrc }}" width="250" height="300">
                        </label>


                        <div class="divider-primary divider">
                            <div class="divider-text">Speech Details</div>
                        </div>
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="title">Title</label>

                                <input id="title" type="text" name="title" class="form-control"
                                    value="{{ $sph->title }}" placeholder="title" aria-label="Name"
                                    aria-describedby="name" required />
                            </div>

                            <div class="mb-1">
                                <label class="d-block form-label" for="validationBioBootstrap">Speech of The
                                    Chairperson</label>
                                <textarea id="validationBioBootstrap" class="form-control" name="description" rows="3" required>{{ $sph->description }}</textarea>
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
