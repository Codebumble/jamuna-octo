/*=========================================================================================
    File Name: components-collapse.js
    ----------------------------------------------------------------------------------------
    Item Name: Project-Octa - Codebumble - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Codebumble
    Author URL: hhttp://www.themeforest.net/user/Codebumble Inc.
==========================================================================================*/
(function (window, document, $) {
  'use strict';

  var accordion = $('.accordion'),
    collapseHoverTitle = $('.accordion-hover-title');

  // To open Collapse on hover
  if (accordion.attr('data-toggle-hover', 'true')) {
    collapseHoverTitle.closest('.accordion-item').on('mouseenter', function () {
      $(this).children('.collapse').collapse('show');
    });
  }

})(window, document, jQuery);
