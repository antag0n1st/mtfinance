var time_show_timeout = 2 * 60 * 1000;

function create_picker_by_id(id) {
    $("#" + id).datepicker({
        inline: true
    });

    $("#" + id).datepicker("option", "dateFormat", 'dd MM yy');
}

function set_cookie() {
    var now = new Date();
    var time = now.getTime();
    time += time_show_timeout;
    now.setTime(time);
    document.cookie =
            'show=show' +
            '; expires=' + now.toUTCString() +
            '; path=/';
}

function remove_cookie() {
    var now = new Date();
    var time = now.getTime();
    now.setTime(time);
    document.cookie =
            'show=hide' +
            '; expires=' + now.toUTCString() +
            '; path=/';
}

function get_cookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2)
        return parts.pop().split(";").shift();
}

$(function () {

    var k = new Kibo();

    var is_visible = false;
    var timer_id = null;

    k.down('f7', function (key) {

        if (is_visible) {
            $('.show').removeClass('show').addClass('hide');
            clearTimeout(timer_id);
            remove_cookie();
        } else {
            $('.hide').removeClass('hide').addClass('show');
            

            timer_id = setTimeout(function () {
                $('.show').removeClass('show').addClass('hide');
                is_visible = false;
                remove_cookie();
            }, time_show_timeout);

            set_cookie();
        }

        is_visible = !is_visible;

    });

    var cookie = get_cookie('show');
   
    if (cookie == 'show' && typeof cookie != 'undefined') {
       
        $('.hide').removeClass('hide').addClass('show');
        is_visible = true;

        timer_id = setTimeout(function () {
            $('.show').removeClass('show').addClass('hide');
            is_visible = false;
            remove_cookie();
        }, time_show_timeout);

        set_cookie();
    }

});

