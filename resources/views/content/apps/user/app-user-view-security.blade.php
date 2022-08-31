@extends('layouts/contentLayoutMaster')

@section('title', 'Profile - Security')

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
            <form method="post" enctype="multipart/form-data" action="{{ route('profile_image')}}">
            @csrf
              <input type="file" name="profile_image" id="profile_image" style="display:none;" accept="image/png, image/jpeg, .jpg" onchange="this.form.submit()"/>
                <label for="profile_image">
                  <img
                    class="rounded mt-3 mb-2"
                    <?php
                    if(!isset($auther->avatar)){ ?>
                    src="{{asset('images/portrait/small/avatar-s-2.jpg')}}"
                    <?php } else { ?>
                    src="/profile-images/{{$auther->avatar}}"
                    <?php } ?>
                    height="110"
                    width="110"
                    alt="User avatar"
					style="object-fit: cover;object-position: center;"
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
                @if ($json_data->status == "Active")
                <span class="badge bg-light-success">{{ $json_data->status}}</span>
                @elseif ($json_data->status == "Inactive")
                <span class="badge bg-light-warning">{{ $json_data->status}}</span>
                @elseif ($json_data->status == "Suspended" ||  $json_data->status == "Pending")
                <span class="badge bg-light-danger">Suspended</span>
                @endif
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
              <div class="alert-body fw-normal">Profile Updated Successfully!</div>
            </div>

          <?php } ?>
            <div class="row">
            <div class="mb-2 col-md-6 form-password-toggle">
                <label class="form-label" for="newPassword">Current Password</label>
                <div class="input-group input-group-merge form-password-toggle">
                  <input
                    class="form-control"
                    type="password"
                    id="newPasswordCurrent"
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
                    id="newPasswordNew"
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
                <th>IP</th>
                <th>OS</th>
                <th>Date and Time</th>
              </tr>
            </thead>
            <tbody>
            @foreach($login_details as $detail)
              <tr>
                <td class="text-start">
                  <div class="avatar me-25">
                  @if ($detail->browser == 'Opera')
                    <img src="{{asset('images/icons/opera.png')}}" alt="avatar" width="20" height="20" />
                  @elseif($detail->browser == 'Edge')
                  <img src="{{asset('images/icons/internet-explorer.png')}}" alt="avatar" width="20" height="20" />
                  @elseif ($detail->browser == 'Firefox')
                  <img src="{{asset('images/icons/mozila-firefox.png')}}" alt="avatar" width="20" height="20" />
                  @elseif ($detail->browser == 'Safari')
                  <img src="{{asset('images/icons/apple-safari.png')}}" alt="avatar" width="20" height="20" />
                  @else
                  <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20" height="20" />
                  @endif
                  </div>
                  <span class="fw-bolder">{{$detail->browser_full}}</span>
                </td>
                <td>{{$detail->ip}}</td>
                <td>{{$detail->os}}</td>
                <td>{{$detail->date}} ({{$detail->time}})</td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>

      <div class="card">
      <div class="card-header border-bottom">
        <h4 class="card-title">Delete Account</h4>
      </div>
      <div class="card-body py-2 my-25">
        <div class="alert alert-warning">
          <h4 class="alert-heading">Are you sure you want to delete your account?</h4>
          <div class="alert-body fw-normal">
            Once you delete your account, there is no going back. Please be certain.
          </div>
        </div>

        <form id="formAccountDeactivation" class="validate-form" onsubmit="return false">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              name="accountActivation"
              id="accountActivation"
              data-msg="Please confirm you want to delete account"
            />
            <label class="form-check-label font-small-3" for="accountActivation">
              I confirm my account will be removed from {{env('APP_NAME')}}
            </label>
          </div>
          <div>
            <button type="submit" class="btn btn-danger deactivate-account mt-1">Delete Account</button>
          </div>
        </form>
      </div>
    </div>
    <!--/ profile -->
      <!-- / recent device -->
    </div>
    <!--/ User Content -->
  </div>
</section>


@include('content/apps/user/modal-edit-user')
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
  <script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view-security.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
@endsection
