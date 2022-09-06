"use strict";
var KTDatatablesSearchOptionsColumnSearch = function () {

	$.fn.dataTable.Api.register('column().title()', function () {
		return $(this.header()).text().trim();
	});

	var initTable1 = function () {

		// begin first table
		var table = window.table = $('#kt_table_1').DataTable({
			responsive: true,

			// Pagination settings
			dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
			// read more: https://datatables.net/examples/basic_init/dom.html

			lengthMenu: [5, 10, 25, 50],

			pageLength: 10,

			language: {
				'lengthMenu': 'Display _MENU_',
			},

			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: '/aajax/test_table',
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'ID', 'Test Name', 'Added By', 'Date Added', 'Actions'],
				},
			},
			columns: [
				{data: 'ID'},
				{data: 'TestName'},
				{data: 'added_by'},
				{data: 'date_added'},
				{data: 'Actions', responsivePriority: -1},
			],
			initComplete: function () {
				var thisTable = this;
				var rowFilter = $('<tr class="filter"></tr>').appendTo($(table.table().header()));

				this.api().columns().every(function () {
					var column = this;
					var input;

					switch (column.title()) {
						case 'ID':
							input = $(`<input type="text" class="form-control form-control-sm form-filter kt-input" data-col-index="` + column.index() + `"/>`);
							break;
						case 'Test Name':
							input = $(`<input type="text" class="form-control form-control-sm form-filter kt-input" data-col-index="` + column.index() + `"/>`);
							break;

						case 'Added By':
							input = $(`<select class="form-control form-control-sm form-filter kt-input" title="Select" data-col-index="` + column.index() + `">
										<option value="">Select</option></select>`);
							column.data().unique().sort().each(function (d, j) {
								$(input).append('<option value="' + d + '">' + d + '</option>');
							});
							break;

						case 'Date Added':
							input = $(`
							<div class="input-group date" data-format="dd/mm/yyyy">
								<input type="text" class="form-control form-control-sm kt-input" readonly placeholder="From" name="from" id="kt_datepicker_1"
								 data-col-index="` + column.index() + `"/>
								<div class="input-group-append">
									<span class="input-group-text"><i class="la la-calendar-o glyphicon-th"></i></span>
								</div>
							</div>
							<div class="input-group date">
								<input type="text" class="form-control form-control-sm kt-input" readonly placeholder="To" name="to" id="kt_datepicker_2"
								 data-col-index="` + column.index() + `"/>
								<div class="input-group-append">
									<span class="input-group-text"><i class="la la-calendar-o glyphicon-th"></i></span>
								</div>
							</div>`);
							break;


						case 'Actions':
							var search = $(`<div style="padding-bottom: 6px" class="col-12"><button class="btn btn-brand  btn-sm kt-btn--icon">
							  <span>
							    <i class="la la-search"></i>
							    <span>Search</span>
							  </span>
							</button></div>`);

							var reset = $(`<div class="col-12"><button class="btn btn-danger btn-sm kt-btn--icon">
							  <span>
							    <i class="la la-close"></i>
							    <span>Reset</span>
							  </span>
							</button></div>`);

							$('<th>').append(search).append(reset).appendTo(rowFilter);

							$(search).on('click', function (e) {
								e.preventDefault();
								var params = {};
								$(rowFilter).find('.kt-input').each(function () {
									var i = $(this).data('col-index');
									if (params[i]) {
										params[i] += '|' + $(this).val();
									} else {
										params[i] = $(this).val();
									}
								});
								$.each(params, function (i, val) {
									// apply search params to datatable
									table.column(i).search(val ? val : '', false, false);
								});
								table.table().draw();
							});

							$(reset).on('click', function (e) {
								e.preventDefault();
								$(rowFilter).find('.kt-input').each(function (i) {
									$(this).val('');
									table.column($(this).data('col-index')).search('', false, false);
								});
								table.table().draw();
							});
							break;
					}

					if (column.title() !== 'Actions') {
						$(input).appendTo($('<th>').appendTo(rowFilter));
					}
				});

				// hide search column for responsive table
				var hideSearchColumnResponsive = function () {
					thisTable.api().columns().every(function () {
						var column = this;
						if (column.responsiveHidden()) {
							$(rowFilter).find('th').eq(column.index()).show();
						} else {
							$(rowFilter).find('th').eq(column.index()).hide();
						}
					})
				};

				// init on datatable load
				hideSearchColumnResponsive();
				// recheck on window resize
				window.onresize = hideSearchColumnResponsive;

				$('#kt_datepicker_1,#kt_datepicker_2').datepicker();
			},
			drawCallback: function () {
				KTApp.initTooltips();
				trig_delete_test();
				trig_preview_test();

			},
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function (data, type, full, meta) {
						return `
						<button data-id="${full.ID}"  class="btn btn-outline-hover-danger btn-sm btn-icon delete_test" title="delete test" >
                          <i class="la la-trash-o"></i>
                        </button>
                        <a type="button" data-id="${full.ID}" href="/admin/edit_test/${full.ID}" class="btn btn-outline-hover-info btn-sm btn-icon edit_test" title="edit test" >
                          <i class="la la-edit"></i>
                        </a>
						<button data-toggle="modal" data-target="#kt_modal_1" data-id="${full.ID}"  class="btn btn-outline-hover-success btn-sm btn-icon preview_test" title="preview test" >
                          <i class="la la-eye"></i>
                        </button>`;
					},
				},
				// {
				// 	targets: 5,
				// 	width: '150px',
				// },
				// {
				// 	targets: 6,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Pending', 'class': 'kt-badge--brand'},
				// 			2: {'title': 'Delivered', 'class': ' kt-badge--danger'},
				// 			3: {'title': 'Canceled', 'class': ' kt-badge--primary'},
				// 			4: {'title': 'Success', 'class': ' kt-badge--success'},
				// 			5: {'title': 'Info', 'class': ' kt-badge--info'},
				// 			6: {'title': 'Danger', 'class': ' kt-badge--danger'},
				// 			7: {'title': 'Warning', 'class': ' kt-badge--warning'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
				// 	},
				// },
				// {
				// 	targets: 7,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="kt-badge kt-badge--' + status[data].state + ' kt-badge--dot"></span>&nbsp;' +
				// 			'<span class="kt-font-bold kt-font-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
			],
		});

	};

	const trig_delete_test = function(){
		$('.delete_test').off('click').on('click',function (e) {
			e.preventDefault();
			let id = $(this).data('id');

			swal.fire({
				title: "Are you sure?",
				text: "You won't be able to revert this!",
				type: "warning",
				showCancelButton: !0,
				confirmButtonText: "Yes, delete it!"
			}).then(function (e) {


				if (e.value) {
					$.ajax({
						type: 'POST',
						url: '/aajax/del_test',
						dataType: 'json',
						data: {
							id: id
						},
						success: function (res) {
							if (typeof res !== 'undefined' && res !== null && res !== '') {
								if (typeof res.status !== 'undefined') {
									if (res.status === 'success') {
										swal.fire(res.status, res.msg, "success").then(function () {
											window.table.ajax.reload();

										});
									} else {
										swal.fire(res.status, res.msg, "error").then(function () {

										});
									}

								}

							}


						},
						error: function (xhr, ajaxOptions, thrownError) {

						},

					});
				}


			});


		})
	};


	const trig_preview_test = function () {
		$('.preview_test').off('click').on('click', function (e) {
			e.preventDefault();
			const id = $(this).data('id');
			$.ajax({
				type: 'POST',
				url: '/aajax/preview_test',
				dataType: 'json',
				data: {
					id: id
				},
				success: function (res) {
					if (typeof res !== 'undefined' && res !== null && res !== '') {
						if (typeof res.status !== 'undefined') {
							if (res.status === 'success') {
								render_questions(res.data);
							} else {
								swal.fire(res.status, res.msg, "error").then(function () {

								});
							}

						}

					}


				},
				error: function (xhr, ajaxOptions, thrownError) {

				},

			});

		})
	};


	const render_questions = function (data) {
		$('#test_div').html('');
		let test = document.createElement("div");
		test.style.cssText = 'padding-bottom: 20px';
		let html = '';

		html += '<div class="col-md-12 kt-pb-20">' +
			'<div class="kt-portlet__head-label">' +
			'<h4 class="kt-portlet__head-title test_title" style="text-align: center;">' +
			'<span>' +
			data.test_name +
			'</span>' +
			'</h4>' +
			'</div>' +
			'</div>';

		if (data.questions.length < 1) {

			test.innerHTML = html;
			document.getElementById("test_div").appendChild(test);
			return false;
		}

		for (let i = 0; i < data.questions.length; i++) {

			html +=

				'<div class="kt-portlet__head-label answer_count kt-pt15">' +
				'<span class="answer_count" style="font-weight: 500; font-size: 14px">' +
				'Soru ';
			html += (i + 1);
			// html +=
			// 	'<span class="kt-pl10">' +
			// 	'<button data-qid="' + data.questions[i].id + '"  class="btn btn-outline-hover-danger btn-sm btn-icon del_question">' +
			// 	'<i class="fa fa-trash-alt">' +
			// 	'</i>' +
			// 	'</button>' +
			// 	'</span>' +
			// 	'<span class="">' +
			// 	'<button data-qid="' + data.questions[i].id + '"   class="btn btn-outline-hover-warning btn-sm btn-icon edit_question">' +
			// 	'<i class="fa fa-edit">' +
			// 	'</i>' +
			// 	'</button>' +
			// 	'</span>';


			html +=
				'</span>' +
				'</div>' +
				'<div class="row kt-pt20">' +
				'<div class="kt-portlet__head-label">' +
				'<div class="kt-portlet__head-title" style="padding: 0px 22px 0px 20px;">' +
				'<span style="font-size: 15px; color: #646c9a;">' +
				data.questions[i].question +
				'</span>' +
				'</div>' +
				'</div>' +
				'</div>' +
				'<div class="row kt-portlet__head kt-pb-20 kt-pt40" style="margin-right: 6px;">' +

				'<div class="row col-md-12 kt-pb-5">' +
				'<div style="width: 16px;">' +
				'<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
				'A :' +
				'</span>' +
				'</div>' +
				'<span style="padding-left: 5px">' +
				data.questions[i].a +
				'</span>' +
				'</div>' +

				'<div class="row col-md-12 kt-pb-5">' +
				'<div style="width: 16px;">' +
				'<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
				'B :' +
				'</span>' +
				'</div>' +
				'<span style="padding-left: 5px">' +
				data.questions[i].b +
				'</span>' +
				'</div>' +

				'<div class="row col-md-12 kt-pb-5">' +
				'<div style="width: 16px;">' +
				'<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
				'C :' +
				'</span>' +
				'</div>' +
				'<span style="padding-left: 5px">' +
				data.questions[i].c +
				'</span>' +
				'</div>' +

				'<div class="row col-md-12 kt-pb-5">' +
				'<div style="width: 16px;">' +
				'<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
				'D :' +
				'</span>' +
				'</div>' +
				'<span style="padding-left: 5px">' +
				data.questions[i].d +
				'</span>' +
				'</div>' +

				'<div class="row col-md-12 kt-pb-5">' +
				'<div style="width: 16px;">' +
				'<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
				'E :' +
				'</span>' +
				'</div>' +
				'<span style="padding-left: 5px">' +
				data.questions[i].e +
				'</span>' +
				'</div>' +

				'<div class="row col-md-12 kt-pb-5 kt-pt20">' +
				'<div style="width: 96px;">' +
				'<span class="kt-pull-right" style="font-weight: 500; font-size: 14px; margin-top: 2px;">' +
				'Doğru Cevap: ' +
				'</span>' +
				'</div>' +
				'<span style="padding-left: 5px; color: #004eda; font-weight: 500; font-size: 16px;">' +
				data.questions[i].true_answer +
				'</span>' +
				'</div>' +

				'</div>';

		}

		test.innerHTML = html;
		document.getElementById("test_div").appendChild(test);

	};


	return {

		//main function to initiate the module
		init: function () {
			initTable1();
		},

	};

}();

jQuery(document).ready(function () {
	KTDatatablesSearchOptionsColumnSearch.init();
});
