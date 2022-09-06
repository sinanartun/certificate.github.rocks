"use strict";
var KTDatatablesSearchOptionsColumnSearch = function() {

	$.fn.dataTable.Api.register('column().title()', function() {
		return $(this.header()).text().trim();
	});

	var initTable1 = function() {

		// begin first table
		window.table = $('#kt_table_1').DataTable({
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
				url: '/aajax/courses_table',
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'ID', 'FullName', 'Active', 'Group', 'LastLogin',
						'IP', 'JoinDate', 'Actions'],
				},
			},
			columns: [
				{data: 'course_id'},
				{data: 'course_img'},
				{data: 'title'},
				{data: 'sub_title'},
				{data: 'description'},
				{data: 'active'},
				{data: 'date_added'},
				{data: 'Actions', responsivePriority: -1},
			],
			initComplete: function() {
				var thisTable = this;
				var rowFilter = $('<tr class="filter"></tr>').appendTo($(table.table().header()));

				this.api().columns().every(function() {
					var column = this;
					var input;

					switch (column.title()) {
						case 'ID':
							input = $(`<input type="text" class="form-control form-control-sm form-filter kt-input" data-col-index="` + column.index() + `"/>`);
							break;
						case 'Title':
							input = $(`<input type="text" class="form-control form-control-sm form-filter kt-input" data-col-index="` + column.index() + `"/>`);
							break;
						case 'Subtitle':
							input = $(`<input type="text" class="form-control form-control-sm form-filter kt-input" data-col-index="` + column.index() + `"/>`);
							break;
						case 'Description':
							input = $(`<input type="text" class="form-control form-control-sm form-filter kt-input" data-col-index="` + column.index() + `"/>`);
							break;
						case 'Active':
							input = $(`<select class="form-control form-control-sm form-filter kt-input" title="Select" data-col-index="` + column.index() + `">
										<option value="">Select</option></select>`);
							column.data().unique().sort().each(function(d, j) {
								$(input).append('<option value="' + d + '">' + d + '</option>');
							});
							break;

						case 'Data Added':
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

							s


						case 'Actions':
							var search = $(`<div style="padding-bottom: 6px" class="col-12"><button class="btn btn-brand  btn-sm kt-btn--icon">
							  <span>
							    <i class="la la-search kt-hidden"></i>
							    <span>Search</span>
							  </span>
							</button></div>`);

							var reset = $(`<div class="col-12"><button class="btn btn-danger btn-sm kt-btn--icon">
							  <span>
							    <i class="la la-close kt-hidden"></i>
							    <span>Reset</span>
							  </span>
							</button></div>`);

							$('<th>').append(search).append(reset).appendTo(rowFilter);

							$(search).on('click', function(e) {
								e.preventDefault();
								var params = {};
								$(rowFilter).find('.kt-input').each(function() {
									var i = $(this).data('col-index');
									if (params[i]) {
										params[i] += '|' + $(this).val();
									}
									else {
										params[i] = $(this).val();
									}
								});
								$.each(params, function(i, val) {
									// apply search params to datatable
									table.column(i).search(val ? val : '', false, false);
								});
								table.table().draw();
							});

							$(reset).on('click', function(e) {
								e.preventDefault();
								$(rowFilter).find('.kt-input').each(function(i) {
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
						var column = this
						if(column.responsiveHidden()) {
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
			columnDefs: [
				{
					orderable: true,
					targets: 0,
					width: '40px',
				},
				{
					orderable: false,
					targets: 1,
					width: '110px',
				},
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `
                        <a data-id="`+full.course_id+`" data-toggle="kt-tooltip" class="btn btn-outline-hover-danger btn-sm btn-icon del_row" data-placement="right" title="" data-original-title="Delete Course"  title="Delete">
                          <i class="la la-trash-o"></i>
                        </a>`;
					},
				}
//                        '<a data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Delete Section" data-sid="' + section_id + '" class="btn btn-outline-hover-danger btn-sm btn-icon del_section">' +
			],
			drawCallback: function(  ) {
				trig_img_modal();
				trig_del_media();
				KTApp.initTooltips();
			},
		});

	};

	const trig_img_modal = function () {
		$('.table_img').on('click',function () {
			let src = $(this).find('img').attr('src');
			//console.log($(this).find('img').attr('src'));
			$('#modal_img').attr('src',src.replace("thumb_", ""));

		});
	};

	const trig_del_media = function () {
		$('.del_row').on('click',function (e) {
			e.preventDefault();

			let id =$(this).data('id');
				swal.fire({
					title: "Are you sure?",
					text: "You won't be able to revert this!",
					type: "warning",
					showCancelButton: !0,
					confirmButtonText: "Yes, delete it!"
				}).then(function(e) {

					if( e.value){
						$.ajax({
							type: 'POST',
							url: '/aajax/remove_course',
							dataType: 'json',
							data:{id:id},
							success: function(res)
							{
								if(typeof res !== 'undefined' && res !== null && res !== ''){
									if(typeof res.status !== 'undefined' && res.status === 'success'){

										swal.fire(res.status, res.msg, "success").then(function() {
											window.table.ajax.reload();
										});

									}

								}




							},
							error: function(xhr, ajaxOptions, thrownError)
							{

							},

						});
					}





				})



		})

	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesSearchOptionsColumnSearch.init();
});
