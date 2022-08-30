@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Company')

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
                    <h4 class="card-title">Edit Company Details</h4>
                </div>
                <div class="card-body">

                    @if (isset($_GET['exist']))
                        <div class="demo-spacing-0 mb-2">
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body"><strong>Company Name Already Exist. Please Try to Edit That or
                                        Delete to Create a New.</strong></div>
                            </div>
                        </div>
                    @endif


                    <form class="needs-validation" novalidate
                        action="{{ route('edit-company-api', ['id' => $company->id]) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="name">Company Name</label>

                                <input id="name" type="text" class="form-control" readonly="readonly"
                                    value="{{ $company->name }}" placeholder="Name" aria-label="Name"
                                    aria-describedby="name" required />
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="section">Section</label>
                                <select id="section" class="select2 form-control" name="section">
                                    <option value="{{ $company->section }}" selected>{{ $company->section }}</option>
                                    @foreach ($sections as $section)
                                        @if ($section->name != $company->section)
                                            <option value="{{ $section->name }}">{{ $section->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="support_email">Support Email</label>
                                <input id="support_email" type="email" name="support_email"
                                    value="{{ json_decode($company->json_data)->support_email }}" class="form-control"
                                    placeholder="support@codebumble.net" />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a valid email.</div>
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="ceo_of_the_company">Director Name</label>
                                <input id="ceo_of_the_company" type="text" class="form-control"
                                    value="{{ json_decode($company->json_data)->ceo_of_the_company }}"
                                    name="ceo_of_the_company" />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a valid director Name.</div>
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="address">Address</label>
                                <input id="address" type="text" class="form-control"
                                    value="{{ json_decode($company->json_data)->address }}" name="address" />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a valid Address.</div>
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="establish_date">Establish Date</label>
                                <input id="establish_date" type="date" class="form-control picker"
                                    value="{{ $company->establish_date }}" name="establish_date" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="products">Products</label>
                                <input id="products" type="text" class="form-control" name="products"
                                    value="{{ $company->products }}" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="production_cap">Production Capacity</label>
                                <input id="production_cap" type="text" class="form-control" name="production-cap"
                                    value="{{ $company->production_cap }}" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="manpower">Man Power</label>
                                <input id="manpower" type="number" class="form-control" name="manpower"
                                    value="{{ $company->manpower }}" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="support_phone_number">Support Phone Number</label>
                                <input id="support_phone_number" type="text" class="form-control"
                                    value="{{ json_decode($company->json_data)->support_phone_number }}"
                                    name="support_phone_number" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label for="image" class="form-label">Company Logo</label>
                                <input id="image" class="form-control" type="file" name="image" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label for="dfile" class="form-label">Document</label>
                                <input id="dfile" class="form-control" type="file" name="dfile" />
                            </div>

                            {{-- <div class="mb-1 col-12 col-md-6" x-data="{ count: 0 }" x-init="count = $refs.countme.value.length">
						<label class="form-label" for="short-details">Short Details (It will be placed top of the page after the page title.)</label>
						<textarea rows="1" class="form-control" name="short-details" id="short-details" maxlength="200" x-ref="countme" x-on:keyup="count = $refs.countme.value.length" >{{ $company->short_details }}</textarea>
						<span x-html="count"></span> / <span x-html="$refs.countme.maxLength"></span>
						</div> --}}


                            <div class="mb-1">
                                <label class="d-block form-label" for="validationBioBootstrap">Company Discription</label>
                                <textarea id="validationBioBootstrap" class="form-control" name="description" rows="3">{{ $company->description }}</textarea>
                            </div>

                            <div class="divider-primary divider">
                                <div class="divider-text">Additional Information</div>
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="longitute">Location: longitute</label>
                                <input id="longitute" type="text" class="form-control"
                                    value="{{ json_decode($company->json_data)->longitute }}" name="longitute" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="latitude">Location: latitude</label>
                                <input id="latitude" type="text" class="form-control"
                                    value="{{ json_decode($company->json_data)->latitude }}" name="latitude" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="website">Website</label>
                                <input id="website" type="text" class="form-control"
                                    value="{{ json_decode($company->json_data)->website }}" name="website" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="facebook">Facebook</label>
                                <input id="facebook" type="text" class="form-control"
                                    value="{{ json_decode($company->json_data)->facebook }}" name="facebook" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="instagram">Instagram</label>
                                <input id="instagram" type="text" class="form-control" name="instagram"
                                    value="{{ json_decode($company->json_data)->instagram }}" />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="linkedin">Linkedin</label>
                                <input id="linkedin" type="text" class="form-control" name="linkedin"
                                    value="{{ json_decode($company->json_data)->linkedin }}" />
                            </div>


                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="ceo_username">CEO's Username</label>
                                @php
                                    if (!isset(json_decode($company->json_data)->ceo_username)) {
                                        $json_data_ceo_username = 'N/A';
                                    } else {
                                        $json_data_ceo_username = json_decode($company->json_data)->ceo_username;
                                    }
                                @endphp
                                <input id="ceo_username" type="text" class="form-control" name="ceo_username"
                                    value="{{ $json_data_ceo_username }}" />
                            </div>

                            <div class="col-12 col-md-6 mb-1 mt-2">
                                <div class="form-check form-check-secondary">
                                    <input id="new_center" type="checkbox" class="form-check-input" name="new_center"
                                        value="yes" @if (isset(json_decode($company->json_data)->new_center) && json_decode($company->json_data)->new_center == 'yes') checked @endif />
                                    <label class="form-check-label" for="new_center">Add as New Center</label>
                                </div>
                            </div>
                            @php

                                $dn = '';

                                if (!isset(json_decode($company->json_data)->new_center) || json_decode($company->json_data)->new_center == 'no') {
                                    $dn = 'd-none';
                                }

                            @endphp

                            <div id="yv_link" class="col-12 col-md-6 {{ $dn }} mb-1">
                                <label class="form-label" for="yv_link">Youtube Video Link</label>
                                <input type="text" class="form-control" name="yv_link"
                                    @if (!isset(json_decode($company->json_data)->new_center) || json_decode($company->json_data)->new_center == 'no') value=""
						@else
						value="{{ json_decode($company->json_data)->yv_link }}" @endif />
                            </div>

                            <div id="p_header" class="col-12 col-md-6 {{ $dn }} mb-1">
                                <label class="form-label" for="p_header">Page Header</label>
                                <input type="text" class="form-control" name="p_header"
                                    @if (!isset(json_decode($company->json_data)->new_center) || json_decode($company->json_data)->new_center == 'no') value=""
						@else
						value="{{ json_decode($company->json_data)->p_header }}" @endif />
                            </div>

                            <div id="ct_title" class="col-12 col-md-6 {{ $dn }} mb-1">
                                <label class="form-label" for="ct_title">Correspondence Title</label>
                                <input type="text" class="form-control" name="ct_title"
                                    @if (!isset(json_decode($company->json_data)->new_center) || json_decode($company->json_data)->new_center == 'no') value=""
						@else
						value="{{ json_decode($company->json_data)->ct_title }}" @endif />
                            </div>

                            <div id="ct_desc" class="col-12 col-md-6 {{ $dn }} mb-1">
                                <label class="form-label" for="ct_desc">Correspondence Description</label>
                                <input type="text" class="form-control" name="ct_desc"
                                    @if (!isset(json_decode($company->json_data)->new_center) || json_decode($company->json_data)->new_center == 'no') value=""
						@else
						value="{{ json_decode($company->json_data)->ct_desc }}" @endif />
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

        <div class="divider-primary divider">
            <div class="divider-text">Uploaded Image</div>
        </div>

        <div class="col-12">

            <div class="row match-height">
                @php
                    $counter = 0;
                @endphp

                @foreach ($imgs as $value)
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img-top" style="height: 15rem; object-fit: cover; max-width: 100%"
                                src="{{ asset($value->src) }}" alt="{{ $value->name }}" />

                            <div class="card-body">

                                <a href="{{ route('delete_company_image', ['id' => $counter, 'company_id' => $company->id]) }}"
                                    class="btn btn-outline-danger col-md-6">Delete</a>
                            </div>
                        </div>
                    </div>

                    @php
                        $counter += 1;
                    @endphp
                @endforeach



            </div>

        </div>

        <!-- jQuery Validation -->

        <!-- /jQuery Validation -->

    </section>
    <!-- /Validation -->
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('js/app.js')) }}"></script>
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
