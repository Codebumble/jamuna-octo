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

	var fullEditor1 = new Quill("#full-container1 .editor", {
		bounds: "#full-container1 .editor",
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

	var fullEditor2 = new Quill("#full-container2 .editor", {
		bounds: "#full-container2 .editor",
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

	var fullEditor3 = new Quill("#full-container3 .editor", {
		bounds: "#full-container3 .editor",
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

	var fullEditor4 = new Quill("#full-container4 .editor", {
		bounds: "#full-container4 .editor",
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

	var fullEditor5 = new Quill("#full-container5 .editor", {
		bounds: "#full-container5 .editor",
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

	var fullEditor6 = new Quill("#full-container6 .editor", {
		bounds: "#full-container6 .editor",
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
		$(this).append(
			"<textarea name='cp[0][descriptions]' style='display:none' spellcheck='false'>" +
				fullEditor1.root.innerHTML.trim() +
				"</textarea>"
		);
	});
	$("#company-profile").on("submit", function () {
		$(this).append(
			"<textarea name='cp[1][awards]' style='display:none' spellcheck='false'>" +
				fullEditor2.root.innerHTML.trim() +
				"</textarea>"
		);
	});
	$("#company-profile").on("submit", function () {
		$(this).append(
			"<textarea name='cp[2][hdrCorporate]' style='display:none' spellcheck='false'>" +
				fullEditor3.root.innerHTML.trim() +
				"</textarea>"
		);
	});
	$("#company-profile").on("submit", function () {
		$(this).append(
			"<textarea name='cp[3][environment]' style='display:none' spellcheck='false'>" +
				fullEditor4.root.innerHTML.trim() +
				"</textarea>"
		);
	});
	$("#company-profile").on("submit", function () {
		$(this).append(
			"<textarea name='cp[4][goals]' style='display:none' spellcheck='false'>" +
				fullEditor5.root.innerHTML.trim() +
				"</textarea>"
		);
	});
	$("#company-profile").on("submit", function () {
		$(this).append(
			"<textarea name='cp[5][activities]' style='display:none' spellcheck='false'>" +
				fullEditor6.root.innerHTML.trim() +
				"</textarea>"
		);
	});

	// need to copy up case

	var editors = [
		fullEditor1,
		fullEditor2,
		fullEditor3,
		fullEditor4,
		fullEditor5,
		fullEditor6,
	];
})(window, document, jQuery);
