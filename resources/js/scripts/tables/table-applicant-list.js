/**
 * DataTables Advanced
 */

 'use strict';

 // Advanced Search Functions Starts
 // --------------------------------------------------------------------

 // Filter column wise function
 function filterColumn(i, val) {

	//  var startDate = $('.start_date').val(),
	//    endDate = $('.end_date').val();
	//  if (startDate !== '' && endDate !== '') {
	//    filterByDate(i, startDate, endDate); // We call our filter function
	//  }

	//  $('.dt-advanced-search').dataTable().fnDraw();

	 $('.dt-advanced-search').DataTable().column(i).search(val, false, true).draw();

 }

 // Datepicker for advanced filter
 var separator = ' - ',
   rangePickr = $('.flatpickr-range'),
   dateFormat = 'MM/DD/YYYY';
 var options = {
   autoUpdateInput: false,
   autoApply: true,
   locale: {
	 format: dateFormat,
	 separator: separator
   },
   opens: $('html').attr('data-textdirection') === 'rtl' ? 'left' : 'right'
 };

 //
 if (rangePickr.length) {
   rangePickr.flatpickr({
	 mode: 'range',
	 dateFormat: 'm/d/Y',
	 onClose: function (selectedDates, dateStr, instance) {
	   var startDate = '',
		 endDate = new Date();
	   if (selectedDates[0] != undefined) {
		 startDate =
		   selectedDates[0].getMonth() + 1 + '/' + selectedDates[0].getDate() + '/' + selectedDates[0].getFullYear();
		 $('.start_date').val(startDate);
	   }
	   if (selectedDates[1] != undefined) {
		 endDate =
		   selectedDates[1].getMonth() + 1 + '/' + selectedDates[1].getDate() + '/' + selectedDates[1].getFullYear();
		 $('.end_date').val(endDate);
	   }
	   $(rangePickr).trigger('change').trigger('keyup');
	 }
   });
 }

 // Advance filter function
 // We pass the column location, the start date, and the end date
 var filterByDate = function (column, startDate, endDate) {
   // Custom filter syntax requires pushing the new filter to the global filter array
   $.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
	 var rowDate = normalizeDate(aData[column]),
	   start = normalizeDate(startDate),
	   end = normalizeDate(endDate);

	 // If our date from the row is between the start and end
	 if (start <= rowDate && rowDate <= end) {
	   return true;
	 } else if (rowDate >= start && end === '' && start !== '') {
	   return true;
	 } else if (rowDate <= end && start === '' && end !== '') {
	   return true;
	 } else {
	   return false;
	 }
   });
 };

 // converts date strings to a Date object, then normalized into a YYYYMMMDD format (ex: 20131220). Makes comparing dates easier. ex: 20131220 > 20121220
 var normalizeDate = function (dateString) {
   var date = new Date(dateString);
   var normalized =
	 date.getFullYear() + '' + ('0' + (date.getMonth() + 1)).slice(-2) + '' + ('0' + date.getDate()).slice(-2);
   return normalized;
 };
 // Advanced Search Functions Ends

 $(function () {
   var isRtl = $('html').attr('data-textdirection') === 'rtl';

   var dt_ajax_table = $('.datatables-ajax'),
	 dt_filter_table = $('.dt-column-search'),
	 dt_adv_filter_table = $('.dt-advanced-search'),
	 dt_responsive_table = $('.dt-responsive'),
	 assetPath = window.location.origin;

   if ($('body').attr('data-framework') === 'laravel') {
	 assetPath = $('body').attr('data-asset-path');
   }

   // Ajax Sourced Server-side
   // --------------------------------------------------------------------

   if (dt_ajax_table.length) {
	 var dt_ajax = dt_ajax_table.dataTable({
	   processing: true,
	   dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
	   ajax: assetPath + 'data/ajax.php',
	   language: {
		 paginate: {
		   // remove previous & next text from pagination
		   previous: '&nbsp;',
		   next: '&nbsp;'
		 }
	   }
	 });
   }



   // Advanced Search
   // --------------------------------------------------------------------

   // Advanced Filter table
   if (dt_adv_filter_table.length) {
	 var dt_adv_filter = dt_adv_filter_table.DataTable({
	   ajax: assetPath + 'codebumble/applicant-list',
	   columns: [
		 { data: 'id' },
		 { data: 'name' },
		 { data: 'age' },
		 { data: 'gender' },
		 { data: 'company' },
		 { data: 'job_id' },
		 { data: 'division' },
		 { data: 'district' },
		 { data: 'qualifications' },
		 { data: 'experience' },
		 { data: 'cv_link' }
	   ],

	   columnDefs: [
		 {
		   className: 'control',
		   orderable: false,
		   targets: 0
		 },
		 {
			// For Checkboxes
			targets: 10,
			orderable: false,
			responsivePriority: 3,
			render: function (data, type, full, meta) {
			  return (
				'<a href="'+assetPath+'admin/secure-documents/'+
				full['cv_link']
				+'" target="_blank">Click Here</a>'
			  );
			},
			checkboxes: {
			  selectAllRender:
				'<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
			}
		  },
		  {

			targets: 2,
			orderable: true,
			responsivePriority: 3,
			render: function (data, type, full, meta) {
				if(typeof(JSON.parse(full['json_data']).age) == 'undefined' || JSON.parse(full['json_data']).age === null)
				{
					var $age =  '';
				}
				else{
					var $age =  JSON.parse(full['json_data']).age;
				}
			  return $age
			  ;
			},
			checkboxes: {
			  selectAllRender:
				'<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
			}
		  },
		  {

			targets: 3,
			orderable: false,
			responsivePriority: 3,
			render: function (data, type, full, meta) {
				if(typeof(JSON.parse(full['json_data']).gender) == 'undefined' || JSON.parse(full['json_data']).gender === null)
				{
					var $gender =  '';
				}
				else{
					var $gender =  JSON.parse(full['json_data']).gender;
				}
			  return $gender
			  ;
			},
			checkboxes: {
			  selectAllRender:
				'<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
			}
		  },
		  {
			// For Checkboxes
			targets: 9,
			orderable: true,
			responsivePriority: 3,
			render: function (data, type, full, meta) {
			  return (
				''+full['experience']+' Years'
			  );
			},
			checkboxes: {
			  selectAllRender:
				'<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
			}
		  }
	   ],
	   order: [[0, 'asc']],
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
	   dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
	   orderCellsTop: true,
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
			   return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
				 ? '<tr data-dt-row="' +
					 col.rowIndex +
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

			 return data ? $('<table class="table"/><tbody />').append(data) : false;
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

   // on key up from input field
   $('input.dt-input').on('keyup', function () {
	 filterColumn($(this).attr('data-column'), $(this).val());
   });

   // Responsive Table
   // --------------------------------------------------------------------



   // Filter form control to default size for all tables
   $('.dataTables_filter .form-control').removeClass('form-control-sm');
   $('.dataTables_length .form-select').removeClass('form-select-sm').removeClass('form-control-sm');
 });
