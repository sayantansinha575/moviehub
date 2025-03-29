"use strict";
var btnLoader = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="false"></span> Loading...';

var site_url = "http://localhost:8080/";
var MovieAdmin = function () {

    var dataTable;

    var handelSubmit = function (e) {
        $('#movie_add_update').on('submit', function (e) {
            e.preventDefault();
            $('.btnProgress').prop('disabled', true).html(btnLoader);
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: new FormData($('#movie_add_update')[0]),
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        $('.btnProgress').prop('disabled', false).html(btnLoader);
                        // $('#movieModal').modal('hide');
                        $('#movie_add_update')[0].reset();
                        $.toast({
                            heading: 'Success',
                            text: data.message,
                            showHideTransition: 'slide',
                            icon: 'success'
                        });
                        dataTable.draw();
                    } else {
                        $.each(data.error, function (key, val) {
                            $('[name=' + key + ']').siblings('.error-feedback').html(val);
                        });
                        $('.btnProgress').prop('disabled', false);
                    }
                },
                error: function (xhr) {
                    console.error(xhr);
                }


            });
        });
    }

    var allMovieGet = function () {
        dataTable = $('#ajax-movie-table').DataTable({
            lengthMenu: [
                [10, 20, 50, 70, 100],
                [10, 20, 50, 70, 100]
            ],
            keys: !0,
            language: {

            },

            'processing': true,
            'serverSide': true,
            'searching': true,
            'responsive': true,
            'searchDelay': 500,
            'lengthChange': true,
            'stateSave': true,
            'serverMethod': 'post',
            "info": true,
            'ajax': {
                'url': site_url + 'admin/dashboard/ajax_get_all_movies',
                data: function (data) {
                    data.keyword = $('[data-filter="search"]').val();
                },
                dataScr: function (data) {
                    return data.aaData;
                }
            },
            'columnDefc': [{
                'targets': [0, 1, 2, 3, 4, 5],
                'orderable': false,
            }],
            'columns': [
                { data: 'id' },
                { data: 'title' },
                { data: 'description' },
                { data: 'Genre' },
                { data: 'cover_img' },
                { data: 'action' },
            ],
        }).on('draw', function () {
            handelEditRow();
            handelDelete();
        });
    }

    var handelEditRow = () => {
        var row = document.querySelectorAll('.btn-edit');
        row.forEach(r => {
            r.addEventListener('click', function (e) {
                e.preventDefault();
                var id = $(r).attr('data-id');
                $.ajax({
                    type: 'POST',
                    url: site_url + 'admin/dashboard/ajax_handel_edit_rows',
                    data: { id: id },
                    success: function (data) {
                        if (data.success) {
                            $('#movie_title').val(data['result'].title);
                            $('#movie_description').val(data['result'].description);
                            $('#movie_genere').val(data['result'].Genre);
                            $('#movie_slug').val(data['result'].slug);
                            $('#movie_image').attr('src', site_url + 'images/' + data['result'].cover_img);
                            $('#id').val(data['result'].movie_id);
                            $('#movieModal').modal('show');

                        }

                    },

                    error: function (xhr) {
                        JSON.stringify(console.error(xhr));
                    }
                })
            })
        });
    }

    var handelDelete = () => {
        var row = document.querySelectorAll('.btn-delete');
        row.forEach(function (r) {
            r.addEventListener('click', function (e) {
                e.preventDefault();
                var id = $(r).attr('data-id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'post',
                            url: site_url + 'admin/dashboard/ajax_handel_delete_rows',
                            data: { id: id },
                            success: function (data) {
                                if (data.success) {
                                    new Notify({
                                        title: 'Success',
                                        text: data.message,
                                        status: 'success',
                                        showIcon: true,
                                        autoclose: true,
                                        autotimeout: 3000
                                    });
                                    dataTable.draw();
                                } else {
                                    new Notify({
                                        title: 'Error',
                                        text: data.message,
                                        status: 'error',
                                        showIcon: true,
                                        autoclose: true,
                                        autotimeout: 3000
                                    });
                                }
                            },

                            error: function (xhr) {
                                console.error(xhr);
                            },
                            dataType: 'json'
                        });
                    }
                });
            })
        })
    }

    var closeModal = function (closeModaal = false) {
        var modalCloseButton = document.querySelector('[data-type="reset"]');
        if (closeModaal) {
            $(modalCloseButton).click();
        } else {
            $(modalCloseButton).on('click', function () {
                $('.error-feedback').html('');
                $('#movieModal').modal('hide');
                $('.btnProgress').prop('disabled', false).html('Submit');
            });
        }
    }
    return {
        init: function () {
            allMovieGet();
            handelSubmit();
            closeModal();
        }
    }
}();

$(function () {
    MovieAdmin.init();
})