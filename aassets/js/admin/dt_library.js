"use strict";
var KTDatatablesSearchOptionsColumnSearch = function () {

    $.fn.dataTable.Api.register('column().title()', function () {
        return $(this.header()).text().trim();
    });

    var initTable1 = function () {

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
                url: '/aajax/library_table',
                type: 'POST',
                data: {
                    // parameters for custom backend script demo
                    columnsDef: [
                        'Preview', 'File Name', 'type', 'size', 'Upload Date',
                         'Actions'],
                },
            },
            columns: [
                {data: 'preview'},
                {data: 'file_name'},
                {data: 'type'},
                {data: 'size'},
                {data: 'upload_date'},
                {data: 'Actions', responsivePriority: -1},
            ],
            initComplete: function () {
                var thisTable = this;
                var rowFilter = $('<tr class="filter"></tr>').appendTo($(table.table().header()));

                this.api().columns().every(function () {
                    var column = this;
                    var input;

                    switch (column.title()) {
                        case 'File Name':
                            input = $(`<input type="text" class="form-control form-control-sm form-filter kt-input" data-col-index="` + column.index() + `"/>`);
                            break;

                        case 'Type':
                            input = $(`<select class="form-control form-control-sm form-filter kt-input" title="Select" data-col-index="` + column.index() + `">
										<option value="">Select</option></select>`);
                            column.data().unique().sort().each(function (d, j) {
                                $(input).append('<option value="' + d + '">' + d + '</option>');
                            });
                            break;

                        case 'Upload Date':
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
							   
							    <span>Search</span>
							  </span>
							</button></div>`);

                            var reset = $(`<div class="col-12"><button class="btn btn-danger btn-sm kt-btn--icon">
							  <span>
							   
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
                        var column = this
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
            columnDefs: [
                {
                    orderable: false,
                    targets: 0,
                    width: '40px',
                },
                {
                    targets: -1,
                    title: 'Actions',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return `
                        <a data-name="` + full.file_name + `" class="btn btn-outline-hover-danger btn-sm btn-icon del_row" title="View">
                          <i class="la la-trash-o"></i>
                        </a>`;
                    },
                }

            ],
            drawCallback: function () {
                trig_video_modal();
                trig_del_media();
                trig_img_modal();
                trig_html_modal();
            },
        });

    };

    const trig_video_modal = function () {
        $('.media_info').off('click').on('click', function () {
            let video_url = $(this).data('video_url');


            videojs('modal_video_player').src(video_url);

            //$('#modal_video_player').attr('src', video_url);

            $('#modal_close_video').off('click').on('click', function () {
                videojs('modal_video_player').pause();

            });


            $("#kt_modal_6").on('hidden.bs.modal', function () {
                videojs('modal_video_player').pause();
            });


        })


    };

    const trig_img_modal = function () {
        $('.img_info').on('click', function () {
            let src = $(this).data('url');
            //console.log($(this).find('img').attr('src'));
            $('#course_img').attr('src', src);

        });
    };

    const trig_html_modal = function () {
        $('.html_info').on('click', function () {
            let file_name = $(this).data('file_name');
            //console.log($(this).find('img').attr('src'));


            $.ajax({
                type: 'POST',
                url: '/aajax/get_html_file',
                dataType: 'json',
                data: {file_name: file_name},
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '') {
                        if (typeof res.status !== 'undefined' && res.status === 'success') {

                            if (typeof res.data !== 'undefined' && typeof res.data.html !== 'undefined') {


                                $('#html_div').summernote({
                                    height: $(document).height() * 0.8,
                                    focus: true,
                                    minHeight: 500,
                                    toolbar: [
                                        // [groupName, [list of button]]


                                    ]

                                });
                                $('#html_div').summernote('code', res.data.html);


                            }


                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });


        });
    };


        const trig_del_media = function () {
            $('.del_row').on('click', function (e) {
                e.preventDefault();
                let file_name = $(this).data('name');


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
                            url: '/aajax/remove_media',
                            dataType: 'json',
                            data: {file_name: file_name},
                            success: function (res) {
                                if (typeof res !== 'undefined' && res !== null && res !== '') {
                                    if (typeof res.status !== 'undefined' && res.status === 'success') {

                                        swal.fire(res.status, res.msg, "success").then(function () {
                                            window.table.ajax.reload();
                                        });

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
