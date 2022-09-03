
@extends('layouts/contentLayoutMaster')

@section('title', 'Applicant Table')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection


@section('content')

<!-- Advanced Search -->
<section id="advanced-search-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-bottom">
          <h4 class="card-title">Applicant Data Table</h4>
        </div>
        <!--Search Form -->
        <div class="card-body mt-2">
          <form class="dt_adv_search" method="POST">
            <div class="row g-1 mb-md-1">
              <div class="col-md-4">
                <label class="form-label">Name:</label>
                <input
                  type="text"
                  class="form-control dt-input dt-full-name"
                  data-column="1"
                  placeholder="Alaric Beslier"
                  data-column-index="1"
                />
              </div>
              <div class="col-md-4">
                <label class="form-label">Gender</label>
                <input
                  type="text"
                  class="form-control dt-input"
                  data-column="3"
                  placeholder="Male"
                  data-column-index="3"
                />
              </div>

              <div class="col-md-4">
                <label class="form-label">Company</label>
                <input
                  type="text"
                  class="form-control dt-input"
                  data-column="4"
                  placeholder="Codebumble Inc"
                  data-column-index="4"
                />
              </div>
              </div>

              <div class="row g-1">
              <div class="col-md-4">
                <label class="form-label">Job ID</label>
                <input
                  type="text"
                  class="form-control dt-input"
                  data-column="5"
                  placeholder="2"
                  data-column-index="5"
                />
              </div>



              <div class="col-md-4">
                <label class="form-label">Division:</label>
                <input
                  type="text"
                  class="form-control dt-input"
                  data-column="6"
                  placeholder="Dhaka"
                  data-column-index="6"
                />
              </div>
              <div class="col-md-4">
                <label class="form-label">District:</label>
                <input
                  type="text"
                  class="form-control dt-input"
                  data-column="7"
                  placeholder="Dhaka"
                  data-column-index="7"
                />
              </div>

              <div class="col-md-4">
                <label class="form-label">Experience:</label>
                <input
                  type="text"
                  class="form-control dt-input"
                  data-column="9"
                  placeholder="2 Years"
                  data-column-index="9"
                />
              </div>
            </div>
          </form>
        </div>
        <hr class="my-0" />
        <div class="card-datatable">
          <table class="dt-advanced-search table">
            <thead>
              <tr>
                <th></th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Company</th>
                <th>Job Id</th>
                <th>District</th>
                <th>Devision</th>
                <th>Qualification</th>
                <th>Experience</th>
                <th>CV</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th></th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Company</th>
                <th>Job Id</th>
                <th>District</th>
                <th>Devision</th>
                <th>Qualification</th>
                <th>Experience</th>
                <th>CV</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Advanced Search -->

@endsection


@section('vendor-script')
{{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}

  <script src="{{ asset(mix('js/scripts/tables/table-applicant-list.js')) }}"></script>
@endsection
