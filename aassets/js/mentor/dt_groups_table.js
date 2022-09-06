"use strict";
const KTDatatablesDataSourceAjaxServer = function() {

	const initTable1 = function() {
		let table = $('#kt_table_1');

		// begin first table
		window.table = table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			stateSave: true,
			ajax: {
				url:  '/aajax/groups_table',
				type: 'POST'
			},
			columns: [
				{data: 'ID'},
				{data: 'Name'},
				{data: 'Description'},
				{data: 'Level'},
				{data: 'total_users'},
				{data: 'Actions', responsivePriority: -1},
			],
			drawCallback: function(  ) {
				KTApp.initTooltips();
				groups_table.trig_del_user();
			},
			columnDefs: [
				{
					targets: -1,
					orderable: false,
					render: function(data, type, full, meta) {
						return `
                        <span class="dropdown">
                            <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                              <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                            </div>
                        </span> 
                      <button data-id="`+ full.ID+`" type="button" class="btn btn-outline-hover-danger btn-sm btn-icon del_row"><i class="la la-trash-o"></i></button>`;
					},
				},
				{
					targets: -2,
					orderable: false,
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
