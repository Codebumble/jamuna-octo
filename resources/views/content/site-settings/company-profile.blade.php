@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Company Profile')

@section('vendor-style')
    {{-- Vendor Css files --}}
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
@endsection

@section('content')
    <!-- Validation -->
    <section class="bs-validation">
        <!-- Bootstrap Validation -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Company Profile</h4>
                </div>
                <div class="card-body">



                    @if (isset($_GET['exist']))
                        <div class="demo-spacing-0 mb-2">
                            <div class="alert alert-warning" role="alert">
                                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                            </div>
                        </div>
                    @endif




                    <form id="company-profile" method="POST" enctype="multipart/form-data"
                        action="{{ route('company_profile_update') }}">
                        @csrf

                        <div class="col-sm-12">
                            <label class="form-label" for="description">Profile Details</label>
                            <div id="full-wrapper">
                                <div id="full-container1">
                                    <div id="ql-editor1" class="editor" spellcheck="false">
                                        {!! $data[0]->descriptions !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="description">Awards</label>
                            <div id="full-wrapper">
                                <div id="full-container2">
                                    <div id="ql-editor2" class="editor" spellcheck="false">
                                        {!! $data[1]->awards !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="description">HRD & Corporate Governance</label>
                            <div id="full-wrapper">
                                <div id="full-container3">
                                    <div id="ql-editor3" class="editor" spellcheck="false">
                                        {!! $data[2]->hdrCorporate !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="description">Environment: We Care</label>
                            <div id="full-wrapper">
                                <div id="full-container4">
                                    <div id="ql-editor4" class="editor" spellcheck="false">
                                        {!! $data[3]->environment !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="description">Our Goal</label>
                            <div id="full-wrapper">
                                <div id="full-container5">
                                    <div id="ql-editor5" class="editor" spellcheck="false">
                                        {!! $data[4]->goals !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="description">Nation building activities</label>
                            <div id="full-wrapper">
                                <div id="full-container6">
                                    <div id="ql-editor6" class="editor" spellcheck="false">
                                        {!! $data[5]->activities !!}
                                    </div>
                                </div>
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
    <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>

@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-validation-company-page.js')) }}"></script>

    <script src="{{ asset(mix('js/scripts/forms/company-profile-quill.js')) }}"></script>

    <script></script>
@endsection
