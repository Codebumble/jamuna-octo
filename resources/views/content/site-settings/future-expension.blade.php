@extends('layouts/contentLayoutMaster')

@section('title', 'Future Expension')

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
                                    <a class="nav-link" href="{{ route('mission_vision_view') }}">
                                        <i data-feather="trending-up" class="font-medium-3 me-50"></i>
                                        <span class="fw-bold">Mission & Vision</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('future_expension_view') }}">
                                        <i data-feather="trending-up" class="font-medium-3 me-50"></i>
                                        <span class="fw-bold">Future Expension</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="faker" class="demo-spacing-0 d-none mb-2">
                            <div class="alert alert-warning" role="alert">
                                <div class="alert-body"><strong>Data Updated ! It may take a little bit time to
                                        Update.</strong></div>
                            </div>
                        </div>

                        <form action="#" class="invoice-repeater">
                            <div class="row">

                                <div class="divider-primary divider">
                                    <div class="divider-text">Heading</div>
                                </div>
                                <div class="col-12 mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemname">Title</label>
                                        <input type="text" class="form-control" name="title" value="Mission & Vision"
                                            aria-describedby="itemname" placeholder="Vuexy Admin Template" />
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label class="d-block form-label" for="validationBioBootstrap">Description</label>
                                    <textarea id="validationBioBootstrap" class="form-control" name="description" rows="3" required>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?</textarea>
                                </div>
                                <div class="divider-primary divider">
                                    <div class="divider-text">Items</div>
                                </div>
                                <div class="col-12 col-lg-6 mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemname">Item 1</label>
                                        <input type="text" class="form-control" name="title" value="Mission & Vision"
                                            aria-describedby="itemname" placeholder="Vuexy Admin Template" />
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemname">Item 2</label>
                                        <input type="text" class="form-control" name="title" value="Mission & Vision"
                                            aria-describedby="itemname" placeholder="Vuexy Admin Template" />
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemname">Item 3</label>
                                        <input type="text" class="form-control" name="title" value="Mission & Vision"
                                            aria-describedby="itemname" placeholder="Vuexy Admin Template" />
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemname">Item 4</label>
                                        <input type="text" class="form-control" name="title" value="Mission & Vision"
                                            aria-describedby="itemname" placeholder="Vuexy Admin Template" />
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemname">Item 5</label>
                                        <input type="text" class="form-control" name="title"
                                            value="Mission & Vision" aria-describedby="itemname"
                                            placeholder="Vuexy Admin Template" />
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemname">Item 6</label>
                                        <input type="text" class="form-control" name="title"
                                            value="Mission & Vision" aria-describedby="itemname"
                                            placeholder="Vuexy Admin Template" />
                                    </div>
                                </div>




                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-icon btn-success m-1" type="button"
                                        onclick="event.preventDefault();document.getElementById('faker').classList.remove('d-none');">
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
