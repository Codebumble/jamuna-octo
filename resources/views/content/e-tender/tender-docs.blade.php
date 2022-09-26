@extends('layouts/contentLayoutMaster')

@section('title', 'Tender Documents')

@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/plyr.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-media-player.css')) }}">
@endsection

@section('content')
    <!-- Validation -->
    <section class="bs-validation">
        <!-- Bootstrap Validation -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Tender Documents</h4>
                </div>
                <div class="card-body">



                    @if (isset($_GET['exist']))
                        <div class="demo-spacing-0 mb-2">
                            <div class="alert alert-warning" role="alert">
                                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                            </div>
                        </div>
                    @endif





                    <form action="" class="invoice-repeater" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div data-repeater-list="new">

                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">

                                    <div class="col-md-4 col-12 mb-50">
                                        <div class="mb-1">
                                            <label class="form-label" for="src">Image/PDF</label>
                                            <input id="src" type="file" name="src" class="form-control"
                                                accept="image/png, image/jpeg, .jpg, .pdf, .docs, .docx" />


                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-50">
                                        <div class="mb-1">
                                            <label class="form-label" for="label">Label</label>
                                            <input id="label" type="text" class="form-control" name="label"
                                                value="" aria-describedby="label"
                                                placeholder="Download The Package Details" />
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-50">
                                        <div class="mb-1">
                                            <label class="form-label" for="tender_list">For Tender</label>
                                            <select name="tender_list" class="form-select">
                                                <option value="tender-1">Tender 1</option>
                                                <option value="tender-2">Tender 2</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-50">
                                        <div class="mb-1">
                                            <label class="form-label" for="heading">Documents Type</label>
                                            <div class="demo-inline-spacing">
                                                <div class="form-check form-check-inline">
                                                    <input id="attachment" class="form-check-input" type="radio"
                                                        name="att-loc" value="attachment" checked />
                                                    <label class="form-check-label" for="attachment">Attachment</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input id="corrigendum" class="form-check-input" type="radio"
                                                        name="att-loc" value="corrigendum" />
                                                    <label class="form-check-label" for="corrigendum">Corrigendum</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="mb-1">
                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                                type="button">
                                                <i data-feather="x" class="me-25"></i>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <hr />
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-icon btn-warning" type="button" data-repeater-create>
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

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Tender Documents</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('slider_edit_api') }}" method="POST">
                        @csrf
                        <div class="invoice-repeater">
                            <?php $counter = 0; ?>
                            {{-- @foreach ($imgs as $img) --}}
                            <div>

                                <div>
                                    <div class="row d-flex align-items-end">

                                        <div class="col-md-2 col-12">
                                            <div style="margin-bottom: 0.5rem; margin-left:2rem">

                                                <div>
                                                    <img src="{{ asset(mix('images/svg/folder.svg')) }}" alt="documents"
                                                        style="width: 60px">
                                                </div>

                                                <label for="slider" style="display:block;">
                                                    <input name="" value="" class="d-none">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12 mb-50">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemcost">Label</label>
                                                <input id="itemcost" type="text" class="form-control" name=""
                                                    value="" aria-describedby="itemcost"
                                                    placeholder="Download The Package Details" />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12 mb-50">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemcost">For Tender</label>
                                                <select name="tender_list" class="form-select">
                                                    <option value="tender-1">Tender 1</option>
                                                    <option value="tender-2">Tender 2</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12 mb-50">
                                            <div class="mb-1">
                                                <button class="btn btn-outline-danger text-nowrap px-1" type="button"
                                                    data-repeater-delete onclick="deleted('{{ $counter }}');">
                                                    <i data-feather="x" class="me-25"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    <hr />
                                </div>




                            </div>
                            <?php $counter += 1; ?>
                            {{-- @endforeach --}}

                            <div class="row">
                                <div class="col-12">

                                    <button class="btn btn-icon btn-success m-1" type="button"
                                        onclick="this.form.submit();">
                                        <i data-feather="check" class="me-25"></i>
                                        <span>Update</span>
                                    </button>
                                </div>
                            </div>




                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- /jQuery Validation -->

    </section>
    <!-- /Validation -->
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/plyr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/plyr.polyfilled.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-validation-company-page.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-repeater-front-page.js')) }}"></script>
    <script>
        var deleted = function(event) {

            var data = new FormData();
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/codebumble/delete-slider/' + event, true);
            xhr.onload = function() {
                // do something to response
                if (this.status == 200) {
                    location.reload();
                };
            };
            xhr.send(data);
        };
    </script>

    <script>
        var deleted1 = function(event) {

            var data = new FormData();
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/codebumble/delete-slider-bottom/' + event, true);
            xhr.onload = function() {
                // do something to response
                if (this.status == 200) {
                    location.reload();
                };
            };
            xhr.send(data);
        };
    </script>

@endsection
