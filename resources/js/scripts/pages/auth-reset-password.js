/*=========================================================================================
  File Name: auth-reset-password.js
  Description: Auth reset password js file.
  ----------------------------------------------------------------------------------------
  Item Name: Project-Octa - Codebumble - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Codebumble
  Author URL: http://www.codebumble.net
==========================================================================================*/

$(function () {
  'use strict';

  var pageResetPasswordForm = $('.auth-reset-password-form');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageResetPasswordForm.length) {
    pageResetPasswordForm.validate({
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
        'reset-password-new': {
          required: true
        },
        'reset-password-confirm': {
          required: true,
          equalTo: '#reset-password-new'
        }
      }
    });
  }
});
