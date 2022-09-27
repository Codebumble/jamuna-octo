@extends('layouts/contentLayoutMaster')

@section('title', 'Edit This Tender')

@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap"
        rel="stylesheet">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">

    <style>
        h6 {
            margin-bottom: 0;
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1rem 1.5rem;
        }

        .file-logo-wrapper {
            padding: 1rem;
            height: 7.5rem;
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            border-radius: 6px;
        }

        .item-name {
            font-weight: 600;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .item-options {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;

        }

        .item-options .btn-delete {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            border-radius: 0;
            border-bottom-right-radius: 6px;
            border-bottom-left-radius: 6px;
        }
    </style>
@endsection

@section('content')
    <!-- Validation -->
    <section class="bs-validation">
        <!-- Bootstrap Validation -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Post A Tender</h4>
                </div>
                <div class="card-body">



                    @if (isset($_GET['exist']))
                        <div class="demo-spacing-0 mb-2">
                            <div class="alert alert-warning" role="alert">
                                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                            </div>
                        </div>
                    @endif





                    <form id="job-post" class="needs-validation" novalidate action="{{ route('edit_tender') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="name">Tender Name/Title</label>
                                <input name='new[id]' type='hidden' value='{{ $d->id }}' />

                                <input id="title" type="text" name="new[title]" class="form-control"
                                    value="{{ $d->title }}" aria-label="title" aria-describedby="title" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="company">Company Name</label>

                                <select id="company" class="form-select" name="new[comp_name]" required>

                                    @foreach ($companies as $company)
                                        @if ($company->name == $d->comp_name)
                                            <option value="{{ $company->name }}" selected>{{ $company->name }}</option>
                                        @else
                                            <option value="{{ $company->name }}">{{ $company->name }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="s_description">Location</label>

                                <input id="name" type="text" name="new[location]" value="{{ $d->location }}"
                                    class="form-control" aria-label="location" aria-describedby="location" required />
                            </div>



                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="s_description">Tender Ref. No.</label>

                                <input id="name" type="text" name="new[ref_no]" value="{{ $d->ref_no }}"
                                    class="form-control" aria-label="ref_no" aria-describedby="ref_no" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="proc_method">Procurement Method</label>

                                <input id="proc_method" type="text" name="new[proc_method]"
                                    value="{{ $d->proc_method }}" class="form-control" aria-label="proc_method"
                                    aria-describedby="proc_method" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="work_name">Work Name</label>

                                <input id="work_name" type="text" name="new[work_name]" value="{{ $d->work_name }}"
                                    class="form-control" aria-label="work_name" aria-describedby="work_name" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="me_req">Address</label>

                                <input id="address" type="text" name="new[address]" value="{{ $d->address }}"
                                    class="form-control" aria-label="address" aria-describedby="address" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="publish_date">Publication Date</label>

                                <input id="publish_date" type="date" name="new[publish_date]"
                                    value="{{ $d->publish_date }}" class="form-control" aria-label="publish_date"
                                    aria-describedby="publish_date" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="last_date">Last Selling Date</label>

                                <input id="last_date" type="date" name="new[last_date]" value="{{ $d->last_date }}"
                                    class="form-control" aria-label="last_date" aria-describedby="last_date" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="crdt">Closing and Receiving Date and Time</label>

                                <input id="crdt" type="text" name="new[crdt]" value="{{ $d->crdt }}"
                                    class="form-control" aria-label="crdt" aria-describedby="crdt" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="crdt">Pre-Tender Meeting</label>

                                <input id="pre_t_meeting" type="text" name="new[pre_t_meeting]"
                                    value="{{ $d->pre_t_meeting }}" class="form-control" aria-label="pre_t_meeting"
                                    aria-describedby="pre_t_meeting" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="t_open_date">Tender Opening Date and Time</label>

                                <input id="t_open_date" type="text" name="new[t_open_date]"
                                    value="{{ $d->t_open_date }}" class="form-control" aria-label="t_open_date"
                                    aria-describedby="t_open_date" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="t_open_date">Location of Supply/Works</label>

                                <input id="supply_location" type="text" name="new[supply_location]"
                                    value="{{ $d->supply_location }}" class="form-control" aria-label="supply_location"
                                    aria-describedby="supply_location" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="schedule_submission">Schedule Submission At</label>

                                <input id="schedule_submission" type="text" name="new[schedule_submission]"
                                    value="{{ $d->schedule_submission }}" class="form-control"
                                    aria-label="schedule_submission" aria-describedby="schedule_submission" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="schedule_submission">Source of Fund</label>

                                <input id="fund_source" type="text" name="new[fund_source]" class="form-control"
                                    value="{{ $d->fund_source }}" aria-label="fund_source"
                                    aria-describedby="fund_source" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="schedule_submission">Price of Schedule</label>

                                <input id="price_schedule" type="text" name="new[price_schedule]"
                                    class="form-control" value="{{ $d->price_schedule }}" aria-label="price_schedule"
                                    aria-describedby="price_schedule" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="security_amount">Tender Security Amount</label>

                                <input id="price_schedule" type="text" name="new[security_amount]"
                                    value="{{ $d->security_amount }}" class="form-control" aria-label="security_amount"
                                    aria-describedby="security_amount" required />
                            </div>

                            <div class="col-12 col-md-6 mb-1">
                                <label class="form-label" for="req_time">Time Required For Completion</label>

                                <input id="price_schedule" type="text" name="new[req_time]" class="form-control"
                                    value="{{ $d->req_time }}" aria-label="req_time" aria-describedby="req_time"
                                    required />
                            </div>

                            <div class="divider-danger divider">
                                <div class="divider-text uppercase">Caution</div>
                            </div>

                            <div class="alert alert-danger alert-validation-msg mt-1" role="alert">
                                <div class="alert-body d-flex align-items-center justify-content-center">
                                    <i data-feather="info" class="me-50"></i>
                                    <span>Documents for this Tender can be uploaded from the <strong>
                                            "Tender Documents"
                                        </strong>
                                        Section!!!</span>
                                </div>
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

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Attachments</h4>
                </div>
            </div>
        </div>


        <div class="attachment-files row">

            @foreach (json_decode($d->package_details) as $key1=>$value1)

        <div class="col-md-3">
                <div class="card">
                    <div class="item-img file-logo-wrapper text-center">
                        <img src="{{ asset('images/svg/file.svg') }}" alt="" class="card-img-top"
                            style="width:50px">
                    </div>

                    <div class="card-body">
                        <h6 class="item-name">
                            {{$value1->label}}
                        </h6>
                    </div>
                    <div class="item-options text-center">
                        <a href="{{route('delete_document_tender', ['tid' => $d->id, 'd' => 'attachment', 'id' => $key1])}}" class="btn btn-danger btn-delete waves-effect waves-float waves-light">
                            <span class="add-to-cart">Delete</span>
                        </a>
                    </div>

                </div>
            </div>

        @endforeach


        </div>


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Corrigendum</h4>
                </div>
            </div>
        </div>


        <div class="corrigendum-files row">

        @foreach (json_decode($d->corrigendum) as $key=>$value)

        <div class="col-md-3">
                <div class="card">
                    <div class="item-img file-logo-wrapper text-center">
                        <img src="{{ asset('images/svg/file.svg') }}" alt="" class="card-img-top"
                            style="width:50px">
                    </div>

                    <div class="card-body">
                        <h6 class="item-name">
                            {{$value->label}}
                        </h6>
                    </div>
                    <div class="item-options text-center">
                        <a href="{{route('delete_document_tender', ['tid' => $d->id, 'd' => 'corrigendum', 'id' => $key])}}" class="btn btn-danger btn-delete waves-effect waves-float waves-light">
                            <span class="add-to-cart">Delete</span>
                        </a>
                    </div>

                </div>
            </div>

        @endforeach



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
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-validation-job-page.js')) }}"></script>
    <script></script>

@endsection
