$('form').submit(function (event) {
    if ($(this).hasClass('submitted')) {
        event.preventDefault();
    }
    else {
        $(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
        $(this).addClass('submitted');
    }
});