@extends('layouts/contentLayoutMaster')


<?php
$auther = $user_details;
$json_data = json_decode($auther->json_data);

// Author = Super But user not

$power_build = [
    'super-admin' => '0',
    'admin' => '1',
    'manager' => '2',
    'employee' => '3',
    'sub-employee' => '4',
];

if ($power_build[$auther->role] < $power_build[Auth::user()->role]) {
    header('Location: ' . route('misc-not-authorized'), true, 302);
    exit();
}

?>

@section('title', '@' . $auther->username . ' - Profile')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
    <section class="app-user-view-account">
        <div class="row">

            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-md-0 order-1">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                <img class="mt-3 mb-2 rounded" <?php
                    if(!isset($auther->avatar)){ ?>
                                    src="{{ asset('images/portrait/small/avatar-s-2.jpg') }}" <?php } else { ?>
                                    src="/profile-images/{{ $auther->avatar }}" <?php } ?> height="110"
                                    width="110" alt="User avatar" style="object-fit: cover" />
                                <div class="user-info text-center">
                                    <h4>{{ $auther->name }}</h4>
                                    <span class="badge bg-light-secondary">{{ $auther->designation }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around pt-75 my-2">
                            <div class="d-flex align-items-start me-2">
                                <span class="badge bg-light-primary p-75 rounded">
                                    <i data-feather="check" class="font-medium-2"></i>
                                </span>
                                <div class="ms-75">
                                    <a href="/admin/visitor/{{ $auther->under_ref }}" style="text-decoration: none;">
                                        <h5 class="mb-0">{{ '@' . $auther->under_ref }}</h5>
                                        <small>Invited</small>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <span class="badge bg-light-success p-75 rounded">
                                    <i data-feather="zap" class="font-medium-2"></i>
                                </span>
                                <div class="ms-75">
                                    <h5 class="mb-0">{{ $json_data->gender }}</h5>
                                    <small>Gender</small>
                                </div>
                            </div>
                        </div>
                        <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Username:</span>
                                    <span>{{ $auther->username }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Email:</span>
                                    <span>{{ $auther->email }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Account Status:</span>
                                    @if ($json_data->status == 'Active')
                                        <span class="badge bg-light-success">{{ $json_data->status }}</span>
                                    @elseif ($json_data->status == 'Inactive')
                                        <span class="badge bg-light-warning">{{ $json_data->status }}</span>
                                    @elseif ($json_data->status == 'Suspended' || $json_data->status == 'Pending')
                                        <span class="badge bg-light-danger">{{ $json_data->status }}</span>
                                    @endif
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Role:</span>
                                    <span class="text-capitalize">{{ $auther->role }}</span>
                                </li>
                                @if (isset($auther->company))
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Company:</span>
                                        <span>{{ $auther->company }}</span>
                                    </li>
                                @endif
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Contact:</span>
                                    <span>{{ $json_data->phone_number }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Address:</span>
                                    <span>{{ $json_data->address }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Country:</span>
                                    <span>{{ $json_data->country }}</span>
                                </li>
                            </ul>

                            <div class="d-flex justify-content-center pt-2">

                                @if (($power_build[Auth::user()->role] == 0 && $power_build[$auther->role] > 0) ||
                                    ($power_build[Auth::user()->role] == 1 && $power_build[$auther->role] > 1))

                                    <a href="#" class="btn btn-warning me-1"
                                        onclick="event.preventDefault(); document.getElementById('active-suspend-form').submit();">
                                        @if ($json_data->status != 'Active')
                                            Active
                                        @else
                                            Suspend
                                        @endif

                                    </a>
                                    @if ($json_data->status != 'Active')
                                        <form id="active-suspend-form" method="POST"
                                            action="{{ route('user_active_by_auth', ['username' => $auther->username]) }}">
                                            @csrf
                                        </form>
                                    @else
                                        <form id="active-suspend-form" method="POST"
                                            action="{{ route('user_suspend', ['username' => $auther->username]) }}">
                                            @csrf
                                        </form>
                                    @endif
                                @endif

                                @if ($auther->username != Auth::user()->username)
                                    <a href="{{ route('user-report-api', ['username' => $auther->username]) }}"
                                        onclick="event.preventDefault(); document.getElementById('report-user').submit();"
                                        class="btn btn-outline-danger">Report</a>

                                    <form id="report-user" method="POST"
                                        action="{{ route('user-report-api', ['username' => $auther->username]) }}">
                                        @csrf
                                    </form>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /User Card -->


            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">



                <!-- Invoice table -->
                <div class="app-user-list">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ json_decode($sub_users[0]->sub_user) }} </h3>
                                        <span>Total Users</span>
                                    </div>
                                    <div class="avatar bg-light-primary p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ json_decode($active[0]->sub_active) }}</h3>
                                        <span>Active Users</span>
                                    </div>
                                    <div class="avatar bg-light-danger p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user-plus" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">
                                            {{ json_decode($sub_users[0]->sub_user) - json_decode($active[0]->sub_active) }}
                                        </h3>
                                        <span>Suspended/Inactive</span>
                                    </div>
                                    <div class="avatar bg-light-warning p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user-x" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Search & Filter</h4>
                        <div class="row">
                            <div class="col-md-4 user_role"></div>
                            <div class="col-md-4 user_status"></div>
                        </div>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table">
                            <thead class="table-light">
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    {{-- <th>Plan</th>
            <th>Billing</th> --}}
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
                <!-- /Invoice table -->
            </div>
            <!--/ User Content -->
        </div>
    </section>

    <section class="app-user-list">
        <!-- list and filter start -->

        <!-- list and filter end -->
    </section>


@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    {{-- data table --}}
    <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-user-view-account.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-profile-visitor-list.js')) }}"></script>

@endsection
