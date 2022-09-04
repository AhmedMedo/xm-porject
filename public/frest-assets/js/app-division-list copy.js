/**
 * Page User List
 */

'use strict';

// Datatable (jquery)
$(function () {
    // Variable declaration for table
    var dt_user_table = $('.datatables-divisions');

    // Users datatable
    if (dt_user_table.length) {
        var dt_user = dt_user_table.DataTable({
            ajax:APP_URL+'admin/divisions/datatable',
            processing: true,
            serverSide: true,
            columns:[

                {data:'name.en',name:'name',orderable: true},
                {data:'parent',name: 'parent',orderable:false},
                {data:'position',orderable:false},
                {data:'templates',orderable:false},
                {data:'actions'},
            ],
            columnDefs: [

                // {
                //     // For Responsive
                //     className: 'control',
                //     searchable: false,
                //     orderable: false,
                //     responsivePriority: 4,
                //     targets: 5,
                //     render: function (data, type, full, meta) {
                //
                //         return data;
                //
                //     }
                // },
                {
                    // For Responsive
                    className: 'control',
                    searchable: false,
                    orderable: false,
                    responsivePriority: 2,
                    targets: 4,
                    render: function (data, type, full, meta) {
                        let actions = '';
                        if (data.status == 'Active'){
                            actions = '<a class="dropdown-item" onclick="confirm_message(\'change-status-'+data.id+'\',\'warning\',\'Are you sure?\',\'This will change the devision status.\');" href="#change">' +
                                'Deactivate</a>' +
                                //form
                                '<form id="change-status-'+data.id+'" action="'+APP_URL+'admin/division/change-status/'+data.id+'" method="POST" style="display: none;">' +
                                '<input type="hidden" name="_token" value="'+CSRF_VALUE+'">  ' +
                                '<input type="hidden" name="_method" value="POST"></form>' ;
                        }else {
                            actions = '<a class="dropdown-item" onclick="confirm_message(\'change-status-'+data.id+'\',\'warning\',\'Are you sure?\',\'This will change the devision status.\');" href="#change">' +
                                'Activate</a>' +
                                '<form id="change-status-'+data.id+'" action="'+APP_URL+'admin/division/change-status/'+data.id+'" method="POST" style="display: none;">' +
                                '<input type="hidden" name="_token" value="'+CSRF_VALUE+'">  ' +
                                '<input type="hidden" name="_method" value="POST"></form>' ;
                        }
                        return '<div class="dropdown">' +
                            '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>' +
                            '<div class="dropdown-menu">' +
                            '<a href="#view" class="dropdown-item edit-btn" onclick="load_modal(\''+data.id+'\');" data-bs-toggle="modal" data-content="'+data.id+'" data-bs-target="#edit-modal">Edit</a>' +
                            actions +
                            '<a class="dropdown-item border-top delete-btn text-danger border-top" onclick="confirm_message(\'deleted-form-'+data.id+'\',\'warning\',\'Are you sure?\',\'you will not be able to recover this division\');" href="#delete">' +
                            'Delete</a>' +
                            '<form id="deleted-form-'+data.id+'" action="'+APP_URL+'admin/divisions/'+data.id+'" method="POST" style="display: none;">' +
                            '<input type="hidden" name="_token" value="'+CSRF_VALUE+'">  ' +
                            '<input type="hidden" name="_method" value="DELETE"></form>' +
                            '</div></div>';
                    }
                },
            ],
            order:[[1,"asc"]],

            dom:
            '<"row mx-2"' +
            '<"col-md-10"<"d-flex align-items-center justify-content-start flex-md-row flex-column  mb-md-0 me-3"lf>>' +
            '<"col-md-2"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 ">>' +
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
        });
    }
    $('.dataTables_filter').children('label').children('.form-control').removeClass('form-control-sm')
    $('.dataTables_length').children('label').children('.form-select').removeClass('form-select-sm')

});




function load_modal(id){
    $.ajax({
        type:'GET',
        url: APP_URL+'admin/divisions/edit-modal/'+id,
        success:function(data) {
            $('#ajax-modal-content').html(data);
            editError();
            $('#ajax-modal-content .select2').wrap('<div class="position-relative"></div>').select2({
                placeholder: 'Select',
                dropdownParent: $('#ajax-modal-content .select2').parent()
            });
        }
    });

}
