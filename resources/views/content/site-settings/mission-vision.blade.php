
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
			<div class="demo-spacing-0 mb-2 d-none" id="faker">
                <div class="alert alert-warning" role="alert">
                <div class="alert-body"><strong>Data Updated ! It may take a little bit time to Update.</strong></div>
                </div>
            </div>

          <form action="#" class="invoice-repeater">
					<div class="row">

		  				<div class="divider-primary divider">
            				<div class="divider-text">Header Information</div>
          				</div>
						<div class="col-12 mb-1">
                    <div class="mb-1">
                      <label class="form-label" for="itemname">Title</label>
                      <input
                        type="text"
                        class="form-control"
						name="title"
						value="Mission & Vision"
                        aria-describedby="itemname"
                        placeholder="Vuexy Admin Template"
                      />
                    </div>
                  </div>

				  <div class="mb-1">
					<label class="d-block form-label" for="validationBioBootstrap">Description</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="description"
							rows="3"
							required
						>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?</textarea>
				  </div>

						<div class="divider-primary divider">
            				<div class="divider-text">Mision Vision Data</div>
          				</div>
					</div>
            <div data-repeater-list="invoice">

              <div data-repeater-item>
                <div class="row d-flex align-items-end">

                  <div class="col-12 mb-1">
                    <div class="mb-1">
                      <label class="form-label" for="itemname">Title</label>
                      <input
                        type="text"
                        class="form-control"
						name="title"
						value="Mission Vision"
                        aria-describedby="itemname"
                        placeholder="Vuexy Admin Template"
                      />
                    </div>
                  </div>

				  <div class="mb-1">
					<label class="d-block form-label" for="validationBioBootstrap">Description</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="description"
							rows="3"
							required
						>Our mission is to produce and provide quality services and un innovative products for people, maintain ethical slandered in business operation, also ensuring benefit to the stakeholders and peoples of Bangladesh.</textarea>
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
                      <label class="form-label" for="itemname">Title</label>
                      <input
                        type="text"
                        class="form-control"
						name="title"
						value="Our Mission"
                        aria-describedby="itemname"
                        placeholder="Vuexy Admin Template"
                      />
                    </div>
                  </div>

				  <div class="mb-1">
					<label class="d-block form-label" for="validationBioBootstrap">Description</label>
						<textarea
							class="form-control"
							id="validationBioBootstrap"
							name="description"
							rows="3"
							required
						>We view business as a means to the material and social well being of the investors, employees at large leading to accretion of wealth through financial and moral gains as a part of the process of development of civilization.</textarea>
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
  <script src="{{ asset(mix('js/scripts/forms/form-repeater-mission-vision.js')) }}"></script>
@endsection
