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
            url: "{{ route('category.show', 'get-list') }}",
            type: 'GET'
        },
        columns: [
            {
                data: '_id',
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
                data: null,
                className: 'text-end',
                render: function(data, type, row, meta) {
                    return '<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Thao tác \n' +
                        '<span class="svg-icon svg-icon-5 m-0"> \n' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"> \n' +
                        '<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" /> \n' +
                        '</svg> \n' +
                        '</span> \n' +
                        '<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true"> \n' +
                        '<div class="menu-item px-3"> \n' +
                        '<a href="" data-data=\'' + JSON.stringify(row) +
                        '\' class="menu-link px-3 btn-edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Sửa</a> \n' +
                        '</div> \n' +
                        '<div class="menu-item px-3"> \n' +
                        '<a href="#" data-id="' + row._id +
                        '" class="menu-link px-3 btn-delete" data-kt-customer-table-filter="delete_row">Xoá</a> \n' +
                        '</div> \n' +
                        '</div>';
                }
            }
        ]
    });
    dt.on('draw', function() {
        KTMenu.createInstances();
    });
    $(document).on('click', '.btn-edit', function (e) {
        console.log('edit')
        e.preventDefault();
        let data = $(this).data('data');
        let modal = $('#kt_modal_add_customer_form');
        modal.find('.modal-title').text('Sửa thông tin');
        modal.find('input[name=id]').val(data._id);
        modal.find('input[name=name]').val(data.name);
        // $('#kt_modal_add_customer_form').modal('show'); 
    });
    $(document).on('click', '.btn-add', function (e) {
        console.log('add')
        e.preventDefault();
        let modal = $('#kt_modal_add_customer_form');
        modal.find('.modal-title').text('Thêm mặt hàng');
        modal.find('input[name=id]').val('');
        modal.trigger('reset');
        // $('#kt_modal_add_customer_form').modal('show'); 
    });
    $('#kt_modal_add_customer_form').on('submit', function (e){
        e.preventDefault();
        let data = $(this).serialize(),
            type = 'POST',
            url = "{{route('category.store')}}",
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
            }
        });
    });
    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        console.log($(this).data())
        $.ajax({
            url: "{{route('category.destroy','')}}" + '/' + id,
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

</script>
