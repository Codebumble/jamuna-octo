/*=========================================================================================
    File Name: ext-component-drag-drop.js
    Description: drag & drop elements using dragula js
    --------------------------------------------------------------------------------------
    Item Name: Project-Octa - Codebumble - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Codebumble
    Author URL: http://www.codebumble.net
==========================================================================================*/

$(function () {
  'use strict';

  // Draggable Cards
  dragula([document.getElementById('card-drag-area')]);

  // Sortable Lists
  dragula([document.getElementById('basic-list-group')]);
  dragula([document.getElementById('multiple-list-group-a'), document.getElementById('multiple-list-group-b')]);

  // Cloning
  dragula([document.getElementById('badge-list-1'), document.getElementById('badge-list-2')], {
    copy: true
  });

  // With Handles

  dragula([document.getElementById('handle-list-1'), document.getElementById('handle-list-2')], {
    moves: function (el, container, handle) {
      return handle.classList.contains('handle');
    }
  });
});
