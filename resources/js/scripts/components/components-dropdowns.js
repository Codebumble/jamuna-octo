/*=========================================================================================
    File Name: components-dropdown.js
    ----------------------------------------------------------------------------------------
    Item Name: Project-Octa - Codebumble - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Codebumble
    Author URL: hhttp://www.themeforest.net/user/Codebumble Inc.
==========================================================================================*/
(function (window, document, $) {
  'use strict';

  var dropdownMenuIcon = $('.dropdown-icon-wrapper .dropdown-item');

  // For Dropdown With Icons
  dropdownMenuIcon.on('click', function () {
    $('.dropdown-icon-wrapper .dropdown-toggle svg').remove();
    $(this).find('svg').clone().appendTo('.dropdown-icon-wrapper .dropdown-toggle');
    $('.dropdown-icon-wrapper .dropdown-toggle .dropdown-item').removeClass('dropdown-item');
  });
})(window, document, jQuery);
