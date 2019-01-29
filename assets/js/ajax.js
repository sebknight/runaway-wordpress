$ = jQuery;
$('#post-loader').on('click', function (){
    let pull_page = 1; let jsonFlag = true;
    if (jsonFlag) {
        jsonFlag = false; pull_page++;

        $.getJSON("/wp-json/our-work/all-posts?page=" + pull_page, function (data) {
            if (data.length) {
                var items = [];
                $.each(data, function (key, val) {
                    const arr = $.map(val, function (el) { return el });
                    const post_url = arr[1];
                    const post_title = arr[3];
                    const post_img = arr[4];
                    const post_featured = arr[5];
                    const post_cat = arr[6];
                    const post_class = (class_counter == 2) ? 'post adjust' : 'post';
                    let featured = "";

                    if (post_featured) {
                        featured = "featured";
                    }

                    let item_string = '<ul><li class="item">' + post_title + '</li></ul>';
                    items.push(item_string);
                });
                if (data.length >= 3) {
                    $('li.loader').fadeOut();
                    $("#project-list").append(items);
                } else {
                    $("#project-list").append(items);
                    $('#post-loader').hide();
                    $('#ajax-no-posts').fadeIn();
                }
            } else {
                $('#post-loader').hide();
                $('#ajax-no-posts').fadeIn();
            }
        }).done(function (data) {
            if (data.length) { jsonFlag = true; }
        });
    }

});
