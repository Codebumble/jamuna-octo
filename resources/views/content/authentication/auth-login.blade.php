@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-basic px-2">
            @if (Auth::check())
              @php
                header("Location: " . route('profile-account'), true, 302);
                exit();
              @endphp
            @endif
  <div class="auth-inner my-2">
    <!-- Login basic -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="#" class="brand-logo">
          <h2 class="brand-text text-primary ms-1">{{env("APP_NAME")}}</h2>
        </a>

        <h4 class="card-title mb-1 text-center">Welcome to {{env("APP_NAME")}}! 👋</h4>

        @if (isset($_GET['error']) && $_GET['error'] == 'IiiZ2hs1g1vzhEMBdkjMUCPh9YzpRVC8CMojxRar')
            <div class="demo-spacing-0">
                <div class="alert alert-danger" role="alert">
                <div class="alert-body"><strong>User Credentials prompt cancelled. Please Check Your Login Details and Try Again.</strong></div>
                </div>
            </div>
        @endif

        @if (isset($_GET['error']) && $_GET['error'] == 2)
            <div class="demo-spacing-0">
                <div class="alert alert-success" role="alert">
                <div class="alert-body"><strong>Session Dropped for Security. Please login again.</strong></div>
                </div>
            </div>
        @endif

        @if (isset($_GET['success']))
            <div class="demo-spacing-0">
                <div class="alert alert-success" role="alert">
                <div class="alert-body"><strong>{{ $_GET['success'] }}</strong></div>
                </div>
            </div>
        @endif

        <form class="auth-login-form mt-2" action="{{route('auth-login-api')}}" method="POST">
        @csrf
       
          <div class="mb-1">
            <label for="login-email" class="form-label">Username or Email</label>
            <input
              type="text"
              class="form-control"
              id="login-email"
              name="login"
              placeholder="john@example.com"
              aria-describedby="login-email"
              tabindex="1"
              autofocus
            />
          </div>

          <div class="mb-1">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">Password</label>
              <a href="{{route('auth-forgot-password')}}">
                <small>Forgot Password?</small>
              </a>
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input
                type="password"
                class="form-control form-control-merge"
                id="login-password"
                name="password"
                tabindex="2"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="login-password"
              />
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
          </div>
          <div class="mb-1">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
              <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
          </div>
          <button class="btn btn-primary w-100" tabindex="4">Sign in</button>


        </form>


      </div>
    </div>
    <!-- /Login basic -->
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>
@endsection
