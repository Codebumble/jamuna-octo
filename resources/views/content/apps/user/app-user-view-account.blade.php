@extends('layouts/contentLayoutMaster')

@section('title', 'Profile - Account')

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
  <?php
              $auther = Auth::User();
              $json_data = json_decode(Auth::User()->json_data);
            ?>
    <!-- User Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <!-- User Card -->
      <div class="card">
        <div class="card-body">
          <div class="user-avatar-section">
            <div class="d-flex align-items-center flex-column">
            <form method="post" enctype="multipart/form-data" action="{{ route('dashboard-ecommerce')}}">
              <input type="file" name="profile-image" id="profile-image" style="display:none;" accept="image/png, image/jpeg, .jpg" onchange="this.form.submit()"/>
                <label for="profile-image">
                  <img
                    class="img-fluid rounded mt-3 mb-2"
                    
                    src="{{asset('images/portrait/small/avatar-s-2.jpg')}}"
                    
                    height="110"
                    width="110"
                    alt="User avatar"
                  />
                </label>
              </form>
              <div class="user-info text-center">
                <h4>{{$auther->name}}</h4>
                <span class="badge bg-light-secondary">{{$auther->designation}}</span>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-around my-2 pt-75">
            <div class="d-flex align-items-start me-2">
              <span class="badge bg-light-primary p-75 rounded">
                <i data-feather="check" class="font-medium-2"></i>
              </span>
              <div class="ms-75">
                <h4 class="mb-0">{{ $auther->under_ref }}</h4>
                <small>Invited</small>
              </div>
            </div>
            <div class="d-flex align-items-start">
              <span class="badge bg-light-success p-75 rounded">
                <i data-feather="zap" class="font-medium-2"></i>
              </span>
              <div class="ms-75">
                <h4 class="mb-0">{{json_decode($auther['json_data'])->gender}}</h4>
                <small>Gender</small>
              </div>
            </div>
          </div>
          <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
          <div class="info-container">
            <ul class="list-unstyled">
              <li class="mb-75">
                <span class="fw-bolder me-25">Username:</span>
                <span>{{ $auther->username}}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Email:</span>
                <span>{{ $auther->email}}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Account Status:</span>
                <span class="badge bg-light-success">{{ $json_data->status}}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Role:</span>
                <span class="text-capitalize">{{ $auther->role}}</span>
              </li>
              @if (isset($auther->company))
              <li class="mb-75">
                <span class="fw-bolder me-25">Company:</span>
                <span>{{ $auther->company }}</span>
              </li>
              @endif
              <li class="mb-75">
                <span class="fw-bolder me-25">Contact:</span>
                <span>{{ $json_data->phone_number}}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Address:</span>
                <span>{{ $json_data->address}}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Country:</span>
                <span>{{ $json_data->country}}</span>
              </li>
            </ul>
            <div class="d-flex justify-content-center pt-2">
              <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser" data-bs-toggle="modal">
                Edit
              </a>
              <a href="{{ route('logout')}}" class="btn btn-outline-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
              <form method="POST" id="logout-form" action="{{ route('logout') }}">
            @csrf
          </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /User Card -->
      
      
    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
      <!-- User Pills -->
      <ul class="nav nav-pills mb-2">
        <li class="nav-item">
          <a class="nav-link active" href="{{route('profile-account')}}">
            <i data-feather="user" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Account</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('profile-security')}}">
            <i data-feather="lock" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Security</span>
          </a>
        </li>

      </ul>
      <!--/ User Pills -->


      <!-- Invoice table -->
      <div class="app-user-list">
        <div class="row">
          <div class="col-lg-4 col-sm-6">
            <div class="card">
              <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                  <h3 class="fw-bolder mb-75">{{json_decode($sub_users[0]->sub_user)}} </h3>
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
                  <h3 class="fw-bolder mb-75">{{json_decode($active[0]->sub_active)}}</h3>
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
                  <h3 class="fw-bolder mb-75">{{json_decode($sub_users[0]->sub_user) - json_decode($active[0]->sub_active) }}</h3>
                  <span>Suspended Users</span>
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
    <!-- Modal to add new user starts-->
    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
      <div class="modal-dialog">
        <form class="add-new-user modal-content pt-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
          <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          </div>
          <div class="modal-body flex-grow-1">
            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
              <input
                type="text"
                class="form-control dt-full-name"
                id="basic-icon-default-fullname"
                placeholder="John Doe"
                name="user-fullname"
              />
            </div>
            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-uname">Username</label>
              <input
                type="text"
                id="basic-icon-default-uname"
                class="form-control dt-uname"
                placeholder="Web Developer"
                name="user-name"
              />
            </div>
            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-email">Email</label>
              <input
                type="text"
                id="basic-icon-default-email"
                class="form-control dt-email"
                placeholder="john.doe@example.com"
                name="user-email"
              />
            </div>
            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-contact">Contact</label>
              <input
                type="text"
                id="basic-icon-default-contact"
                class="form-control dt-contact"
                placeholder="+1 (609) 933-44-22"
                name="user-contact"
              />
            </div>
            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-company">Company</label>
              <input
                type="text"
                id="basic-icon-default-company"
                class="form-control dt-contact"
                placeholder="Codebumble Inc."
                name="user-company"
              />
            </div>
            <div class="mb-1">
              <label class="form-label" for="country">Country</label>
              <select id="country" class="select2 form-select">
                <option value="Australia">USA</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Belarus">Belarus</option>
                <option value="Brazil">Brazil</option>
                <option value="Canada">Canada</option>
                <option value="China">China</option>
                <option value="France">France</option>
                <option value="Germany">Germany</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Japan">Japan</option>
                <option value="Korea">Korea, Republic of</option>
                <option value="Mexico">Mexico</option>
                <option value="Philippines">Philippines</option>
                <option value="Russia">Russian Federation</option>
                <option value="South Africa">South Africa</option>
                <option value="Thailand">Thailand</option>
                <option value="Turkey">Turkey</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
              </select>
            </div>
            <div class="mb-1">
              <label class="form-label" for="user-role">User Role</label>
              <select id="user-role" class="select2 form-select">
                <option value="subscriber">Subscriber</option>
                <option value="editor">Editor</option>
                <option value="maintainer">Maintainer</option>
                <option value="author">Author</option>
                <option value="admin">Admin</option>
              </select>
            </div>
            <div class="mb-2">
              <label class="form-label" for="user-plan">Select Plan</label>
              <select id="user-plan" class="select2 form-select">
                <option value="basic">Basic</option>
                <option value="enterprise">Enterprise</option>
                <option value="company">Company</option>
                <option value="team">Team</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary me-1 data-submit">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Modal to add new user Ends-->
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

@include('content/_partials/_modals/modal-edit-user')
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
  <script src="{{ asset(mix('js/scripts/pages/app-user-list.js')) }}"></script>
  
@endsection
