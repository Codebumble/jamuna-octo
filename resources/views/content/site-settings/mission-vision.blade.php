@extends('layouts/contentLayoutMaster')

@section('title', 'Mission Vision')

@section('content')
    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Mission Vision Details</h4>
                    </div>
                    <div class="card-body">

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
                                    <a class="nav-link" href="{{ route('front_page_slider_view') }}">
                                        <i data-feather="lock" class="font-medium-3 me-50"></i>
                                        <span class="fw-bold">Sliders</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('mission_vision_view') }}">
                                        <i data-feather="trending-up" class="font-medium-3 me-50"></i>
                                        <span class="fw-bold">Mission & Vision</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        @if (isset($_GET['exist']))
                            <div class="demo-spacing-0 mb-2">
                                <div class="alert alert-warning" role="alert">
                                <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                                </div>
                            </div>
                        @endif

                        <form action="{{route('mission-vision-update')}}" class="invoice-repeater" method="POST">
                        @csrf
                            <div class="row">

                                <div class="col-12 mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="header">Header</label>
                                        <input type="text" class="form-control" name="top[header]" value="{{$top->header}}"
                                            aria-describedby="header" placeholder="header" />
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label class="d-block form-label" for="h_description">Header Description</label>
                                    <textarea id="validationBioBootstrap" class="form-control" name="top[h_description]" rows="3" required>{{$top->h_description}}</textarea>
                                </div>


                            <div data-repeater-list="data">

                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">

                                <div class="divider-primary divider">
                                    <div class="divider-text">Mission</div>
                                </div>
                                <div class="col-12 mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{$data[0]->title}}"
                                            aria-describedby="title" placeholder="" />
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label class="d-block form-label" for="desc">Description</label>
                                    <textarea id="desc" class="form-control" name="desc" rows="3" required>{{$data[0]->desc}}</textarea>
                                </div>

                                <div class="divider-primary divider">
                                    <div class="divider-text">Vision</div>
                                </div>
                            </div>

                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">

                                        <div class="col-12 mb-1">
                                            <div class="mb-1">
                                                <label class="form-label" for="title">Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{$data[1]->title}}" aria-describedby="title"
                                                    placeholder="title" />
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label class="d-block form-label"
                                                for="desc">Description</label>
                                            <textarea id="desc" class="form-control" name="desc" rows="3" required>{{$data[1]->desc}}.</textarea>
                                        </div>




                                    <div class="divider-primary divider">
                                        <div class="divider-text">Objective</div>
                                    </div>
                                </div>

                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">

                                        <div class="col-12 mb-1">
                                            <div class="mb-1">
                                                <label class="form-label" for="title">Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{$data[2]->title}}" aria-describedby="title"
                                                    placeholder="title" />
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label class="d-block form-label"
                                                for="desc">Description</label>
                                            <textarea id="desc" class="form-control" name="desc" rows="3" required>{{$data[2]->desc}}</textarea>
                                        </div>


                                    </div>
                                    <hr />
                                </div>



                            </div>
                            <div class="row">
                                <div class="col-12">
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
            <!-- /Invoice repeater -->
        </div>
    </section>
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-repeater-mission-vision.js')) }}"></script>
@endsection
