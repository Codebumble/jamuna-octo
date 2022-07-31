@extends('layouts/contentLayoutMaster')

@section('title', 'User View - Security')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
<section class="app-user-view-security">
  <div class="row">
    <!-- User Sidebar -->
    <?php
              $auther = Auth::User();
              $json_data = json_decode(Auth::User()->json_data);
            ?>
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <!-- User Card -->
      <div class="card">
        <div class="card-body">
          <div class="user-avatar-section">
            <div class="d-flex align-items-center flex-column">
              <img
                class="img-fluid rounded mt-3 mb-2"
                
                src="{{asset('images/portrait/small/avatar-s-2.jpg')}}"
                
                height="110"
                width="110"
                alt="User avatar"
              />
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
              <span class="badge bg-light-primary p-75 rounded">
                <i data-feather="briefcase" class="font-medium-2"></i>
              </span>
              <div class="ms-75">
                <h4 class="mb-0">568</h4>
                <small>Projects Done</small>
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
              <a href="javascript:;" class="btn btn-outline-danger suspend-user">Suspended</a>
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
          <a class="nav-link" href="{{route('profile-account')}}">
            <i data-feather="user" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Account</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('profile-security')}}">
            <i data-feather="lock" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Security</span>
          </a>
        </li>
      </ul>
      <!--/ User Pills -->

      <!-- Change Password -->
      <div class="card">
        <h4 class="card-header">Change Password</h4>
        <div class="card-body">
          <form id="formChangePassword" method="POST" action="{{route('auth_reset_password')}}">
          @csrf
          <?php if(isset($_GET['error']) && $_GET['error']== 1){ ?>
            <div class="alert alert-warning mb-2" role="alert">
              <h6 class="alert-heading">Ensure that these requirements are met</h6>
              <div class="alert-body fw-normal">Your Current Password is Wrong. You can use "Forget Password" to recovery it.</div>
            </div>
          <?php } else if(isset($_GET['error']) && $_GET['error']== 2){ ?>
            <div class="alert alert-warning mb-2" role="alert">
              <h6 class="alert-heading">Ensure that these requirements are met</h6>
              <div class="alert-body fw-normal">New Password and Confirm Password didn't Match.</div>
            </div>
          <?php } else if(isset($_GET['success']) && $_GET['success']== 1){ ?>
            <div class="alert alert-success mb-2" role="alert">
              <h6 class="alert-heading">Success!!</h6>
              <div class="alert-body fw-normal">Password Changed Successful!</div>
            </div>

          <?php } ?>
            <div class="row">
            <div class="mb-2 col-md-6 form-password-toggle">
                <label class="form-label" for="newPassword">Current Password</label>
                <div class="input-group input-group-merge form-password-toggle">
                  <input
                    class="form-control"
                    type="password"
                    id="newPassword"
                    name="current"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  />
                  <span class="input-group-text cursor-pointer">
                    <i data-feather="eye"></i>
                  </span>
                </div>
              </div>

              <div class="mb-2 col-md-6 form-password-toggle">
                <label class="form-label" for="newPassword">New Password</label>
                <div class="input-group input-group-merge form-password-toggle">
                  <input
                    class="form-control"
                    type="password"
                    id="newPassword"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  />
                  <span class="input-group-text cursor-pointer">
                    <i data-feather="eye"></i>
                  </span>
                </div>
              </div>

              <div class="mb-2 col-md-6 form-password-toggle">
                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                <div class="input-group input-group-merge">
                  <input
                    class="form-control"
                    type="password"
                    name="confirm_password"
                    id="confirmPassword"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  />
                  <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-primary me-2">Change Password</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--/ Change Password -->

      <!-- Two-steps verification -->
      

      <!--/ Two-steps verification -->

      <!-- recent device -->
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Recent devices</h4>
        </div>
        <div class="table-responsive">
          <table class="table text-nowrap text-center">
            <thead>
              <tr>
                <th class="text-start">BROWSER</th>
                <th>DEVICE</th>
                <th>LOCATION</th>
                <th>RECENT ACTIVITY</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-start">
                  <div class="avatar me-25">
                    <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20" height="20" />
                  </div>
                  <span class="fw-bolder">Chrome on Windows</span>
                </td>
                <td>Dell XPS 15</td>
                <td>United States</td>
                <td>10, Jan 2021 20:07</td>
              </tr>
              <tr>
                <td class="text-start">
                  <div class="avatar me-25">
                    <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20" height="20" />
                  </div>
                  <span class="fw-bolder">Chrome on Android</span>
                </td>
                <td>Google Pixel 3a</td>
                <td>Ghana</td>
                <td>11, Jan 2021 10:16</td>
              </tr>
              <tr>
                <td class="text-start">
                  <div class="avatar me-25">
                    <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20" height="20" />
                  </div>
                  <span class="fw-bolder">Chrome on MacOS</span>
                </td>
                <td>Apple iMac</td>
                <td>Mayotte</td>
                <td>11, Jan 2021 12:10</td>
              </tr>
              <tr>
                <td class="text-start">
                  <div class="avatar me-25">
                    <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20" height="20" />
                  </div>
                  <span class="fw-bolder">Chrome on iPhone</span>
                </td>
                <td>Apple iPhone XR</td>
                <td>Mauritania</td>
                <td>12, Jan 2021 8:29</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- / recent device -->
    </div>
    <!--/ User Content -->
  </div>
</section>


@include('content/_partials/_modals/modal-edit-user')
@include('content/_partials/_modals/modal-upgrade-plan')
@include('content/_partials/_modals/modal-two-factor-auth')
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/modal-two-factor-auth.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view-security.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
@endsection
