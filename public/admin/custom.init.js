"use strict";
$(document).ready(function () {
    $(document).on('click', '.add-movie', function () {
        $('#movie_add_update')[0].reset();
        $('#movie_image').attr('src', '');
        $('#id').val('');
        $('#movieModal').modal('show');
    });

    $(document).on('click', '.setting_update', function (e) {
        e.preventDefault();
        var formData = new FormData($('#defaultForm')[0]);
        invokeSubmit('#defaultForm', formData);
    })

    function invokeSubmit(formIdentifier, formData) {
        $.ajax({
            url: $(formIdentifier).attr('action'),
            type: 'POST',
            data: formData,
            async: true,
            success: function (data) {
                if (data.success) {
                    $.toast({
                        heading: 'Success',
                        text: data.message,
                        showHideTransition: 'slide',
                        icon: 'success'
                    });
                } else {
                    $.toast({
                        heading: 'Error',
                        text: data.message,
                        showHideTransition: 'slide',
                        icon: 'error'
                    });
                }
            },
            cache: false,
            contentType: false,
            processData: false
        })
    }
})