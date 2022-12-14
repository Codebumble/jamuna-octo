/*=========================================================================================
    File Name: ext-component-media-player.js
    Description: Media Plyr Extenstion
    --------------------------------------------------------------------------------------
    Item Name: Project-Octa - Codebumble - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Codebumble
    Author URL: http://www.codebumble.net
==========================================================================================*/

$(function () {
  'use strict';

  // video player  define
  if ($('.video-player')) {
    var player = new Plyr('.video-player', {
      tooltips: {
        controls: true
      }
    });
  }

  // audio player define
  if ($('.audio-player')) {
    var player1 = new Plyr('.audio-player');
  }
});
