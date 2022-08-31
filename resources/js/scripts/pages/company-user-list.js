/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Project-Octa - Codebumble - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Codebumble
    Author URL: http://www.codebumble.net

==========================================================================================*/
$(function () {
	("use strict");

	var dtUserTable = $(".user-list-table"),
		newUserSidebar = $(".new-user-modal"),
		newUserForm = $(".add-new-user"),
		select = $(".select2"),
		dtContact = $(".dt-contact"),
		statusObj = {
			0: { title: "Suspended", class: "badge-light-danger" },
			1: { title: "Active", class: "badge-light-success" },
			2: { title: "Inactive", class: "badge-light-secondary" },
		};

	var assetPath = "../../../app-assets/",
		userView = "app-user-view-account.html";

	if ($("body").attr("data-framework") === "laravel") {
		assetPath = $("body").attr("data-asset-path");
		userView = assetPath + "admin/visitor/";
		baseView = window.location.origin;
	}

	select.each(function () {
		var $this = $(this);
		$this.wrap('<div class="position-relative"></div>');
		$this.select2({
			// the following code is used to disable x-scrollbar when click in select input and
			// take 100% width in responsive also
			dropdownAutoWidth: true,
			width: "100%",
			dropdownParent: $this.parent(),
		});
	});

	// Users List datatable
	if (dtUserTable.length) {
		dtUserTable.DataTable({
			ajax: baseView + "/admin/company-user-list-api", // JSON file to add data
			columns: [
				// columns according to JSON
				{ data: "" },
				{ data: "name" },
				{ data: "designation" },
				{ data: "role" },
				{ data: "json_data" },
			],
			columnDefs: [
				{
					// For Responsive
					className: "control",
					orderable: false,
					responsivePriority: 2,
					targets: 0,
					render: function (data, type, full, meta) {
						return "";
					},
				},
				{
					// User full name and username
					targets: 1,
					responsivePriority: 4,
					render: function (data, type, full, meta) {
						var $name = full["name"],
							$email = full["email"],
							$username = full["username"],
							$image = full["avatar"];
						if ($image) {
							// For Avatar image
							var $output =
								'<img src="' +
								assetPath +
								"profile-images/" +
								$image +
								'" alt="Avatar" height="32" width="32">';
						} else {
							// For Avatar badge
							var stateNum = Math.floor(Math.random() * 6) + 1;
							var states = [
								"success",
								"danger",
								"warning",
								"info",
								"dark",
								"primary",
								"secondary",
							];
							var $state = states[stateNum],
								$name = full["name"],
								$initials = $name.match(/\b\w/g) || [];
							$initials = (
								($initials.shift() || "") +
								($initials.pop() || "")
							).toUpperCase();
							$output =
								'<span class="avatar-content">' +
								$initials +
								"</span>";
						}
						var colorClass =
							$image === "" ? " bg-light-" + $state + " " : "";
						// Creates full output for row
						var $row_output =
							'<div class="d-flex justify-content-left align-items-center">' +
							'<div class="avatar-wrapper">' +
							'<div class="avatar ' +
							colorClass +
							' me-1">' +
							$output +
							"</div>" +
							"</div>" +
							'<div class="d-flex flex-column">' +
							'<a href="' +
							userView +
							"" +
							$username +
							'" class="user_name text-truncate text-body"><span class="fw-bolder">' +
							$name +
							"</span></a>" +
							'<small class="emp_post text-muted"> (' +
							$email +
							")</small>" +
							"</div>" +
							"</div>";
						return $row_output;
					},
				},
				{
					// User Role
					targets: 3,
					render: function (data, type, full, meta) {
						var $role = full["role"];
						var roleBadgeObj = {
							'sub-employee': feather.icons["user"].toSvg({
								class: "font-medium-3 text-primary me-50 text-capitalize",
							}),
							'employee': feather.icons["settings"].toSvg({
								class: "font-medium-3 text-warning me-50 text-capitalize",
							}),
							manager: feather.icons["database"].toSvg({
								class: "font-medium-3 text-success me-50 text-capitalize",
							}),
							'super-admin': feather.icons["edit-2"].toSvg({
								class: "font-medium-3 text-info me-50 text-capitalize",
							}),
							admin: feather.icons["slack"].toSvg({
								class: "font-medium-3 text-danger me-50 text-capitalize",
							}),
						};
						return (
							"<span class='text-truncate align-middle'>" +
							roleBadgeObj[$role] +
							'<span class="text-capitalize">' +
							$role +
							"</span></span>"
						);
					},
				},
				// {
				//   targets: 4,
				//   render: function (data, type, full, meta) {
				//     var $billing = full['billing'];

				//     return '<span class="text-nowrap">' + $billing + '</span>';
				//   }
				// },
				{
					// User Status
					targets: 4,
					render: function (data, type, full, meta) {
						var $status = full["json_data"];

						return (
							'<span class="badge rounded-pill ' +
							statusObj[$status].class +
							'" text-capitalized>' +
							statusObj[$status].title +
							"</span>"
						);
					},
				},

			],
			order: [[1, "desc"]],
			dom:
				'<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
				'<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
				'<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
				">t" +
				'<"d-flex justify-content-between mx-2 row mb-1"' +
				'<"col-sm-12 col-md-6"i>' +
				'<"col-sm-12 col-md-6"p>' +
				">",
			language: {
				sLengthMenu: "Show _MENU_",
				search: "Search",
				searchPlaceholder: "Search..",
			},
			// Buttons with Dropdown
			buttons: [
			],
			// For responsive popup
			responsive: {
				details: {
					display: $.fn.dataTable.Responsive.display.modal({
						header: function (row) {
							var data = row.data();
							return "Details of " + data["full_name"];
						},
					}),
					type: "column",
					renderer: function (api, rowIdx, columns) {
						var data = $.map(columns, function (col, i) {
							return col.columnIndex !== 6 // ? Do not show row in modal popup if title is blank (for check box)
								? '<tr data-dt-row="' +
										col.rowIdx +
										'" data-dt-column="' +
										col.columnIndex +
										'">' +
										"<td>" +
										col.title +
										":" +
										"</td> " +
										"<td>" +
										col.data +
										"</td>" +
										"</tr>"
								: "";
						}).join("");
						return data
							? $('<table class="table"/>').append(
									"<tbody>" + data + "</tbody>"
							  )
							: false;
					},
				},
			},
			language: {
				paginate: {
					// remove previous & next text from pagination
					previous: "&nbsp;",
					next: "&nbsp;",
				},
			},
			initComplete: function () {
				// Adding role filter once table initialized
				this.api()
					.columns(2)
					.every(function () {
						var column = this;
						var label = $(
							'<label class="form-label" for="UserRole">Role</label>'
						).appendTo(".user_role");
						var select = $(
							'<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select Role </option></select>'
						)
							.appendTo(".user_role")
							.on("change", function () {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);
								column
									.search(
										val ? "^" + val + "$" : "",
										true,
										false
									)
									.draw();
							});

						column
							.data()
							.unique()
							.sort()
							.each(function (d, j) {
								select.append(
									'<option value="' +
										d +
										'" class="text-capitalize">' +
										d +
										"</option>"
								);
							});
					});
				// Adding status filter once table initialized
				this.api()
					.columns(3)
					.every(function () {
						var column = this;
						var label = $(
							'<label class="form-label" for="FilterTransaction">Status</label>'
						).appendTo(".user_status");
						var select = $(
							'<select id="FilterTransaction" class="form-select text-capitalize mb-md-0 mb-2xx"><option value=""> Select Status </option></select>'
						)
							.appendTo(".user_status")
							.on("change", function () {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);
								column
									.search(
										val ? "^" + val + "$" : "",
										true,
										false
									)
									.draw();
							});

						column
							.data()
							.unique()
							.sort()
							.each(function (d, j) {
								select.append(
									'<option value="' +
										statusObj[d].title +
										'" class="text-capitalize">' +
										statusObj[d].title +
										"</option>"
								);
							});
					});
			},
		});
	}

	// Form Validation
	if (newUserForm.length) {
		newUserForm.validate({
			errorClass: "error",
			rules: {
				"user-fullname": {
					required: true,
				},
				"user-name": {
					required: true,
				},
				"user-email": {
					required: true,
				},
			},
		});

		newUserForm.on("submit", function (e) {
			var isValid = newUserForm.valid();
			e.preventDefault();
			if (isValid) {
				newUserSidebar.modal("hide");
			}
		});
	}

	// Phone Number
	if (dtContact.length) {
		dtContact.each(function () {
			new Cleave($(this), {
				phone: true,
				phoneRegionCode: "US",
			});
		});
	}
});
