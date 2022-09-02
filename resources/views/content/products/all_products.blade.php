@extends('layouts/detachedLayoutMaster')

@section('title', 'Product List')

@section('vendor-style')
    <!-- Vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/nouislider.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sliders.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-ecommerce.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">

    <style>
        .content-header-title {
            border-right: none !important;
        }

        .breadcrumb-wrapper {
            display: none !important;
        }
    </style>
@endsection



@section('content')
    <!-- E-commerce Content Section Starts -->


    <!-- E-commerce Products Starts -->
    <section id="ecommerce-products" class="grid-view">
        @foreach ($data as $d)
            <div class="card ecommerce-card">
                <div class="item-img d-block text-center">
                    <a href="#">
                        <img class="img-fluid card-img-top"
                            style="height: 18rem; object-fit: cover; max-width: 100%;margin: auto; padding: 1rem"
                            src="{{ $d->image }}" alt="img-placeholder" /></a>
                </div>
                <div class="card-body">
                    <div class="item-wrapper">

                        <div>
                            <h6 class="item-price">{{ $d->price }}</h6>
                        </div>
                    </div>
                    <h6 class="item-name">
                        <a class="text-body" href="#">{{ $d->name }}</a>
                        <span class="card-text item-company">By <a href="#"
                                class="company-name">{{ $d->company }}</a></span>
                    </h6>
                    <p class="card-text item-description">
                        {{ $d->short_description }}
                    </p>
                </div>
                <div class="item-options text-center">
                    <div class="item-wrapper">
                        <div class="item-cost">
                            <h4 class="item-price">{{ $d->price }}</h4>
                        </div>
                    </div>
                    <a href="{{ route('auth_edit_product_page', ['id' => $d->id]) }}" class="btn btn-light btn-wishlist">
                        <i data-feather="heart"></i>
                        <span>Edit</span>
                    </a>
                    <a href="{{ route('delete_product', ['id' => $d->id]) }}" class="btn btn-warning btn-cart">
                        <i data-feather="eye-off"></i>
                        <span class="add-to-cart">Delete</span>
                    </a>
                </div>
            </div>
        @endforeach

    </section>
    <!-- E-commerce Products Ends -->

    <!-- E-commerce Pagination Starts -->
    <section id="ecommerce-pagination">
        <div class="row">
            <div class="col-sm-12">

                {{-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center mt-2">
          <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item" aria-current="page"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item"><a class="page-link" href="#">6</a></li>
          <li class="page-item"><a class="page-link" href="#">7</a></li>
          <li class="page-item next-item"><a class="page-link" href="#"></a></li>
        </ul>
      </nav> --}}
            </div>
        </div>
    </section>
    <!-- E-commerce Pagination Ends -->
@endsection

@section('vendor-script')
    <!-- Vendor js files -->
    <script src="{{ asset(mix('vendors/js/extensions/wNumb.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/nouislider.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/app-all-product.js')) }}"></script>
@endsection
