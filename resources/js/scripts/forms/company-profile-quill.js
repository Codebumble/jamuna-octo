/*=========================================================================================
	File Name: form-quill-editor.js
	Description: Quill is a modern rich text editor built for compatibility and extensibility.
	----------------------------------------------------------------------------------------
	Item Name: Project-Octa - Codebumble - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: Codebumble
  Author URL: http://www.codebumble.net
==========================================================================================*/
(function (window, document, $) {
	"use strict";

	var Font = Quill.import("formats/font");
	Font.whitelist = ["sofia", "slabo", "roboto", "inconsolata", "ubuntu"];
	Quill.register(Font, true);

	// Bubble Editor

	// Snow Editor

	// Full Editor

	var fullEditor = new Quill("#full-container .editor", {
		bounds: "#full-container .editor",
		modules: {
			formula: true,
			syntax: true,
			toolbar: [
				[
					{
						font: [],
					},
					{
						size: [],
					},
				],
				["bold", "italic", "underline", "strike"],
				[
					{
						color: [],
					},
					{
						background: [],
					},
				],
				[
					{
						script: "super",
					},
					{
						script: "sub",
					},
				],
				[
					{
						header: "1",
					},
					{
						header: "2",
					},
					"blockquote",
					"code-block",
				],
				[
					{
						list: "ordered",
					},
					{
						list: "bullet",
					},
					{
						indent: "-1",
					},
					{
						indent: "+1",
					},
				],
				[
					"direction",
					{
						align: [],
					},
				],
				["link", "image", "video", "formula"],
				["clean"],
			],
		},
		theme: "snow",
	});

	$("#company-profile").on("submit", function () {
		var hvalue = $("#ql-editor").html();
		$(this).append(
			"<textarea name='cp[descriptions]' style='display:none' spellcheck='false'>" +
				fullEditor.root.innerHTML.trim() +
				"</textarea>"
		);
	});

	var editors = [fullEditor];
})(window, document, jQuery);
