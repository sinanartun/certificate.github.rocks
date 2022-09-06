"use strict";
var KTDatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#kt_table_1');

		// begin first table
		window.table = table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			stateSave: true,
			ajax: {
				url:  '/aajax/users_table',
				type: 'POST'
			},
			columns: [
				{data: 'ID'},
				{data: 'FullName'},
				{data: 'Actions', responsivePriority: -1},
			],
			drawCallback: function(  ) {
				KTApp.initTooltips();
			},
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `
                        <a href="/admin/edit_user/`+full.ID+`" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                          <i class="la la-edit"></i>
                        </a>`;
					},
				}


			],
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesDataSourceAjaxServer.init();
});
