@extends('layouts/contentLayoutMaster')

@section('title', 'Future Expension')

@section('content')
    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Future Expension Details</h4>
                    </div>
                    <div class="card-body">



                        <form action="{{ route('about_us_update') }}" class="invoice-repeater" method="POST">
                            @csrf
                            <div class="row">

                                <div class="divider-primary divider">
                                    <div class="divider-text">Heading</div>
                                </div>
                                <div class="col-12 mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemname">Title</label>
                                        <input type="text" class="form-control" name="top[title]"
                                            value="{{ $top->title }}" aria-describedby="itemname"
                                            placeholder="{{ $top->title }}" />
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label class="d-block form-label" for="validationBioBootstrap">Description</label>
                                    <textarea id="validationBioBootstrap" class="form-control" name="top[desc]" rows="3" required>{{ $top->desc }}</textarea>
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
