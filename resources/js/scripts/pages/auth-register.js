/*=========================================================================================
  File Name: auth-register.js
  Description: Auth register js file.
  ----------------------------------------------------------------------------------------
  Item Name: Project-Octa - Codebumble - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Codebumble
  Author URL: http://www.codebumble.net
==========================================================================================*/

$(function () {
  ('use strict');

  var assetsPath = '../../../app-assets/',
    registerMultiStepsWizard = document.querySelector('.register-multi-steps-wizard'),
    pageResetForm = $('.auth-register-form'),
    select = $('.select2'),
    creditCard = $('.credit-card-mask'),
    expiryDateMask = $('.expiry-date-mask'),
    cvvMask = $('.cvv-code-mask'),
    mobileNumberMask = $('.mobile-number-mask'),
    pinCodeMask = $('.pin-code-mask');

  if ($('body').attr('data-framework') === 'laravel') {
    assetsPath = $('body').attr('data-asset-path');
  }

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageResetForm.length) {
    pageResetForm.validate({
      /*
      * ? To enable validation onkeyup
      onkeyup: function (element) {
        $(element).valid();
      },*/
      /*
      * ? To enable validation on focusout
      onfocusout: function (element) {
        $(element).valid();
      }, */
      rules: {
        'register-username': {
          required: true
        },
        'register-email': {
          required: true,
          email: true
        },
        'register-password': {
          required: true
        }
      }
    });
  }

  // multi-steps registration
  // --------------------------------------------------------------------

  // Horizontal Wizard
  if (typeof registerMultiStepsWizard !== undefined && registerMultiStepsWizard !== null) {
    var numberedStepper = new Stepper(registerMultiStepsWizard),
      $form = $(registerMultiStepsWizard).find('form');
    $form.each(function () {
      var $this = $(this);
      $this.validate({
        rules: {
          username: {
            required: true
          },
          email: {
            required: true
          },
          password: {
            required: true,
            minlength: 8
          },
          'confirm-password': {
            required: true,
            minlength: 8,
            equalTo: '#password'
          },
          'first-name': {
            required: true
          },
          'home-address': {
            required: true
          },
          addCard: {
            required: true
          }
        },
        messages: {
          password: {
            required: 'Enter new password',
            minlength: 'Enter at least 8 characters'
          },
          'confirm-password': {
            required: 'Please confirm new password',
            minlength: 'Enter at least 8 characters',
            equalTo: 'The password and its confirm are not the same'
          }
        }
      });
    });

    $(registerMultiStepsWizard)
      .find('.btn-next')
      .each(function () {
        $(this).on('click', function (e) {
          var isValid = $(this).parent().siblings('form').valid();
          if (isValid) {
            numberedStepper.next();
          } else {
            e.preventDefault();
          }
        });
      });

    $(registerMultiStepsWizard)
      .find('.btn-prev')
      .on('click', function () {
        numberedStepper.previous();
      });

    $(registerMultiStepsWizard)
      .find('.btn-submit')
      .on('click', function () {
        var isValid = $(this).parent().siblings('form').valid();
        if (isValid) {
          var username = $("#username").val(),
          email = $("#username").val(),
          password = $("#password").val(),
          image = $("#image")[0].files[0],
          company = $('#comapany option:selected').val(),
          name = $('#first-name').val()+' '+$('#last-name').val(),
          mobile_number = $('#mobile-number').val(),
          gender = $('#gender option:selected').val(),
          address = $('#home-address').val()+' ,'+$('#area-address').val(),
          city = $('#town-city').val(),
          country = $('#country option:selected').val(),
          role = $("input[name='role']:checked").val(),
          designation = $('#designation').val(),
          date_of_birth = $('#date_of_birth').val(),
          birth_certificate_number = $('#birth_certificate_number').val(),
          nid_number = $('#nid_number').val(),
          passport_number = $('#passport_number').val(),
          cd_company = $('#cd_company').val(),
          cv = $("#cv")[0].files[0],
          token = $("input[name='_token']").val(),
          isBoardofDirectors = document.getElementById("isBoardofDirectors"),
          isDistrict = document.getElementById("isDistrict");



          var formData = new FormData();
          formData.append("username", username);
          formData.append("email", email);
          formData.append("password", password);
          formData.append("image", image);
          formData.append("company", company);
          formData.append("name", name);
          formData.append("mobile_number", mobile_number);
          formData.append("gender", gender);
          formData.append("address", address);
          formData.append("city", city);
          formData.append("country", country);
          formData.append("role", role);
          formData.append("designation", designation);
          formData.append("date_of_birth", date_of_birth);
          formData.append("birth_certificate_number", birth_certificate_number);
          formData.append("nid_number", nid_number);
          formData.append("passport_number", passport_number);
          formData.append("csd_company", csd_company);
          formData.append("cd_company", csd_company);
          formData.append("cv", cv);
          formData.append("_token", token);

          if(isBoardofDirectors.checked == true){
            formData.append("isBoardofDirectors", "Yes");
          } else {
            formData.append("isBoardofDirectors", "No");
          }


          if(isDistrict.checked == true){
            formData.append("isDistrict", "Yes");
          } else {
            formData.append("isDistrict", "No");
          }

          if(isSubDistrict.checked == true){
            formData.append("isSubDistrict", "Yes");
          } else {
            formData.append("isSubDistrict", "No");
          }



          var xhr = new XMLHttpRequest();
          xhr.open('POST', '/codebumble/add_user', true);

          xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
              var percentComplete = (e.loaded / e.total) * 100;
              console.log(percentComplete + '% uploaded');
            }
          };

          xhr.onload = function() {
            if (this.status == 200) {
              location.href=this.response;
            };
          };
          xhr.send(formData);

        }
      });
  }

  // select2
  select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      // the following code is used to disable x-scrollbar when click in select input and
      // take 100% width in responsive also
      dropdownAutoWidth: true,
      width: '100%',
      dropdownParent: $this.parent()
    });
  });

  // credit card

  // Credit Card
  if (creditCard.length) {
    creditCard.each(function () {
      new Cleave($(this), {
        creditCard: true,
        onCreditCardTypeChanged: function (type) {
          const elementNodeList = document.querySelectorAll('.card-type');
          if (type != '' && type != 'unknown') {
            //! we accept this approach for multiple credit card masking
            for (let i = 0; i < elementNodeList.length; i++) {
              elementNodeList[i].innerHTML =
                '<img src="' + assetsPath + 'images/icons/payments/' + type + '-cc.png" height="24"/>';
            }
          } else {
            for (let i = 0; i < elementNodeList.length; i++) {
              elementNodeList[i].innerHTML = '';
            }
          }
        }
      });
    });
  }

  // Expiry Date Mask
  if (expiryDateMask.length) {
    new Cleave(expiryDateMask, {
      date: true,
      delimiter: '/',
      datePattern: ['m', 'y']
    });
  }

  // CVV
  if (cvvMask.length) {
    new Cleave(cvvMask, {
      numeral: true,
      numeralPositiveOnly: true
    });
  }

  // phone number mask
  if (mobileNumberMask.length) {
    new Cleave(mobileNumberMask, {
      phone: true,
      phoneRegionCode: 'US'
    });
  }

  // Pincode
  if (pinCodeMask.length) {
    new Cleave(pinCodeMask, {
      delimiter: '',
      numeral: true
    });
  }

  // multi-steps registration
  // --------------------------------------------------------------------
});
