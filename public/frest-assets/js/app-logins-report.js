/**
 * Page User List
 */

'use strict';

// Datatable (jquery)
$(function () {
    // Variable declaration for table
    var dt_user_table = $('#datatables_logins_server_side');
    var params = new window.URLSearchParams(window.location.search);
    var start_date = params.get('start_date');
    var end_date = params.get('end_date');
     if(start_date==null){
    start_date='';
     }

    if(end_date==null){
    end_date='';
    }
    // Users datatable
    if (dt_user_table.length) {
        var dt_user = dt_user_table.DataTable({
            ajax:APP_URL+"admin/reports/logins?start_date=" + start_date +
            "&end_date=" + end_date,
            processing: true,
            serverSide: true,
            lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],



            columns: [
                {data: 'user', name: 'user' , orderable: false,},
                {data: 'date', name: 'date' ,},
                {data: 'time', name: 'time' ,},
                {data: 'os', name: 'os' ,},
                {data: 'browser', name: 'browser' ,},
                {data: 'device', name: 'device' ,},
                {data: 'ip', name: 'ip' ,},



              ],
              "columnDefs": [
                { className: "ActivityTd", "targets": [ 0] },
                { className: "td-actions text-center", "targets": [ 4 ] }
                ],
            order:[[1,"asc"]],

            dom:
                '<"row dataTables_wrapper mx-2"' +
                '<"col-md-5"<"d-flex align-items-center justify-content-start flex-md-row flex-column  mb-md-0 "lf>>' +
                '<"col-md-7"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end  flex-md-row flex-column my-3 "B>' +
                '>t' +
                '<"row mx-2"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',

            language: {
                sLengthMenu: '_MENU_',
                search: '',
                searchPlaceholder: 'Search..'
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn  btn-label-secondary dropdown-toggle',
                    text: '<i class="bx bx-upload me-2"></i>Export',
                    buttons: [
                        {

                            text: '<i class="bx bx-printer me-2" ></i> Print ',
                            className: 'dropdown-item',
                            action: function (e, dt, node, config)
                            {
                                //This will send the page to the location specified
                                window.location.href = 'logins/download-pdf';
                            }

                        },
                        {
                            text: '<i class="bx bx-file me-2" ></i>CSV',
                            className: 'dropdown-item',
                            action: function (e, dt, node, config)
                            {
                                //This will send the page to the location specified
                                window.location.href = 'logins/download-csv';
                            }
                        },
                        {
                            extend: 'excel',
                            text: 'Excel',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4]}
                        },
                        {
                            text: '<i class="bx bxs-file-pdf me-2"></i>PDF',
                            className: 'dropdown-item',
                            action: function (e, dt, node, config)
                            {
                                //This will send the page to the location specified
                                window.location.href = 'logins/download-pdf?download=1';
                            }
                        },
                        {
                            // extend: 'send',
                             text: '<i class="bx bx-envelope me-2" ></i>Email',
                             className: 'dropdown-item',
                                 action: function (e, dt, node, config)
                             {
                                 //This will send the page to the location specified
                                 SendReport(start_date,end_date);

                             }
                         }
                    ]
                },

                {
                    extend: 'collection',
                    className: 'btn  btn btn-outline-secondary dropdown-toggle reportrange_serverside',
                    text: '<i class="bx bx-calendar me-2"></i>Select date Range',
                    action: function ( e, dt, node, config ) {
                        // alert( 'Activated!' );
                        // this.disable(); // disable button
                    }
                },



            ]

        });
    }

    $('.dataTables_filter').children('label').children('.form-control').removeClass('form-control-sm')
    $('.dataTables_length').children('label').children('.form-select').removeClass('form-select-sm')
    $('#checkbox-all').on('click', function() {
        $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
    });

});


function SendReport(start_date='',end_date='') {

    var page_url =APP_URL+'admin/reports/logins/send-email?start_date='+start_date+'&end_date='+end_date;

    Swal.fire({
        html: ` <div class="text-left"><h3 class="title">Send report by e-mail</h3><hr></div>
                <p class="card-category" style="display: block; text-align:left; margin-bottom: 20px;">E-mail address to send</p>
                <input class="form-control " name="recipient_email" placeholder="E-mail Address" id="recipient_email">
                `,
        showCancelButton: true,
        closeOnConfirm: true,
        confirmButtonText: "Send",
      //  confirmButtonColor : brand_setting_color,
        cancelButtonColor: '#FB404B',
    }).then(function () {

        var recipient_email = $('#recipient_email').val();


        if (recipient_email) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': CSRF_VALUE,
                }
            });
            $.ajax({
                type: "post",
                url: page_url,
                dataType: 'text',
                data: {
                    recipient_email: recipient_email
                },
                success: function (data) {

                    Swal.fire({
                        title: "Success",
                        icon: 'success',
                        text: "Report sent successfully.",
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    }).then(function () {
                        location.reload();
                    });

                    // setTimeout(function () {
                    //     location.reload();
                    // }, 2000);
                },
            });
        }
    });

    return false;
}









