@extends('layouts/contentLayoutMaster')

@section('title', 'Privacy Policy')

@section('content')
    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Privacy Policy</h4>
                    </div>
                    <div class="card-body">
                        @if (isset($_GET['exist']))
                            <div class="demo-spacing-0 mb-2">
                                <div class="alert alert-warning" role="alert">
                                    <div class="alert-body"><strong>{{ $_GET['exist'] }}</strong></div>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('privacy_update') }}" class="invoice-repeater" method="POST">
                            @csrf
                            <div class="row d-flex align-items-end">
                                <div class="col-12 col-lg-6 mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemname">Page Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $data->title }}" aria-describedby="title" placeholder="Page Title" />
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemname">Update Date</label>
                                        <input id="datePicker" type="text" class="form-control" name="time"
                                            aria-describedby="date" placeholder="date" readonly />
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label class="d-block form-label" for="validationBioBootstrap">Content</label>
                                    <textarea id="content" class="form-control" name="content" rows="3" required>{{ $data->content }}</textarea>
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

@section('page-script')
    <script>
        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0, 10);
        });
        document.getElementById('datePicker').value = new Date().toDateInputValue();
    </script>
@endsection
