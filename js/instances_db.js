var instances = {
    1: {
        disable_modern: true,
        disable_specials: true,
        dinos: {

        }
    }
};

//Current Instance Fetcher
window.instance = null;
function get_current_instance() {
    var current_instance = null;
    var instance_get_match = location.href.match(/instance=(\d+)/);
    if (instance_get_match) {
        current_instance = instance_get_match[1];
    }
    //
    if (isset($)) {
        if ($('input[type=hidden][name=instance]').length) {
            current_instance = $('input[type=hidden][name=instance]').val();
        }
    }
    //
    current_instance = parseInt($.trim(current_instance.toString()));
    //
    if (current_instance != window.instance) {
        window.instance = current_instance;
    }
}
setTimeout(get_current_instance, 1);
setInterval(get_current_instance, 5000);

var Xtreme_startup_calls = Xtreme_startup_calls || [];
Xtreme_startup_calls.push(function () {
    get_current_instance();
    $(window).change(get_current_instance);
});