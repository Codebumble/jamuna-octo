
@extends('layouts/contentLayoutMaster')

@section('title', 'Growth Story')

@section('content')
<section class="form-control-repeater">
  <div class="row">
    <!-- Invoice repeater -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Growth Story Chart</h4>
        </div>
        <div class="card-body">
			<div class="demo-spacing-0 mb-2 d-none" id="faker">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>Data Updated ! It may take a little bit time to Update.</strong></div>
                </div>
            </div>

          <form action="#" class="invoice-repeater">
            <div data-repeater-list="invoice">

              <div data-repeater-item>
                <div class="row d-flex align-items-end">

                  <div class="col-12 mb-1">
                    <div class="mb-1">
                      <label class="form-label" for="itemname">Date / Year</label>
                      <input
                        type="text"
                        class="form-control"
						name="date"
						value="1974"
                        aria-describedby="itemname"
                        placeholder="Vuexy Admin Template"
                      />
                    </div>
                  </div>

				  <div class="mb-1">
					<label class="d-block form-label" for="validationBioBootstrap">Incident</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="description"
							rows="3"
							required
						>The Group came into being. Mr.M.Nurul Islam, the architect of the Group, took up the challenge of bringing necessary technologies to Bangladeshi companies aiming to offset the bulk of foreign imports. His bold entrepreneurial spirit, progressive ideas and untiring efforts along with the devoted services of his colleagues, laid the strong foundation for success and future developments.</textarea>
				  </div>

                  <div class="col-md-2 col-12 mb-50">
                    <div class="mb-1">
                      <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                        <i data-feather="x" class="me-25"></i>
                        <span>Delete</span>
                      </button>
                    </div>
                  </div>

                </div>
                <hr />
              </div>

			  <div data-repeater-item>
                <div class="row d-flex align-items-end">

                  <div class="col-12 mb-1">
                    <div class="mb-1">
                      <label class="form-label" for="itemname">Date / Year</label>
                      <input
                        type="text"
                        class="form-control"
						name="date"
						value="1975"
                        aria-describedby="itemname"
                        placeholder="Vuexy Admin Template"
                      />
                    </div>
                  </div>

				  <div class="mb-1">
					<label class="d-block form-label" for="validationBioBootstrap">Incident</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="description"
							rows="3"
							required
						>The first flagship enterprise of the Group, Jamuna Electric Manufacturing Co. Ltd. started operation. It pioneered the manufacturing of electrical accessories and fittings in Bangladesh. It is also producing PVC-compound and pipes.</textarea>
				  </div>

                  <div class="col-md-2 col-12 mb-50">
                    <div class="mb-1">
                      <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
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
                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add New</span>
                </button>
				<button class="btn btn-icon btn-success m-1" type="button" onclick="event.preventDefault();document.getElementById('faker').classList.remove('d-none');">
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
  <script src="{{ asset(mix('js/scripts/forms/form-repeater-growth-story.js')) }}"></script>
@endsection
