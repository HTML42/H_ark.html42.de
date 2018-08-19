var Xtreme_startup_calls = Xtreme_startup_calls || [];
Xtreme_startup_calls.push(function () {
    //
    list_length();
    //
    $('#navi_toggler').click(function () {
        $('#navigation ul').toggleClass('active');
    });
    //Instance-Admin
    if ($('.access_grant').length) {
        var instance = $('.access_grant').data('instance');
        $('.access_grant [type=button]').click(function () {
            var pw = $.trim($('.access_grant [type=password]').val());
            if (pw.length > 1) {
                $.post('ajax/become_instance_admin.html', {pw: pw, instance: instance}, function (response) {
                    response = $.trim(response);
                    if(response == '1' || response == 1) {
                        $('.access_grant_info').show();
                        $('.access_grant').hide();
                    } else {
                        alert('Falsches Passwort.');
                    }
                });
            }
        });
    }
});

function cookie(key, value, days) {
    if (typeof value == 'string' || typeof value == 'number') {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = key + "=" + (value || "") + expires + "; path=/";
    } else {
        var _return = null;
        var cookies = document.cookie.split(';');
        for (_i in cookies) {
            var cookie_data = cookies[_i].split('=');
            if (typeof cookie_data[0] == 'string' && typeof cookie_data[1] == 'string') {
                var c_key = cookie_data[0].replace(/\s/g, '');
                var c_value = cookie_data[1].replace(/\s/g, '');
                if (c_key == key) {
                    _return = c_value;
                    break;
                }
            }
        }
        //
        if (_return) {
            if (_return.match(/\{.*\}/) || _return.match(/\[.*\]/)) {
                var _return_json = false;
                try {
                    _return_json = JSON.parse(_return);
                } catch (exception) {
                    _return_json = false;
                }
                if (_return_json) {
                    _return = _return_json;
                }
            } else if (_return === 'true') {
                _return = true;
            } else if (_return === 'false') {
                _return = false;
            }
        }
        //
        return _return;
    }
}
    