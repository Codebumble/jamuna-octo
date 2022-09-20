@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Front Page Details')

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
    <link rel="stylesheet" href="{{asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css'))}}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-media-player.css')) }}">
@endsection

@section('content')
    <!-- Validation -->
    <section class="bs-validation">
        <!-- Bootstrap Validation -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Slider Details</h4>
                </div>
                <div class="card-body">



                    @if (isset($_GET['exist']))
                        <div class="demo-spacing-0 mb-2">
                            <div class="alert alert-warning" role="alert">
                                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                            </div>
                        </div>
                    @endif

                    <div class="col-xl-12 col-lg-12 col-md-12 order-0 order-md-1">
                        <!-- User Pills -->
                        <ul class="nav nav-pills mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front_page_view') }}">
                                    <i data-feather="user" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">General Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('front_page_slider_view') }}">
                                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Sliders</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mission_vision_view') }}">
                                    <i data-feather="trending-up" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Mission & Vision</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('future_expension_view') }}">
                                    <i data-feather="grid" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Future Expension</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about_us_view') }}">
                                    <i data-feather="info" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">About Us</span>
                                </a>
                            </li>

                        </ul>
                    </div>



                    <div class="divider-primary divider">
                        <div class="divider-text">Sliders Images</div>
                    </div>




                    <form action="{{ route('add_slider_api') }}" class="invoice-repeater" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div data-repeater-list="new">

                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">

                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="mb-1">
                                            <label class="form-label" for="src">Image</label>
                                            <input id="src" type="file" name="src" class="form-control"
                                                accept="image/png, image/jpeg, .jpg" />


                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="mb-1">
                                            <label class="form-label" for="heading">Header</label>
                                            <input id="heading" type="text" class="form-control" name="heading"
                                                value="" aria-describedby="heading" placeholder="Header" />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="mb-1">
                                            <label class="form-label" for="description">Short Description</label>
                                            <input id="description" type="text" class="form-control" value=""
                                                name="description" aria-describedby="description"
                                                placeholder="Add Description" />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="mb-1">
                                            <label class="form-label" for="buttonText">Button Text</label>
                                            <input id="buttonText" type="text" value="" name="buttonText"
                                                class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="mb-1">
                                            <label class="form-label" for="btnStyle">Button Style</label>
                                            <select name="btnStyle" class="form-select">
                                                <option value="button">button</option>
                                                <option value="button-alt">button-alt</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="mb-1">
                                            <label class="form-label" for="link">Button URL</label>
                                            <input id="link" type="text" value="" class="form-control"
                                                name="link" />
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
                    <h4 class="card-title">Edit Slider Details</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('slider_edit_api') }}" method="POST">
                        @csrf
                        <div class="invoice-repeater">
                            <?php $counter = 0; ?>
                            @foreach ($imgs as $img)
                                <div>

                                    <div>
                                        <div class="row d-flex align-items-end">

                                            <div class="col-md-2 col-12">
                                                <div class="mb-1">

                                                    <label for="slider" style="display:block;">

                                                        <input name="preview[{{ $counter }}][src]"
                                                            value="{{ $img->src }}" class="d-none">

                                                        <input name="preview[{{ $counter }}][showDescription]"
                                                            value="{{ $img->showDescription }}" class="d-none">

                                                        <input name="preview[{{ $counter }}][showButton]"
                                                            value="{{ $img->showButton }}" class="d-none">


                                                        <img id="imagePreview_1" style="border-radius:6px;"
                                                            src="{{ $img->src }}" width="120" height="70">
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12 mb-50">
                                                <div class="mb-1">
                                                    <label class="form-label" for="itemcost">Header</label>
                                                    <input id="itemcost" type="text" class="form-control"
                                                        name="preview[{{ $counter }}][heading]"
                                                        value="{{ $img->heading }}" aria-describedby="itemcost"
                                                        placeholder="32" />
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12 mb-50">
                                                <div class="mb-1">
                                                    <label class="form-label" for="itemquantity">Short Description</label>
                                                    <input id="itemquantity" type="text" class="form-control"
                                                        name="preview[{{ $counter }}][description]"
                                                        value="{{ $img->description }}" aria-describedby="itemquantity"
                                                        placeholder="1" />
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12 mb-50">
                                                <div class="mb-1">
                                                    <label class="form-label" for="staticprice">Button Text</label>
                                                    <input id="staticprice" type="text"
                                                        name="preview[{{ $counter }}][buttonText]"
                                                        value="{{ $img->buttonText }}" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12 mb-50">
                                                <div class="mb-1">
                                                    <label class="form-label" for="btnStyle">Button Style</label>
                                                    <select name="preview[{{ $counter }}][btnStyle]"
                                                        class="form-select">
                                                        @if (isset($img->btnStyle))
                                                            <option value="{{ $img->btnStyle }}" selected>
                                                                {{ $img->btnStyle }} </option>
                                                        @endif
                                                        <option value="button">button</option>
                                                        <option value="button-alt">button-alt</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12 mb-50">
                                                <div class="mb-1">
                                                    <label class="form-label" for="staticprice">Button URL</label>
                                                    <input id="staticprice" type="text" value="{{ $img->link }}"
                                                        name="preview[{{ $counter }}][link]" class="form-control" />
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
                            @endforeach

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
        <!-- /Bootstrap Validation -->

        <!-- jQuery Validation -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Video Slider Details</h4>
                </div>
                <div class="card-body">

                <div class="divider-primary divider">
                        <div class="divider-text">Sliders Videos</div>
                    </div>




                    <form action="{{ route('add_video_slider_api') }}" class="invoice-repeater" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div data-repeater-list="new_video">

                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">

                                    <div class="col-md-4 col-12 mb-50">
                                        <div class="mb-1">
                                            <label class="form-label" for="src">Video</label>
                                            <input id="src" type="file" name="src" class="form-control" />


                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-50">
                                        <div class="mb-1">
                                            <label class="form-label" for="heading">Name</label>
                                            <input id="heading" type="text" class="form-control" name="heading"
                                                value="" aria-describedby="heading" placeholder="Header" />
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-50">
                                        <div class="mb-1">
                                            <label class="form-label" for="description">Description</label>
                                            <input id="description" type="text" class="form-control" value=""
                                                name="description" aria-describedby="description"
                                                placeholder="Add Description" />
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
                    <h4 class="card-title">Edit Video Slider Details</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('slider_video_edit_api') }}" method="POST">
                        @csrf
                        <div class="invoice-repeater">
                            <?php $counter = 0; ?>
                            @foreach ($videos as $video)
                                <div>

                                    <div>
                                        <div class="row d-flex align-items-end">
                                        <div class="col-md-2 col-12 mb-50">
                                        <input type="hidden" name="videopreview[{{ $counter }}][src]" value="{{$video->src}}"/>

                                            <button class="btn btn-icon btn-success m-1" type="button"
                                            onclick="play('{{$video->src}}')">
                                                <i data-feather="check" class="me-25"></i>
                                                <span>Play Now</span>
                                            </button>
                                        </div>

                                            <div class="col-md-2 col-12 mb-50">
                                                <div class="mb-1">
                                                    <label class="form-label" for="itemcost">Name</label>
                                                    <input id="itemcost" type="text" class="form-control"
                                                        name="videopreview[{{ $counter }}][heading]"
                                                        value="{{ $video->heading }}" aria-describedby="itemcost"
                                                        placeholder="32" />
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12 mb-50">
                                                <div class="mb-1">
                                                    <label class="form-label" for="itemquantity">Short Description</label>
                                                    <input id="itemquantity" type="text" class="form-control"
                                                        name="videopreview[{{ $counter }}][description]"
                                                        value="{{ $video->description }}" aria-describedby="itemquantity"
                                                        placeholder="1" />
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12 mb-50">
                                                <div class="mb-1">
                                                    <button class="btn btn-outline-danger text-nowrap px-1" type="button"
                                                        data-repeater-delete onclick="deleted_video('{{ $counter }}');">
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
                            @endforeach

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
        var deleted_video = function(event) {

            var data = new FormData();
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/codebumble/delete-slider-video/' + event, true);
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

        var play = function(event) {

      Swal.fire({
        html:
            '<div class="row mt-2">'+
          '<video class="video-player plyr__controls" crossorigin controls allowfullscreen allow="autoplay"  id="plyr-video-player">' +
          '<source src="'+event+'" type="video/mp4" />' +
          '</video>'+
          '</div>',
        showCloseButton: true,
        showCancelButton: true,
        showConfirmButton: false,
        focusConfirm: false,
        confirmButtonText: feather.icons['thumbs-up'].toSvg({ class: 'font-medium-1 me-50' }) + 'Great!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
        cancelButtonText: 'Close',
        cancelButtonAriaLabel: 'Thumbs down',
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false
      });

        };

        const player = new Plyr('#plyr-video-player');
    </script>

@endsection
