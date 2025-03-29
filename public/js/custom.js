var site_url = "http://localhost:8080/";
$(function () {
    $('.add-rating').click(function (e) {
        var id = $(this).attr('data-id');
        var val = $(this).val();
        $.post(site_url + "single/add-rating", { id: id, rating: val });
    });

    // var search = document.querySelectorAll('.movie-search');
    // search.forEach(element => {
    //     element.addEventListener('input', function () {
    //         var searchvalue = $(this).val()
    //         $.ajax({
    //             type: 'post',
    //             url: site_url + 'ajax_movie_search',
    //             data: { searchTerm: searchvalue },
    //             success: function (data) {
    //                 if (data.length > 0) {
    //                     $('#items-to-search').jqSearch({
    //                         searchInput: '#search',
    //                         searchTarget: 'text',

    //                     });
    //                     $('#items-to-search').html(data);
    //                 } else {
    //                     $('#items-to-search').html('');
    //                 }
    //             }
    //         })
    //     })
    // });

    var search = document.querySelectorAll('.movie-search');
    search.forEach(element => {
        var timeoutId; // Variable to store timeout ID
        element.addEventListener('input', function () {
            clearTimeout(timeoutId); // Clear previous timeout
            var searchvalue = $(this).val();
            timeoutId = setTimeout(function () {
                $.ajax({
                    type: 'post',
                    url: site_url + 'ajax_movie_search',
                    data: { searchTerm: searchvalue },
                    success: function (data) {
                        if (data.length > 0) {
                            $('#items-to-search').jqSearch({
                                searchInput: '#search',
                                searchTarget: 'text',
                            });
                            $('#items-to-search').html(data);
                        } else {
                            $('#items-to-search').html('');
                        }
                    }
                });
            }, 300); // Debounce time in milliseconds (adjust as needed)
        });
    });


    var mobileserch = document.querySelector('.movie-search-mobile');
    var mobile_serch_timeout_id;
    $(mobileserch).on('keyup', function () {
        clearTimeout(mobile_serch_timeout_id);
        var msearch = $(this).val();
        mobile_serch_timeout_id = setTimeout(function () {
            $.ajax({
                type: 'post',
                url: site_url + 'ajax_movie_search',
                data: { searchTerm: msearch },
                success: function (data) {
                    if (data.length > 0) {
                        $('#mobile-search-result').jqSearch({
                            searchInput: '#search',
                            searchTarget: 'text',
                        });
                        $('#mobile-search-result').html(data);
                    } else {
                        $('#mobile-search-result').html('');
                    }
                }
            });
        }, 300);
    });

    // $('.movie_component').remove();
    $('.filter_box').click(function (e) {
        e.preventDefault();
        var vlue = $(this).attr('href');
        window.location.href = vlue;
    });

    // if ($('.movie_parent').children('.movie_component').length == 8) {

    // }
});


// loader
function hide_loader() {
    const loader = document.querySelector('#loader');
    loader.style.display = 'none';
}

function show_content() {
    const body = document.querySelector('#page_section');
    body.style.display = 'block';
}


if (document.readyState === "loading") {
    document.addEventListener('DOMContentLoaded', function () {
        const body_part = document.querySelector('#page_section');
        body_part.style.display = 'none';
        const loader_part = document.querySelector('#loader');
        loader_part.style.display = 'flex';
        setTimeout(() => {
            console.log(true);
            hide_loader();
            show_content();
        }, 3000);
    })
} else {
    const loader = document.querySelector('#loader');
    loader.style.display = 'none';
    console.info('Dom loaded');
}

function submit_form() {
    document.getElementById("big_search").submit();
}


document.querySelectorAll('.filter_by_al').forEach(function (element) {
    element.addEventListener('click', function (e) {
        var filter = $(this).attr('data-al');
        $('[name="serch_filter"]').val(filter);
        submit_form();

    })
})


