@extends('layouts/contentLayoutMaster')

@section('title', 'Tender Applicant Table')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base/plugins/forms/pickers/form-flat-pickr.css') }}">
@endsection


@section('content')

    <!-- Advanced Search -->
    <section id="advanced-search-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">TenderApplicant Data Table</h4>
                    </div>
                    <!--Search Form -->
                    <div class="card-body mt-2">
                        <form class="dt_adv_search" method="POST">

                            <div class="row g-1 mb-md-1">

                                <div class="col-md-4">
                                    <label class="form-label">Tender Name:</label>
                                    <input type="text" class="form-control dt-input dt-full-name" data-column="1"
                                        placeholder="Interior Design &" data-column-index="1" />
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Company:</label>
                                    <input type="text" class="form-control dt-input dt-full-name" data-column="2"
                                        placeholder="Hoor" data-column-index="2" />
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Contact Person:</label>
                                    <input type="text" class="form-control dt-input" data-column="3"
                                        placeholder="Ali Baba" data-column-index="3" />
                                </div>
                            </div>

                            <div class="row g-1">


                                <div class="col-md-4">
                                    <label class="form-label">Contact No:</label>
                                    <input type="text" class="form-control dt-input" data-column="4"
                                        placeholder="017xxxxxxxxx" data-column-index="4" />
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Email:</label>
                                    <input type="text" class="form-control dt-input" data-column="5"
                                        placeholder="email@example.com" data-column-index="5" />
                                </div>



                                <div class="col-md-4">
                                    <label class="form-label">Designation:</label>
                                    <input type="text" class="form-control dt-input" data-column="6"
                                        placeholder="Managing Director" data-column-index="6" />
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Department:</label>
                                    <input type="text" class="form-control dt-input" data-column="7"
                                        placeholder="Architech" data-column-index="7" />
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Country:</label>
                                    <input type="text" class="form-control dt-input" data-column="8"
                                        placeholder="Bangladesh" data-column-index="8" />
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Currency:</label>
                                    <input type="text" class="form-control dt-input" data-column="9" placeholder="BDT"
                                        data-column-index="9" />
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Address:</label>
                                    <input type="text" class="form-control dt-input" data-column="10"
                                        placeholder="Address" data-column-index="10" />
                                </div>

                            </div>
                        </form>
                    </div>
                    <hr class="my-0" />
                    <div class="card-datatable">
                        <table class="dt-advanced-search table-responsive table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tender Name</th>
                                    <th>Company</th>
                                    <th>Contact Person</th>
                                    <th>Contact No.</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Country</th>
                                    <th>Currency</th>
                                    <th>Address</th>
                                    <th>Company Profile</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Tender Name</th>
                                    <th>Company</th>
                                    <th>Contact Person</th>
                                    <th>Contact No.</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Country</th>
                                    <th>Currency</th>
                                    <th>Address</th>
                                    <th>Company Profile</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Advanced Search -->

@endsection


@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
    {{-- Page js files --}}

    <script src="{{ asset(mix('js/scripts/tables/tender-applicant-list.js')) }}"></script>
@endsection
