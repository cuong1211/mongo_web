<script>
    // Private functions

    var dt = $("#kt_customers_table").DataTable({
        serverSide: true,
        select: {
            style: 'multi',
            selector: 'td:first-child',
            className: 'row-selected'
        },
        ajax: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('order.show', 'get-list') }}",
            type: 'GET'
        },
        columns: [
            {
                data: 'id',
                render: function(data, type, row, meta) {
                    return '<div class="form-check form-check-sm form-check-custom form-check-solid">\n'+
                            '<input class="form-check-input" type="checkbox" value="'+data+'"/>\n'+
                        '</div>';
                }
            },
            {
                
                data: 'name',
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {
                data: 'description',
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {
                data: 'price',
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {
                data: null,
                render: function(data, type, row, meta) {
                    return '<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions \n' +
                        '<span class="svg-icon svg-icon-5 m-0"> \n' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"> \n' +
                        '<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" /> \n' +
                        '</svg> \n' +
                        '</span> \n' +
                        '<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true"> \n' +
                        '<div class="menu-item px-3"> \n' +
                        '<a href="" data-data=\'' + JSON.stringify(row) +
                        '\' class="menu-link px-3 btn-edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Edit</a> \n' +
                        '</div> \n' +
                        '<div class="menu-item px-3"> \n' +
                        '<a href="#" data-id="' + row.id +
                        '" class="menu-link px-3 btn-delete" data-kt-customer-table-filter="delete_row">Delete</a> \n' +
                        '</div> \n' +
                        '</div>';
                }
            }
        ],
        columnDefs: [
            {
                targets: -1,   
                data: null,
                orderable: false,
                className: 'text-end',
                render: function (data, type, row) {
                    return `
                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                            Actions
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                    </g>
                                </svg>
                            </span>
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-docs-table-filter="edit_row">
                                    Edit
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-docs-table-filter="delete_row">
                                    Delete
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    `;
                },
            },
        ],
    });
    dt.on('draw', function() {
        KTMenu.createInstances();
    });
    $(document).on('click', '.btn-edit', function (e) {
        console.log('edit')
        e.preventDefault();
        let data = $(this).data('data');
        let modal = $('#kt_modal_add_customer_form');
        modal.find('.modal-title').text('Edit info');
        modal.find('input[name=id]').val(data._id);
        modal.find('input[name=name]').val(data.name);
        modal.find('input[name=description]').val(data.description);
        modal.find('input[name=price]').val(data.price);
        // $('#kt_modal_add_customer_form').modal('show'); 
    });
    $(document).on('click', '.btn-add', function (e) {
        console.log('add')
        e.preventDefault();
        let modal = $('#kt_modal_add_customer_form');
        modal.find('.modal-title').text('Add new order');
        modal.find('input[name=id]').val('');
        modal.trigger('reset');
        // $('#kt_modal_add_customer_form').modal('show'); 
    });
    $('#kt_modal_add_customer_form').on('submit', function (e){
        e.preventDefault();
        let data = $(this).serialize(),
            type = 'POST',
            url = "{{route('order.store')}}",
            id = $('form#kt_modal_add_customer_form input[name=id]').val();
        if (parseInt(id)) {
            console.log('edit');
            type = 'PUT';
            url = url + '/' + id;
            }
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: type,
            data: data,
            success: function(data) {
                if (data.type == 'success') {
                    alert(data.title);
                    dt.ajax.reload(null, false);
                    $('#kt_modal_add_customer_form').trigger('reset');
                    $('#kt_modal_add_customer').modal('hide');
                }
            },
            error: function(data) {
                console.log('error');
                printErrorMsg(data.error);
            }
        });
    });
    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        let id = $(this).data('_id');
        $.ajax({
            url: "{{route('order.destroy','')}}" + '/' + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'DELETE',
            success: function(data) {
                if (data.type == 'success') {
                    alert(data.title);
                    dt.ajax.reload(null, false);
                }
            },
            error: function(data) {
                console.log('error');
            }
        });
    });
    function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }

</script>
