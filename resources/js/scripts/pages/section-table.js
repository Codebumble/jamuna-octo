/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/
$(function () {
	('use strict');

	var dtUserTable = $('.user-list-table'),
	  newUserSidebar = $('.new-user-modal'),
	  newUserForm = $('.add-new-user'),
	  select = $('.select2'),
	  dtContact = $('.dt-contact');


	var assetPath = '../../../app-assets/',
	  userView = 'app-user-view-account.html';

	if ($('body').attr('data-framework') === 'laravel') {
	  assetPath = $('body').attr('data-asset-path');
	}

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

	// Users List datatable
	if (dtUserTable.length) {
	  dtUserTable.DataTable({
		ajax: baseView + '/codebumble/all-sector-api', // JSON file to add data
		columns: [
		  // columns according to JSON
		  { data: '' },
		  { data: 'id' },
		  { data: 'name' },
		  { data: '' }
		],
		columnDefs: [
		  {
			// For Responsive
			className: 'control',
			orderable: false,
			responsivePriority: 2,
			targets: 0,
			render: function (data, type, full, meta) {
			  return '';
			}
		  },
		  {
			// User full name and username
			targets: 1,
			responsivePriority: 4,
			render: function (data, type, full, meta) {
			  var $row_output = full[''];

			  return $row_output;
			}
		  },
		  {
			targets: 4,
			render: function (data, type, full, meta) {
			  var $billing = JSON.parse(full['json_data']);

			  return '<a style="text-decoration: none;" href="'+ userView +''+ $billing.added_by +'"><span class="text-nowrap">@' + $billing.added_by + '</span>';
			}
		  },
		  {
			// Actions
			targets: -1,
			title: 'Actions',
			orderable: false,
			render: function (data, type, full, meta) {
			  return (
				'<div class="btn-group">' +
				'<a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
				feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
				'</a>' +
				'<div class="dropdown-menu dropdown-menu-end">' +
				'<a href="'+baseView+'/admin/edit-company/'+full['id']+'" class="dropdown-item">' +
				feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) +
				'Edit</a>' +
				'<a href="'+baseView+'/admin/delete-company/'+full['id']+'" class="dropdown-item delete-record">' +
				feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' }) +
				'Delete</a></div>' +
				'</div>' +
				'</div>'
			  );
			}
		  }
		],
		order: [[1, 'desc']],
		dom:
		  '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
		  '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
		  '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
		  '>t' +
		  '<"d-flex justify-content-between mx-2 row mb-1"' +
		  '<"col-sm-12 col-md-6"i>' +
		  '<"col-sm-12 col-md-6"p>' +
		  '>',
		language: {
		  sLengthMenu: 'Show _MENU_',
		  search: 'Search',
		  searchPlaceholder: 'Search..'
		},
		// Buttons with Dropdown
		buttons: [
		  {
			extend: 'collection',
			className: 'btn btn-outline-secondary dropdown-toggle me-2',
			text: feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
			buttons: [
			  {
				extend: 'print',
				text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
				className: 'dropdown-item',
				exportOptions: { columns: [ 2, 3, 4, 5] }
			  },
			  {
				extend: 'csv',
				text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
				className: 'dropdown-item',
				exportOptions: { columns: [ 2, 3, 4, 5] }
			  },
			  {
				extend: 'excel',
				text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
				className: 'dropdown-item',
				exportOptions: { columns: [ 2, 3, 4, 5] }
			  },
			  {
				extend: 'pdf',
				text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
				className: 'dropdown-item',
				exportOptions: { columns: [ 2, 3, 4, 5] }
			  },
			  {
				extend: 'copy',
				text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
				className: 'dropdown-item',
				exportOptions: { columns: [ 2, 3, 4, 5] }
			  }
			],
			init: function (api, node, config) {
			  $(node).removeClass('btn-secondary');
			  $(node).parent().removeClass('btn-group');
			  setTimeout(function () {
				$(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex mt-50');
			  }, 50);
			}
		  }
		],
		// For responsive popup
		responsive: {
		  details: {
			display: $.fn.dataTable.Responsive.display.modal({
			  header: function (row) {
				var data = row.data();
				return 'Details of ' + data['name'];
			  }
			}),
			type: 'column',
			renderer: function (api, rowIdx, columns) {
			  var data = $.map(columns, function (col, i) {
				return col.columnIndex !== 6 // ? Do not show row in modal popup if title is blank (for check box)
				  ? '<tr data-dt-row="' +
					  col.rowIdx +
					  '" data-dt-column="' +
					  col.columnIndex +
					  '">' +
					  '<td>' +
					  col.title +
					  ':' +
					  '</td> ' +
					  '<td>' +
					  col.data +
					  '</td>' +
					  '</tr>'
				  : '';
			  }).join('');
			  return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false;
			}
		  }
		},
		language: {
		  paginate: {
			// remove previous & next text from pagination
			previous: '&nbsp;',
			next: '&nbsp;'
		  }
		}
	  });
	}

	// Form Validation
	if (newUserForm.length) {
	  newUserForm.validate({
		errorClass: 'error',
		rules: {
		  'user-fullname': {
			required: true
		  },
		  'user-name': {
			required: true
		  },
		  'user-email': {
			required: true
		  }
		}
	  });

	  newUserForm.on('submit', function (e) {
		var isValid = newUserForm.valid();
		e.preventDefault();
		if (isValid) {
		  newUserSidebar.modal('hide');
		}
	  });
	}

	// Phone Number
	if (dtContact.length) {
	  dtContact.each(function () {
		new Cleave($(this), {
		  phone: true,
		  phoneRegionCode: 'US'
		});
	  });
	}
  });
