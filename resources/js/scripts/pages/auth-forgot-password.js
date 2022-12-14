/*=========================================================================================
  File Name: auth-forgot-password.js
  Description: Auth forgot password js file.
  ----------------------------------------------------------------------------------------
  Item Name: Project-Octa - Codebumble - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Codebumble
  Author URL: http://www.codebumble.net
==========================================================================================*/

$(function () {
  'use strict';

  var pageForgotPasswordForm = $('.auth-forgot-password-form');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageForgotPasswordForm.length) {
    pageForgotPasswordForm.validate({
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
        'forgot-password-email': {
          required: true,
          email: true
        }
      }
    });
  }
});
