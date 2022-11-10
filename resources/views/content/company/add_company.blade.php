@extends('layouts/contentLayoutMaster')

@section('title', 'Add Company')

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
                    <h4 class="card-title">Insert Company Details</h4>
                </div>
                <div class="card-body">
                    @if (isset($_GET['status']))
                        <div class="demo-spacing-0 mb-2">
                            <div class="alert alert-success" role="alert">
                                <div class="alert-body"><strong>Congratulation ! Company Added to the Server.</strong></div>
                            </div>
                        </div>
                    @endif

                    @if (isset($_GET['exist']))
                        <div class="demo-spacing-0 mb-2">
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body"><strong>Company Name Already Exist. Please Try to Edit That or
                                        Delete to Create a New.</strong></div>
                            </div>
                        </div>
                    @endif


                    <form class="needs-validation" novalidate action="{{ route('add-company-api') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="name">Company Name</label>

                                <input id="name" type="text" class="form-control" name="name" placeholder="Name"
                                    aria-label="Name" aria-describedby="name" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter company name.</div>
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="section">Section</label>
                                <select id="section" class="select2 form-control" name="section">
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->name }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="support_email">Support Email</label>
                                <input id="support_email" type="email" name="support_email" class="form-control"
                                    placeholder="support@codebumble.net" />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a valid email.</div>
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="ceo_of_the_company">Director Name</label>
                                <input id="ceo_of_the_company" type="text" class="form-control"
                                    name="ceo_of_the_company" />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a valid Director Name.</div>
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="address">Address</label>
                                <input id="address" type="text" class="form-control" name="address" />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a valid Address.</div>
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="establish_date">Establish Date</label>
                                <input id="establish_date" type="date" class="form-control picker"
                                    name="establish_date" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="products">Products</label>
                                <input id="products" type="text" class="form-control" name="products" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="production-cap">Production Capacity</label>
                                <input id="production-cap" type="text" class="form-control" name="production-cap" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="manpower">Man Power</label>
                                <input id="manpower" type="number" class="form-control" name="manpower" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="support_phone_number">Support Phone Number</label>
                                <input id="support_phone_number" type="text" class="form-control"
                                    name="support_phone_number" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label for="image" class="form-label">Company Logo</label>
                                <input id="image" class="form-control" type="file" name="image" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label for="dfile" class="form-label">Document/Attachment</label>
                                <input id="dfile" class="form-control" type="file" name="dfile" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label for="featured_image" class="form-label">Image That Featured The Company</label>
                                <input id="featured_image" class="form-control" type="file" name="featured_image" />
                            </div>

                            <div class="mb-1">
                                <label class="d-block form-label" for="validationBioBootstrap">About this Business</label>
                                <textarea id="validationBioBootstrap" class="form-control" name="description" rows="3" required></textarea>
                            </div>

                            <div class="divider-primary divider">
                                <div class="divider-text">Additional Information</div>
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="latitude">Location: latitude</label>
                                <input id="latitude" type="text" class="form-control" name="latitude" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="longitute">Location: longitute</label>
                                <input id="longitute" type="text" class="form-control" name="longitute" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="website">Website</label>
                                <input id="website" type="text" class="form-control" name="website"
                                    placeholder="codebumble.net" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="facebook">Facebook</label>
                                <input id="facebook" type="text" class="form-control" name="facebook"
                                    placeholder="facebook.com/codebumble" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="instagram">Instagram</label>
                                <input id="instagram" type="text" class="form-control" name="instagram"
                                    placeholder="instagram.com/codebumble" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="linkedin">Linkedin</label>
                                <input id="linkedin" type="text" class="form-control" name="linkedin"
                                    placeholder="linkedin.com/company/codebumble" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="ceo_username">Director's Username</label>
                                <input id="ceo_username" type="text" class="form-control" name="ceo_username" />
                            </div>

                            <div class="col-12 col-md-6 mb-1 mt-2">
                                <div class="form-check form-check-secondary">
                                    <input id="new_center" type="checkbox" class="form-check-input" name="new_center"
                                        value="yes" />
                                    <label class="form-check-label" for="new_center">Add as New Center</label>
                                </div>
                            </div>

                            <div id="yv_link" class="col-12 col-md-6 d-none mb-1">
                                <label class="form-label" for="yv_link">Youtube Video Link</label>
                                <input type="text" class="form-control" name="yv_link" />
                            </div>

                            <div id="p_header" class="col-12 col-md-6 d-none mb-1">
                                <label class="form-label" for="p_header">Page Header</label>
                                <input type="text" class="form-control" name="p_header" />
                            </div>

                            <div id="ct_title" class="col-12 col-md-6 d-none mb-1">
                                <label class="form-label" for="ct_title">Correspondence Title</label>
                                <input type="text" class="form-control" name="ct_title" />
                            </div>

                            <div id="ct_desc" class="col-12 col-md-6 d-none mb-1">
                                <label class="form-label" for="ct_desc">Correspondence Description</label>
                                <input type="text" class="form-control" name="ct_desc" />
                            </div>

                        </div>
                        <div class="col-12 pt-50 mt-2 text-center">
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
    <script src="{{ asset(mix('js/scripts/forms/form-validation-company-page.js')) }}"></script>
    <script>
        const checkbox = document.getElementById('new_center')
        const yt_link = document.getElementById('yv_link')
        const p_header = document.getElementById('p_header')
        const ct_title = document.getElementById('ct_title')
        const ct_desc = document.getElementById('ct_desc')


        checkbox.addEventListener('change', (event) => {
            if (event.currentTarget.checked) {
                yt_link.classList.remove("d-none");
                p_header.classList.remove("d-none");
                ct_title.classList.remove("d-none");
                ct_desc.classList.remove("d-none");
            } else {
                yt_link.classList.add("d-none");
                p_header.classList.add("d-none");
                ct_title.classList.add("d-none");
                ct_desc.classList.add("d-none");
            }
        })
    </script>
@endsection
