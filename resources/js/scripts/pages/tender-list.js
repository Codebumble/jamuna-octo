/**
 * DataTables Basic
 */

 $(function () {
	'use strict';

	var dt_basic_table = $('.datatables-basic'),
	  dt_date_table = $('.dt-date'),
	  assetPath = window.location.origin;

	if ($('body').attr('data-framework') === 'laravel') {
	  assetPath = $('body').attr('data-asset-path');
	}

	// DataTable with buttons
	// --------------------------------------------------------------------

	if (dt_basic_table.length) {
	  var dt_basic = dt_basic_table.DataTable({
		ajax: assetPath + 'codebumble/tender-list-api',
		columns: [
		  { data: 'id' },
		  { data: 'id' },
		  { data: 'id' }, // used for sorting so will hide this column
		  { data: 'title' },
		  { data: 'created_at' },
		  { data: 'last_date' },
		  { data: 'counter' },
		  { data: '' }
		],
		columnDefs: [
		  {
			// For Responsive
			className: 'control',
			orderable: false,
			responsivePriority: 2,
			targets: 0
		  },
		  {
			targets: 1,
			visible: false
		  },
		  {
			responsivePriority: 1,
			targets: 4
		  },
		  {
			// Actions
			targets: -1,
			title: 'Actions',
			orderable: false,
			render: function (data, type, full, meta) {
			  return (
				'<div class="d-inline-flex">' +
				'<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
				feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
				'</a>' +
				'<div class="dropdown-menu dropdown-menu-end">' +
				'<a href="'+assetPath+'e-tender/'+full['id']+'" class="dropdown-item">' +
				feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) +
				'Details</a>' +
				'<a href="'+assetPath+'admin/e-tender/delete-this-tender/'+full['id']+'" class="dropdown-item delete-record">' +
				feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' }) +
				'Delete</a>' +
				'</div>' +
				'</div>' +
				'<a href="'+assetPath+'admin/e-tender/edit-a-tender/'+full['id']+'" class="item-edit">' +
				feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
				'</a>'
			  );
			}
		  }
		],
		order: [[2, 'asc']],
		dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
		displayLength: 7,
		lengthMenu: [7, 10, 25, 50, 75, 100],
		buttons: [
		  {
			extend: 'collection',
			className: 'btn btn-outline-secondary dropdown-toggle me-2',
			text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
			buttons: [
			  {
				extend: 'print',
				text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
				className: 'dropdown-item',
				exportOptions: { columns: [3, 4, 5, 6] }
			  },
			  {
				extend: 'csv',
				text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
				className: 'dropdown-item',
				exportOptions: { columns: [3, 4, 5, 6] }
			  },
			  {
				extend: 'excel',
				text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
				className: 'dropdown-item',
				exportOptions: { columns: [3, 4, 5, 6] }
			  },
			  {
				extend: 'pdf',
				text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
				className: 'dropdown-item',
				exportOptions: { columns: [3, 4, 5, 6] }
			  },
			  {
				extend: 'copy',
				text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
				className: 'dropdown-item',
				exportOptions: { columns: [3, 4, 5, 6] }
			  }
			],
			init: function (api, node, config) {
			  $(node).removeClass('btn-secondary');
			  $(node).parent().removeClass('btn-group');
			  setTimeout(function () {
				$(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
			  }, 50);
			}
		  }
		],
		responsive: {
		  details: {
			display: $.fn.dataTable.Responsive.display.modal({
			  header: function (row) {
				var data = row.data();
				return 'Details of ' + data['title'];
			  }
			}),
			type: 'column',
			renderer: function (api, rowIdx, columns) {
			  var data = $.map(columns, function (col, i) {
				return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
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
	  $('div.head-label').html('<h6 class="mb-0">All Tender list</h6>');
	}

	// Flat Date picker
	if (dt_date_table.length) {
	  dt_date_table.flatpickr({
		monthSelectorType: 'static',
		dateFormat: 'm/d/Y'
	  });
	}





  });
