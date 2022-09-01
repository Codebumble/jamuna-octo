@extends('layouts/fullLayoutMaster')

@section('title', 'Register - ' . env('APP_NAME'))

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
            <!-- Brand logo-->
            <a class="brand-logo" href="#">
                <h2 class="brand-text text-primary ms-1">{{ env('APP_NAME') }}</h2>
            </a>
            <!-- /Brand logo-->

            <!-- Left Text-->
            <div class="col-lg-3 d-none d-lg-flex align-items-center p-0">
                <div class="w-100 d-lg-flex align-items-center justify-content-center">
                    <img class="img-fluid w-100" src="{{ asset('images/illustration/create-account.svg') }}"
                        alt="multi-steps" />
                </div>
            </div>
            <!-- /Left Text-->

            <!-- Register-->
            <div class="col-lg-9 d-flex align-items-center auth-bg px-sm-3 px-lg-5 px-2 pt-3">
                <div class="width-700 mx-auto">
                    <div class="bs-stepper register-multi-steps-wizard shadow-none">
                        <div class="bs-stepper-header px-0" role="tablist">
                            <div id="account-details-trigger" class="step" data-target="#account-details" role="tab">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="home" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Account</span>
                                        <span class="bs-stepper-subtitle">Enter username</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div id="personal-info-trigger" class="step" data-target="#personal-info" role="tab">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="user" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Personal</span>
                                        <span class="bs-stepper-subtitle">Enter Information</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div id="billing-trigger" class="step" data-target="#billing" role="tab">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="credit-card" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Additional</span>
                                        <span class="bs-stepper-subtitle">Helpful Details</span>
                                    </span>
                                </button>
                            </div>

                        </div>
                        <div class="bs-stepper-content mt-4 px-0">
                            <div id="account-details" class="content" role="tabpanel"
                                aria-labelledby="account-details-trigger">
                                <div class="content-header mb-2">
                                    <h2 class="fw-bolder mb-75">Account Information</h2>
                                    <span>Enter your username password details</span>
                                </div>
                                <form>
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="username">Username</label>
                                            <input id="username" type="text" name="username" class="form-control"
                                                placeholder="johndoe" />
                                        </div>

                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="email">Email</label>
                                            <input id="email" type="email" name="email" class="form-control"
                                                placeholder="john.doe@email.com" aria-label="john.doe" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input id="password" type="password" name="password" class="form-control"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="confirm-password">Confirm Password</label>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input id="confirm-password" type="password" name="confirm-password"
                                                    class="form-control"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="multiStepsURL">Formal Image</label>
                                            {{-- <input
                      type="text"
                      name="multiStepsURL"
                      id="multiStepsURL"
                      class="form-control"
                      placeholder="johndoe/profile"
                      aria-label="johndoe"
                    /> --}}
                                            <input id="image" class="form-control" type="file" name="image"
                                                required />
                                        </div>

                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="company">Company Name</label>
                                            <select id="comapany" class="select2 w-100" name="company" required>
                                                <option value="" selected></option>
                                                @foreach ($companys as $company)
                                                    <option value="{{ $company->name }}">{{ $company->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>
                                </form>

                                <div class="d-flex justify-content-between mt-2">
                                    <button class="btn btn-outline-secondary btn-prev" disabled>
                                        <i data-feather="chevron-left" class="me-sm-25 me-0 align-middle"></i>
                                        <span class="d-sm-inline-block d-none align-middle">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="d-sm-inline-block d-none align-middle">Next</span>
                                        <i data-feather="chevron-right" class="ms-sm-25 ms-0 align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="personal-info" class="content" role="tabpanel"
                                aria-labelledby="personal-info-trigger">
                                <div class="content-header mb-2">
                                    <h2 class="fw-bolder mb-75">Personal Information</h2>
                                    <span>Enter your Information</span>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="first-name">First Name</label>
                                            <input id="first-name" type="text" name="first-name" class="form-control"
                                                placeholder="John" />
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="last-name">Last Name</label>
                                            <input id="last-name" type="text" name="last-name" class="form-control"
                                                placeholder="Doe" />
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="mobile-number">Mobile number</label>
                                            <input id="mobile-number" type="text" name="mobile-number"
                                                class="form-control mobile-number-mask" placeholder="+8801700000000" />
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="gender">Gender</label>
                                            <select id="gender" class="select2 w-100" name="gender" required>
                                                <option value="Male" selected>Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>

                                        <div class="col-12 mb-1">
                                            <label class="form-label" for="home-address">Home Address</label>
                                            <input id="home-address" type="text" name="home-address"
                                                class="form-control" placeholder="Address" required />
                                        </div>

                                        <div class="col-12 mb-1">
                                            <label class="form-label" for="area-address">Area, Street, Sector,
                                                Village</label>
                                            <input id="area-address" type="text" name="area-address"
                                                class="form-control" placeholder="Area, Street, Sector, Village" />
                                        </div>

                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="town-city">Town/City</label>
                                            <input id="town-city" type="text" name="town-city" class="form-control"
                                                placeholder="Town/City" required />
                                        </div>

                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="country">Country</label>
                                            <select id="country" class="select2 w-100" name="country">
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Åland Islands">Åland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean
                                                    Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic
                                                    Republic of The</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                                </option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories
                                                </option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald
                                                    Islands</option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)
                                                </option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of
                                                </option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic
                                                    People's Republic of</option>
                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao People's Democratic Republic">Lao People's Democratic
                                                    Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The
                                                    Former Yugoslav Republic of</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated
                                                    States of</option>
                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                                    Occupied</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                                </option>
                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The
                                                    Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia and The South Sandwich Islands">South Georgia
                                                    and The South Sandwich Islands</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of
                                                </option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-leste">Timor-leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor
                                                    Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viet Nam">Viet Nam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>

                                <div class="d-flex justify-content-between mt-2">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="chevron-left" class="me-sm-25 me-0 align-middle"></i>
                                        <span class="d-sm-inline-block d-none align-middle">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="d-sm-inline-block d-none align-middle">Next</span>
                                        <i data-feather="chevron-right" class="ms-sm-25 ms-0 align-middle"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="billing" class="content" role="tabpanel" aria-labelledby="billing-trigger">
                                <div class="content-header mb-2">
                                    <h2 class="fw-bolder mb-75">Select Role</h2>
                                    <span>Select Best One for The User Based on his/her work</span>
                                </div>

                                <form>
                                    <!-- select roll options -->
                                    <div class="row custom-options-checkable gx-3 gy-2">





                                        @if (Auth::user()->role == 'super-admin')
                                            <div class="col-md-4">
                                                <input id="super-admin" class="custom-option-item-check" type="radio"
                                                    name="role" value="super-admin" />

                                                <label class="custom-option-item p-1 text-center" for="super-admin">
                                                    <span class="custom-option-item-title h3 fw-bolder">Super Admin</span>
                                                    <span class="d-block m-75">Can Do Everything.</span>

                                                </label>
                                            </div>
                                        @endif

                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super-admin')
                                            <div class="col-md-4">
                                                <input id="admin" class="custom-option-item-check" type="radio"
                                                    name="role" value="admin" checked />
                                                <label class="custom-option-item p-1 text-center" for="admin">
                                                    <span class="custom-option-item-title h3 fw-bolder">Admin</span>
                                                    <span class="d-block m-75">Can terminate user and manage site
                                                        settings</span>

                                                </label>
                                            </div>
                                        @endif

                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super-admin' || Auth::user()->role == 'manager')
                                            <div class="col-md-4">
                                                <input id="bussiness-manager" class="custom-option-item-check"
                                                    type="radio" name="role" value="manager" />
                                                <label class="custom-option-item p-1 text-center" for="bussiness-manager">
                                                    <span class="custom-option-item-title h3 fw-bolder">Business
                                                        Manager</span>
                                                    <span class="d-block m-75">Can terminate user and Add a company</span>

                                                </label>
                                            </div>
                                        @endif

                                        @if (Auth::user()->role == 'admin' ||
                                            Auth::user()->role == 'super-admin' ||
                                            Auth::user()->role == 'manager' ||
                                            Auth::user()->role == 'employee')
                                            <div class="col-md-4">
                                                <input id="employee" class="custom-option-item-check" type="radio"
                                                    name="role" value="employee" />
                                                <label class="custom-option-item p-1 text-center" for="employee">
                                                    <span class="custom-option-item-title h3 fw-bolder">Employee</span>
                                                    <span class="d-block m-75">Can Edit Own Profile and Invite Other
                                                        Employee and Sub Employee</span>

                                                </label>
                                            </div>
                                        @endif

                                        @if (Auth::user()->role == 'admin' ||
                                            Auth::user()->role == 'super-admin' ||
                                            Auth::user()->role == 'manager' ||
                                            Auth::user()->role == 'employee' ||
                                            Auth::user()->role == 'sub-employee')
                                            <div class="col-md-4">
                                                <input id="sub-employee" class="custom-option-item-check" type="radio"
                                                    name="role" value="sub-employee" />
                                                <label class="custom-option-item p-1 text-center" for="sub-employee">
                                                    <span class="custom-option-item-title h3 fw-bolder">Sub-Employee</span>
                                                    <span class="d-block m-75">Can Edit Own Profile and Invite
                                                        Sub-Employee</span>

                                                </label>
                                            </div>
                                        @endif

                                    </div>
                                    <!-- / select plan options -->

                                    <div class="content-header my-2 py-1">
                                        <h2 class="fw-bolder mb-75">Additional Information</h2>
                                        <span>Enter Those Additional Information About The User</span>
                                    </div>

                                    <div class="row gx-2">
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="designation">Designation</label>
                                            <input id="designation" type="text" class="form-control"
                                                name="designation" placeholder="IT Head" required />
                                        </div>

                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="date_of_birth">Date of Birth</label>
                                            <input id="date_of_birth" type="date" name="date_of_birth"
                                                class="form-control" placeholder="2022-08-11" required />
                                        </div>

                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="birth_certificate_number">Birth Certificate
                                                Number</label>
                                            <input id="birth_certificate_number" type="text"
                                                name="birth_certificate_number" class="form-control"
                                                placeholder="1234567890" />
                                        </div>

                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="nid_number">National ID Card Number</label>
                                            <input id="nid_number" type="text" name="nid_number" class="form-control"
                                                placeholder="1234562232421" />
                                        </div>

                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="passport_number">Passport Number</label>
                                            <input id="passport_number" type="text" name="passport_number"
                                                class="form-control" placeholder="1234562232421" />
                                        </div>



                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super-admin')
                                            <div class="col-12 mb-1 mt-1">
                                                <div class="form-check form-check-secondary">
                                                    <input id="isBoardofDirectors" type="checkbox"
                                                        class="form-check-input" />
                                                    <label class="form-check-label" for="isBoardofDirectors">Show in Board
                                                        of Directors.</label>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-1 mt-1">
                                                <div class="form-check form-check-secondary">
                                                    <input id="isDistrict" type="checkbox" class="form-check-input" />
                                                    <label class="form-check-label" for="isDistrict">Show in
                                                        "Correspondence by District"</label>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-1 mt-1">
                                                <label class="form-label" for="company">If Yes, Correspondence by
                                                    District Company Name :</label>
                                                <select id="cd_company" class="select2 w-100" name="cd_company">
                                                    <option value="" selected></option>
                                                    @foreach ($companys as $company)
                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>


                                        @endif


                                    </div>
                                </form>

                                <div class="d-flex justify-content-between mt-1">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="chevron-left" class="me-sm-25 me-0 align-middle"></i>
                                        <span class="d-sm-inline-block d-none align-middle">Previous</span>
                                    </button>
                                    <button class="btn btn-success btn-submit" type="submit">
                                        <i data-feather="check" class="me-sm-25 me-0 align-middle"></i>
                                        <span class="d-sm-inline-block d-none align-middle">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/pages/auth-register.js')) }}"></script>
    <script></script>
@endsection
