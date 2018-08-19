/**
 * Dinos-Related-JS
 */
var Dinos = {
    config: {},
    init: function () {
        if (has_attr(instances, window.instance)) {
            Dinos.config = instances[window.instance];
        }
        if ($$.length(Dinos.config) > 0) {
            if (has_attr(Dinos.config, 'disable_modern') && Dinos.config.disable_modern) {
                $('.dinos_list')
                        .find('[data-map="Aberration"], [data-map*="Extinction"], [data-map*="Unreleased"]')
                        .parent().remove();
            }
            if (has_attr(Dinos.config, 'disable_specials') && Dinos.config.disable_specials) {
                $('.dinos_list')
                        .find('[data-group*="Alpha Predators"], [data-group*="Event Creatures"], [data-group*="Fantasy"], [data-group*="Bosses"]')
                        .parent().remove();
            }
        }
        //
        setTimeout(Dinos.render_html, 5);
    },
    render_html: function () {
        $('.dinos_list li .creature_icon').each(function () {
            var el = $(this);
            var li = el.closest('li');
            var ext_link = li.find('.creature_icon a[target="_blank"]').first();
            var name = el.data('creature');
            //
            ext_link.append('<span class="creature_name">' + name + '</span>');
        });
    }
};

var Xtreme_startup_calls = Xtreme_startup_calls || [];
Xtreme_startup_calls.push(Dinos.init);
